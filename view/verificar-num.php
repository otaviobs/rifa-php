<div class="col-lg-12 col-sm-12 mt-lg-3 mt-sm-5">
        <h1>Lista - Total: <?=$rifa->rowCount()?></h1>
        
        <div class="clearfix"></div>
<div class="table-responsive">
        <table class="table table-striped mt-3">
          <thead>
            <tr>
              <th scope="col">N°</th>
              <th scope="col">Nome</th>
              <th scope="col">Fralda</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
<?
while($tr = $rifa->fetchObject())
{
?>
            <tr>
              <th scope="row"><?=$tr->numero;?></th>
              <td><?=$tr->nome;?></td>
              <td><?=$tr->fralda;?></td>
              <td>

                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="switch<?=$tr->id?>" onclick="updateStatus(<?=$tr->id?>)" <?=$tr->status==1?'':'checked';?>>
                  <label class="custom-control-label" for="switch<?=$tr->id?>"><?=$tr->status==1?'Nao entregou':'Entregou';?></label>
                </div>

              </td>
            </tr>
<?
}
?>
<?

?>
          </tbody>
        </table>
</div>
      </div>

<?php
Inline::a();
?>
<script type="text/javascript">
function updateStatus(userID){
$.post('ajax/status.json',{id:userID},function(x){
		if(x.m){
			console.log(x);
		}
	},'json')
  .done(function(x){
		if(x.ok==1){
			setTimeout(function(){
        Swal.fire({
          title: 'Status',
          text: "Alteracao realizada com sucesso.",
          icon: 'success'
        })
			},1000);
		}
    else{
      Swal.fire({
        title: 'Status',
        text: "Nao foi possivel alterar.",
        icon: 'error'
      });
      $(this).prop('checked',false);
    }
	})
  .fail(function() {
    setTimeout(function(){
      Swal.fire({
        title: 'Status',
        text: "Nao foi possivel alterar.",
        icon: 'error'
      })
			},1000);
      $(this).prop('checked',false);
  });
}
</script>
<?php
Inline::b();
?>