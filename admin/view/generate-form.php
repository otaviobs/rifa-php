<?php
$query = $b->prepare("DESCRIBE Usuarios");
$query->execute();
$table_fields = $query->fetchAll(PDO::FETCH_COLUMN);
foreach($table_fields as $column){
  if($column!='id_usuario'&&$column!='id_perfil'&&$column!='id_loja'&&$column!='dataCadastro'&&$column!='dataAlterado'&&$column!='status'&&$column!='codigo'){
    echo '<div class="col-lg-4 col-md-6">';
    echo '<label for="'.$column.'">'.$column.'</label>';
    echo '<input type="text" name="'.$column.'" id="'.$column.'" class="form-control"/>';
    echo '</div>';
  }
}