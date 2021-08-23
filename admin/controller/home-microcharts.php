<?php
//if($s->tipoAdm==3||$s->tipoAdm==2)$s->locAdmin('.');
$s->titpg = 'Dashboard';

$periodo = strgs('periodo');

$periodo = $periodo?$periodo:'mensal';

if($periodo=='mensal'){

  $lojas = $b->query("select * from Lojas where status=1");
  $lojasGraph = $b->query("
    select count(*)as quantidade,MONTH(dataCadastro) data
    from Lojas where status=1
    group by MONTH(dataCadastro)
  ");

  $vendedores = $b->query("select * from Usuarios where id_perfil=4");
  $vendedoresGraph = $b->query("
    select count(*)as quantidade,MONTH(dataCadastro) data
    from Usuarios where id_perfil=4
    group by MONTH(dataCadastro)
  ");

  $pedidos = $b->query("select * from Pedidos");
  $pedidosGraph = $b->query("
    select count(*)as quantidade,MONTH(dataCadastro) data
    from Pedidos
    group by MONTH(dataCadastro)
  ");

  $taxaConversao = $b->query("
    select (count(DISTINCT l.cnpj) / (select count(*) from Lojas)) as valor
    from Pedidos as p,
      Lojas as l,
      Usuarios as u
    where u.cnpj = l.cnpj
    and u.id_usuario = p.id_usuario
    and p.status = 1
  ")->fetchObject();

  $taxaConversaoGraph = $b->query("
    select (count(DISTINCT l.cnpj) / (select count(*) from Lojas)) as quantidade,MONTH(p.dataCadastro) data
    from Pedidos as p,
      Lojas as l,
      Usuarios as u
    where u.cnpj = l.cnpj
    and u.id_usuario = p.id_usuario
    and p.status = 1
    group by MONTH(p.dataCadastro)
  ");

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

  $ticketMedioGraph = $b->query("
    select (sum(pp.quantidade)) / count(distinct u.id_usuario) as quantidade,MONTH(p.dataCadastro) data
    from Pedidos as p,
      Lojas as l,
      Usuarios as u,
      PedidoProdutos as pp
    where u.cnpj = l.cnpj
    and u.id_usuario = p.id_usuario
    and p.id_pedido = pp.id_pedido
    and p.status = 1
    group by MONTH(p.dataCadastro)
  ");

  $faturamento = $b->query("
    select sum(pp.total) total
    from PedidoProdutos pp
    inner join Pedidos as p on pp.id_pedido=p.id_pedido and p.status=1
  ")->fetchObject();

  $faturamentoGraph = $b->query("
    select sum(pp.total) quantidade,MONTH(p.dataCadastro) data
    from PedidoProdutos pp
    inner join Pedidos as p on pp.id_pedido=p.id_pedido and p.status=1
    group by MONTH(p.dataCadastro)
  ");

  if($faturamento->total>=1000) {
    $thousand = get_thousands($faturamento->total);
    $faturamentoTotal = substr($thousand['thousand_low'], 0, -3) . 'K';
  } else {
    $faturamentoTotal = nreal($faturamento->total);
  }

  function get_thousands($num) {
    return array(
      'thousand_low'=>floor($num/1000)*1000,
      'thousand_high'=>ceil($num/1000)*1000-1
    );
  }

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
} elseif($periodo=='semanal'){

  $lojas = $b->query("select * from Lojas where status=1 and dataCadastro > now() - interval 1 week");
  $lojasGraph = $b->query("
    select count(*) as quantidade,DAY(dataCadastro) data
    from Lojas where status=1
    and dataCadastro > now() - interval 1 week
    group by DAY(dataCadastro)
  ");

  $vendedores = $b->query("select * from Usuarios where id_perfil=4 and dataCadastro > now() - interval 1 week");
  $vendedoresGraph = $b->query("
    select count(*)as quantidade,DAY(dataCadastro) data
    from Usuarios where id_perfil=4
    and dataCadastro > now() - interval 1 week
    group by DAY(dataCadastro)
  ");

  $pedidos = $b->query("select * from Pedidos where dataCadastro > now() - interval 1 week");
  $pedidosGraph = $b->query("
    select count(*) as quantidade,DAY(dataCadastro) data
    from Pedidos
    where dataCadastro > now() - interval 1 week
    group by DAY(dataCadastro)
  ");

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

  $taxaConversaoGraph = $b->query("
    select (count(DISTINCT l.cnpj) / (select count(*) from Lojas)) as quantidade,DAY(p.dataCadastro) data
    from Pedidos as p,
      Lojas as l,
      Usuarios as u
    where u.cnpj = l.cnpj
    and u.id_usuario = p.id_usuario
    and p.status = 1
    and p.dataCadastro > now() - interval 1 week
    group by DAY(p.dataCadastro)
  ");

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

  $ticketMedioGraph = $b->query("
    select (sum(pp.quantidade)) / count(distinct u.id_usuario) as quantidade,DAY(p.dataCadastro) data
    from Pedidos as p,
      Lojas as l,
      Usuarios as u,
      PedidoProdutos as pp
    where u.cnpj = l.cnpj
    and u.id_usuario = p.id_usuario
    and p.id_pedido = pp.id_pedido
    and p.status = 1
    and p.dataCadastro > now() - interval 1 week
    group by DAY(p.dataCadastro)
  ");

  $faturamento = $b->query("
    select sum(pp.total) total
    from PedidoProdutos pp
    inner join Pedidos as p on pp.id_pedido=p.id_pedido and p.status=1
    where p.dataCadastro > now() - interval 1 week
  ")->fetchObject();

  $faturamentoGraph = $b->query("
    select sum(pp.total) as quantidade,DAY(p.dataCadastro) data
    from PedidoProdutos pp
    inner join Pedidos as p on pp.id_pedido=p.id_pedido and p.status=1
    and p.dataCadastro > now() - interval 1 week
    group by DAY(p.dataCadastro)
  ");

  if($faturamento->total>=1000) {
    $thousand = get_thousands($faturamento->total);
    $faturamentoTotal = substr($thousand['thousand_low'], 0, -3) . 'K';
  } else {
    $faturamentoTotal = nreal($faturamento->total);
  }

  function get_thousands($num) {
    return array(
      'thousand_low'=>floor($num/1000)*1000,
      'thousand_high'=>ceil($num/1000)*1000-1
    );
  }

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
}