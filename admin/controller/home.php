<?php
if($s->tipoAdm==3)$s->locAdmin('pedidos');
$s->titpg = 'Dashboard';

$periodo = $s->cat;

if($periodo=='de-ate') {
  $de = strgs('de');
  $ate = strgs('ate');
}

$periodo = $periodo?$periodo:'mensal';

if($periodo=='mensal') {
  $dataType = 'month';
  //CARDS
  $lojas = $b->query("select * from Lojas where status=1");
  
  $vendedores = $b->query("select * from Usuarios where id_perfil=4 and status=1");
  
  $pedidos = $b->query("select * from Pedidos where status=1");

  $taxaConversao = $b->query("
    select (count(DISTINCT l.cnpj) / (select count(*) from Lojas) * 100) as valor
    from Pedidos as p,
      Lojas as l,
      Usuarios as u
    where u.cnpj = l.cnpj
    and u.id_usuario = p.id_usuario
    and p.status = 1
  ")->fetchObject();

  $ticketMedio = $b->query("
    select (sum(pp.quantidade)) / count(distinct u.id_usuario) as valor
    from Pedidos as p,
      Lojas as l,
      Usuarios as u,
      PedidoProdutos as pp
    where u.cnpj = l.cnpj
    and u.id_usuario = p.id_usuario
    and p.id_pedido = pp.id_pedido
    and p.status = 1
  ")->fetchObject();

  $faturamento = $b->query("
    select sum(pp.total) total
    from PedidoProdutos pp
    inner join Pedidos as p on pp.id_pedido=p.id_pedido and p.status=1
  ")->fetchObject();

  function get_thousands($num) {
    return array(
      'thousand_low'=>floor($num/1000)*1000,
      'thousand_high'=>ceil($num/1000)*1000-1
    );
  }

  if($faturamento->total>=1000) {
    $thousand = get_thousands($faturamento->total);
    $faturamentoTotal = substr($thousand['thousand_low'], 0, -3) . 'K';
  } else {
    $faturamentoTotal = nreal($faturamento->total);
  }

  $faturamentoTotal = nreal($faturamento->total);

  $detalheVendedores = $b->query("
    SELECT sum(CASE WHEN u.status = 1 THEN 1 ELSE 0 END) as Confirmado,
      sum(CASE WHEN u.aprovado = 1 THEN 1 ELSE 0 END) as Certificado,
      COUNT(DISTINCT p.id_usuario) as fizeramPedido,
      sum(CASE WHEN u.banido = 1 THEN 1 ELSE 0 END) as Banido,
      count(u.id_usuario) as Total
    FROM Usuarios as u left join (select pe.id_usuario, count(*) as total_pedidos from Pedidos as pe group by pe.id_usuario) as p  on p.id_usuario = u.id_usuario
    WHERE u.id_perfil = 4
  ")->fetchObject();

  $detalhePedidos = $b->query("
    select sum(CASE WHEN status = 0 THEN 1 ELSE 0 END) as Aguardando,
      sum(CASE WHEN status = 1 THEN 1 ELSE 0 END) as Aprovado,
      sum(CASE WHEN status = 2 THEN 1 ELSE 0 END) as Reprovado,
      sum(CASE WHEN status = 3 THEN 1 ELSE 0 END) as Pendente,
      count(id_pedido) as Total
    from Pedidos 
  ")->fetchObject();

  //GRAPH
  $detalheVendedoresGraph = $b->query("
    SELECT sum(CASE WHEN u.status = 1 THEN 1 ELSE 0 END) as Confirmado,
      sum(CASE WHEN u.aprovado = 1 THEN 1 ELSE 0 END) as Certificado,
      COUNT(DISTINCT p.id_usuario) as fizeramPedido,
      sum(CASE WHEN u.banido = 1 THEN 1 ELSE 0 END) as Banido,
      count(u.id_usuario) as Total,
      MONTH (u.dataCadastro) as data
    FROM Usuarios as u left join (select pe.id_usuario, count(*) as total_pedidos from Pedidos as pe group by pe.id_usuario) as p  on p.id_usuario = u.id_usuario
    WHERE u.id_perfil = 4
    group by MONTH (u.dataCadastro)
  ");

  $detalhePedidosGraph = $b->query("
    select sum(CASE WHEN status = 0 THEN 1 ELSE 0 END) as Aguardando,
      sum(CASE WHEN status = 1 THEN 1 ELSE 0 END) as Aprovado,
      sum(CASE WHEN status = 2 THEN 1 ELSE 0 END) as Reprovado,
      sum(CASE WHEN status = 3 THEN 1 ELSE 0 END) as Pendente,
      count(id_pedido) as Total,
      MONTH (dataCadastro) as data
    from Pedidos 
    group by MONTH (dataCadastro)
  ");

  $ticketTaxaGraph = $b->query("
    select (count(DISTINCT l.cnpj) / (select count(*) from Lojas) * 100) as taxaConversao,
    (sum(pp.quantidade)) / count(distinct u.id_usuario) as ticketMedio,
    MONTH (p.dataCadastro) as data
      from Pedidos as p,
        Lojas as l,
        Usuarios as u,
        PedidoProdutos as pp
      where u.cnpj = l.cnpj
      and u.id_usuario = p.id_usuario
      and p.id_pedido = pp.id_pedido
      and p.status = 1
      group by MONTH (p.dataCadastro)
  ");

} elseif($periodo=='semanal') {
  $dataType = 'day';

  $lojas = $b->query("select * from Lojas where status=1 and dataCadastro > now() - interval 1 week");

  $vendedores = $b->query("select * from Usuarios where id_perfil=4 and dataCadastro > now() - interval 1 week");

  $pedidos = $b->query("select * from Pedidos where dataCadastro > now() - interval 1 week");

  $taxaConversao = $b->query("
    select (count(DISTINCT l.cnpj) / (select count(*) from Lojas)) as valor
    from Pedidos as p,
      Lojas as l,
      Usuarios as u
    where u.cnpj = l.cnpj
    and u.id_usuario = p.id_usuario
    and p.status = 1
    and p.dataCadastro > now() - interval 1 week
  ")->fetchObject();

  $ticketMedio = $b->query("
    select (sum(pp.quantidade)) / count(distinct u.id_usuario) as valor
    from Pedidos as p,
      Lojas as l,
      Usuarios as u,
      PedidoProdutos as pp
    where u.cnpj = l.cnpj
    and u.id_usuario = p.id_usuario
    and p.id_pedido = pp.id_pedido
    and p.status = 1
    and p.dataCadastro > now() - interval 1 week
  ")->fetchObject();

  $faturamento = $b->query("
    select sum(pp.total) total
    from PedidoProdutos pp
    inner join Pedidos as p on pp.id_pedido=p.id_pedido and p.status=1
    where p.dataCadastro > now() - interval 1 week
  ")->fetchObject();

  function get_thousands($num) {
    return array(
      'thousand_low'=>floor($num/1000)*1000,
      'thousand_high'=>ceil($num/1000)*1000-1
    );
  }

  if($faturamento->total>=1000) {
    $thousand = get_thousands($faturamento->total);
    $faturamentoTotal = substr($thousand['thousand_low'], 0, -3) . 'K';
  } else {
    $faturamentoTotal = nreal($faturamento->total);
  }

  $detalheVendedores = $b->query("
    SELECT sum(CASE WHEN u.status = 1 THEN 1 ELSE 0 END) as Confirmado,
      sum(CASE WHEN u.aprovado = 1 THEN 1 ELSE 0 END) as Certificado,
      COUNT(DISTINCT p.id_usuario) as fizeramPedido,
      sum(CASE WHEN u.banido = 1 THEN 1 ELSE 0 END) as Banido,
      count(u.id_usuario) as Total
    FROM Usuarios as u left join (select pe.id_usuario, count(*) as total_pedidos from Pedidos as pe group by pe.id_usuario) as p  on p.id_usuario = u.id_usuario
    WHERE u.id_perfil = 4 and u.dataCadastro > now() - interval 1 week
  ")->fetchObject();

  $detalhePedidos = $b->query("
    select sum(CASE WHEN status = 0 THEN 1 ELSE 0 END) as Aguardando,
      sum(CASE WHEN status = 1 THEN 1 ELSE 0 END) as Aprovado,
      sum(CASE WHEN status = 2 THEN 1 ELSE 0 END) as Reprovado,
      sum(CASE WHEN status = 3 THEN 1 ELSE 0 END) as Pendente,
      count(id_pedido) as Total
    from Pedidos
    where dataCadastro > now() - interval 1 week
  ")->fetchObject();

  //GRAPH
  $detalheVendedoresGraph = $b->query("
    SELECT sum(CASE WHEN u.status = 1 THEN 1 ELSE 0 END) as Confirmado,
      sum(CASE WHEN u.aprovado = 1 THEN 1 ELSE 0 END) as Certificado,
      COUNT(DISTINCT p.id_usuario) as fizeramPedido,
      sum(CASE WHEN u.banido = 1 THEN 1 ELSE 0 END) as Banido,
      count(u.id_usuario) as Total,
      DAY (u.dataCadastro) as data
    FROM Usuarios as u left join (select pe.id_usuario, count(*) as total_pedidos from Pedidos as pe group by pe.id_usuario) as p  on p.id_usuario = u.id_usuario
    WHERE u.id_perfil = 4
    and u.dataCadastro > now() - interval 1 week
    group by DAY (u.dataCadastro)
  ");

  $detalhePedidosGraph = $b->query("
    select sum(CASE WHEN status = 0 THEN 1 ELSE 0 END) as Aguardando,
      sum(CASE WHEN status = 1 THEN 1 ELSE 0 END) as Aprovado,
      sum(CASE WHEN status = 2 THEN 1 ELSE 0 END) as Reprovado,
      sum(CASE WHEN status = 3 THEN 1 ELSE 0 END) as Pendente,
      count(id_pedido) as Total,
      DAY (dataCadastro) as data
    from Pedidos
    where dataCadastro > now() - interval 1 week
    group by DAY (dataCadastro)
  ");

  $ticketTaxaGraph = $b->query("
    select (count(DISTINCT l.cnpj) / (select count(*) from Lojas) * 100) as taxaConversao,
    (sum(pp.quantidade)) / count(distinct u.id_usuario) as ticketMedio,
    DAY (p.dataCadastro) as data
      from Pedidos as p,
        Lojas as l,
        Usuarios as u,
        PedidoProdutos as pp
      where u.cnpj = l.cnpj
      and u.id_usuario = p.id_usuario
      and p.id_pedido = pp.id_pedido
      and p.status = 1
      and p.dataCadastro > now() - interval 1 week
      group by DAY (p.dataCadastro)
  ");
} elseif($periodo=='de-ate') {
  $dataType = 'day';

  $lojas = $b->query("select * from Lojas where status=1 and (dataCadastro BETWEEN '$de' and '$ate')");

  $vendedores = $b->query("select * from Usuarios where id_perfil=4 and (dataCadastro BETWEEN '$de' and '$ate')");

  $pedidos = $b->query("select * from Pedidos where (dataCadastro BETWEEN '$de' and '$ate')");

  $taxaConversao = $b->query("
    select (count(DISTINCT l.cnpj) / (select count(*) from Lojas)) as valor
    from Pedidos as p,
      Lojas as l,
      Usuarios as u
    where u.cnpj = l.cnpj
    and u.id_usuario = p.id_usuario
    and p.status = 1
    and (p.dataCadastro BETWEEN '$de' and '$ate')
  ")->fetchObject();

  $ticketMedio = $b->query("
    select (sum(pp.quantidade)) / count(distinct u.id_usuario) as valor
    from Pedidos as p,
      Lojas as l,
      Usuarios as u,
      PedidoProdutos as pp
    where u.cnpj = l.cnpj
    and u.id_usuario = p.id_usuario
    and p.id_pedido = pp.id_pedido
    and p.status = 1
    and (p.dataCadastro BETWEEN '$de' and '$ate')
  ")->fetchObject();

  $faturamento = $b->query("
    select sum(pp.total) total
    from PedidoProdutos pp
    inner join Pedidos as p on pp.id_pedido=p.id_pedido and p.status=1
    where (p.dataCadastro BETWEEN '$de' and '$ate')
  ")->fetchObject();

  function get_thousands($num) {
    return array(
      'thousand_low'=>floor($num/1000)*1000,
      'thousand_high'=>ceil($num/1000)*1000-1
    );
  }

  if($faturamento->total>=1000) {
    $thousand = get_thousands($faturamento->total);
    $faturamentoTotal = substr($thousand['thousand_low'], 0, -3) . 'K';
  } else {
    $faturamentoTotal = nreal($faturamento->total);
  }

  $detalheVendedores = $b->query("
    SELECT sum(CASE WHEN u.status = 1 THEN 1 ELSE 0 END) as Confirmado,
      sum(CASE WHEN u.aprovado = 1 THEN 1 ELSE 0 END) as Certificado,
      COUNT(DISTINCT p.id_usuario) as fizeramPedido,
      sum(CASE WHEN u.banido = 1 THEN 1 ELSE 0 END) as Banido,
      count(u.id_usuario) as Total
    FROM Usuarios as u left join (select pe.id_usuario, count(*) as total_pedidos from Pedidos as pe group by pe.id_usuario) as p  on p.id_usuario = u.id_usuario
    WHERE u.id_perfil = 4
    and (u.dataCadastro BETWEEN '$de' and '$ate')
  ")->fetchObject();

  $detalhePedidos = $b->query("
    select sum(CASE WHEN status = 0 THEN 1 ELSE 0 END) as Aguardando,
      sum(CASE WHEN status = 1 THEN 1 ELSE 0 END) as Aprovado,
      sum(CASE WHEN status = 2 THEN 1 ELSE 0 END) as Reprovado,
      sum(CASE WHEN status = 3 THEN 1 ELSE 0 END) as Pendente,
      count(id_pedido) as Total
    from Pedidos
    where (dataCadastro BETWEEN '$de' and '$ate')
  ")->fetchObject();

  //GRAPH
  $detalheVendedoresGraph = $b->query("
    SELECT sum(CASE WHEN u.status = 1 THEN 1 ELSE 0 END) as Confirmado,
      sum(CASE WHEN u.aprovado = 1 THEN 1 ELSE 0 END) as Certificado,
      COUNT(DISTINCT p.id_usuario) as fizeramPedido,
      sum(CASE WHEN u.banido = 1 THEN 1 ELSE 0 END) as Banido,
      count(u.id_usuario) as Total,
      DAY (u.dataCadastro) as data
    FROM Usuarios as u left join (select pe.id_usuario, count(*) as total_pedidos from Pedidos as pe group by pe.id_usuario) as p  on p.id_usuario = u.id_usuario
    WHERE u.id_perfil = 4
    and (u.dataCadastro BETWEEN '$de' and '$ate')
    group by DAY (u.dataCadastro)
  ");

  $detalhePedidosGraph = $b->query("
    select sum(CASE WHEN status = 0 THEN 1 ELSE 0 END) as Aguardando,
      sum(CASE WHEN status = 1 THEN 1 ELSE 0 END) as Aprovado,
      sum(CASE WHEN status = 2 THEN 1 ELSE 0 END) as Reprovado,
      sum(CASE WHEN status = 3 THEN 1 ELSE 0 END) as Pendente,
      count(id_pedido) as Total,
      DAY (dataCadastro) as data
    from Pedidos
    where (dataCadastro BETWEEN '$de' and '$ate')
    group by DAY (dataCadastro)
  ");

  $ticketTaxaGraph = $b->query("
    select (count(DISTINCT l.cnpj) / (select count(*) from Lojas) * 100) as taxaConversao,
    (sum(pp.quantidade)) / count(distinct u.id_usuario) as ticketMedio,
    DAY (p.dataCadastro) as data
      from Pedidos as p,
        Lojas as l,
        Usuarios as u,
        PedidoProdutos as pp
      where u.cnpj = l.cnpj
      and u.id_usuario = p.id_usuario
      and p.id_pedido = pp.id_pedido
      and p.status = 1
      and (p.dataCadastro BETWEEN '$de' and '$ate')
      group by DAY (p.dataCadastro)
  ");
}

$rank = $b->prepare("SET @curRank = 0, @prev_val = NULL");
$rank->execute();

$rank = $b->query("
SELECT d.id_usuario, d.nome, d.pontos, d.nome_loja,
    @curRank := IF(@prev_val=d.pontos,@curRank,@curRank+1) AS rank,
	quantidade_pedidos,
    @prev_val := d.pontos as pontos_anterior
FROM (
    SELECT u.id_usuario, u.nome, l.nome AS nome_loja,
    (CASE 
        WHEN u.aprovado = 1 AND u.dataCadastro >='2021-06-28' THEN sum(COALESCE(p.pontos,0)) + 60
        WHEN u.aprovado = 1 THEN sum(COALESCE(p.pontos,0)) + 50
		WHEN u.dataCadastro >='2021-06-28' THEN sum(COALESCE(p.pontos,0)) + 10
        ELSE sum(COALESCE(p.pontos,0)) 
    END) as pontos,
    COUNT(p.id_pedido) AS quantidade_pedidos
    FROM Usuarios AS u 
        LEFT JOIN Pedidos AS p on (u.id_usuario = p.id_usuario and p.status = 1)
        LEFT JOIN Lojas AS l on u.cnpj = l.cnpj
    WHERE u.id_perfil = 4
    and u.status = 1
    group by u.id_usuario, u.nome, l.nome
    order by pontos desc 
) AS d, (SELECT @curRank := 0) AS r
WHERE d.pontos <> 0;
");