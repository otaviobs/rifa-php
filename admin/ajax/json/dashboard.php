<?php
if($s->idu){
	$periodo = strgs('periodo');

  if($periodo=='mensal') {
    //CARDS
    $lojas = $b->query("select * from Lojas where status=1");

    $vendedores = $b->query("select * from Usuarios where id_perfil=4");

    $pedidos = $b->query("select * from Pedidos");

    $taxaConversao = $b->query("
      select (count(DISTINCT l.cnpj) / (select count(*) from Lojas)) as valor
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

    //GRAPHS
    $lojasGraph = $b->query("
      select count(*) as quantidade,MONTH(dataCadastro) data
      from Lojas where status=1
      group by MONTH(dataCadastro)
    ");

    $todosVendedoresGraph = $b->query("
      select count(*)as quantidade,MONTH(dataCadastro) data
      from Usuarios where id_perfil=4
      group by MONTH(dataCadastro)
    ");

    $pedidosGraph = $b->query("
      select count(*)as quantidade,MONTH(dataCadastro) data
      from Pedidos
      group by MONTH(dataCadastro)
    ");

    $taxaConversaoGraph = $b->query("
      select (count(DISTINCT l.cnpj) / (select count(*) from Lojas)) as valor
      from Pedidos as p,
        Lojas as l,
        Usuarios as u
      where u.cnpj = l.cnpj
      and u.id_usuario = p.id_usuario
      and p.status = 1
      group by MONTH(p.dataCadastro)
    ");

    $ticketMedioGraph = $b->query("
      select (sum(pp.quantidade)) / count(distinct u.id_usuario) as valor
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

    $faturamentoGraph = $b->query("
      select sum(pp.total) total
      from PedidoProdutos pp
      inner join Pedidos as p on pp.id_pedido=p.id_pedido and p.status=1
      group by MONTH(p.dataCadastro)
    ");
  } elseif($periodo=='semanal') {
    //CARDS
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

    //GRAPHS
    $lojasGraph = $b->query("
      select count(*) as quantidade,DAY(dataCadastro) data
      from Lojas where status=1
      and dataCadastro > now() - interval 1 week
      group by DAY(dataCadastro)
    ");

    $todosVendedoresGraph = $b->query("
      select count(*)as quantidade,DAY(dataCadastro) data
      from Usuarios where id_perfil=4
      and dataCadastro > now() - interval 1 week
      group by DAY(dataCadastro)
    ");

    $pedidosGraph = $b->query("
      select count(*)as quantidade,DAY(dataCadastro) data
      from Pedidos
      where dataCadastro > now() - interval 1 week
      group by DAY(dataCadastro)
    ");

    $taxaConversaoGraph = $b->query("
      select (count(DISTINCT l.cnpj) / (select count(*) from Lojas)) as valor
      from Pedidos as p,
        Lojas as l,
        Usuarios as u
      where u.cnpj = l.cnpj
      and u.id_usuario = p.id_usuario
      and p.status = 1
      and p.dataCadastro > now() - interval 1 week
      group by DAY(p.dataCadastro)
    ");

    $ticketMedioGraph = $b->query("
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
      group by DAY(p.dataCadastro)
    ");

    $faturamentoGraph = $b->query("
      select sum(pp.total) total
      from PedidoProdutos pp
      inner join Pedidos as p on pp.id_pedido=p.id_pedido and p.status=1
      and p.dataCadastro > now() - interval 1 week
      group by DAY(p.dataCadastro)
    ");
  }

  //RESULTS CARDS
  $x->lojas = $lojas->rowCount();

  $x->vendedores = $vendedores->rowCount();

  $x->pedidos = $pedidos->rowCount();

  $x->taxaConversao = $taxaConversao->valor;

  $x->ticketMedio = $ticketMedio->valor;

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

  $x->faturamento = $faturamentoTotal;

  //RESULTS GRAPH
  $i = 0;
  while($rs=$lojasGraph->fetchObject()){
    $x->lojasGraph[$i++] = $rs;
  }

  $i = 0;
  while($rs=$todosVendedoresGraph->fetchObject()){
    $x->todosVendedoresGraph[$i++] = $rs;
  }

  $i = 0;
  while($rs=$pedidosGraph->fetchObject()){
    $x->pedidosGraph[$i++] = $rs;
  }

  $i = 0;
  while($rs=$taxaConversaoGraph->fetchObject()){
    $x->taxaConversaoGraph[$i++] = $rs;
  }

  $i = 0;
  while($rs=$ticketMedioGraph->fetchObject()){
    $x->ticketMedioGraph[$i++] = $rs;
  }

  $i = 0;
  while($rs=$faturamentoGraph->fetchObject()){
    $x->faturamentoGraph[$i++] = $rs;
  }
} else $neg = true;