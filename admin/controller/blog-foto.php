<?php
//if($s->tipoAdm==3)$s->loc('admin');
//if($s->tipoAdm==2)$s->loc('admin');
if($s->id&&$s->tipoAdm<3&&!($rs=$b->query("select * from blog where id={$s->id} limit 1")->fetchObject()))$s->locAdmin('blogs');


$a->back = 'blog/'.$s->id;
$SPG = $s->spg;
$s->spg = 'upload-fotos';
$largura = '770';
$altura = '430';

Inline::a();
?>
<link rel="stylesheet" href="assets/css/plugins/jquery-file-upload/jquery.fileupload.css">
<link rel="stylesheet" href="assets/css/plugins/jquery-file-upload/jquery.fileupload-ui.css">
<noscript><link rel="stylesheet" href="assets/css/plugins/jquery-file-upload/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="assets/css/plugins/jquery-file-upload/jquery.fileupload-ui-noscript.css"></noscript>
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Processando...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Iniciar</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancelar</span>
                </button>
            {% } %}
        </td>
  </tr>
{% } %}
</script>
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}" width="80"></a>
                {% }else { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.url%}" width="80"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Erro</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Deletar</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancelar</span>
                </button>
            {% } %}
        </td>
		<td>
			<a href="foto-title/{%=file.id%}?{%=file.url%}?{%=randomString()%}" class="btn btn-success">ALTERAR TÍTULO</a>
		</td>
    </tr>
{% } %}
</script>
<script type="text/javascript">
function randomString() {
  var text = "";
  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

  for (var i = 0; i < 5; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));

  return text;
}
</script>
<script src="assets/js/admin/jquery-file-upload/vendor/jquery.ui.widget.js"></script>
<script src="assets/js/admin/jquery-file-upload/tmpl.min.js"></script>
<script src="assets/js/admin/jquery-file-upload/load-image.all.min.js"></script>
<script src="assets/js/admin/jquery-file-upload/canvas-to-blob.min.js"></script>
<script src="assets/js/admin/jquery-file-upload/jquery.blueimp-gallery.min.js"></script>
<script src="assets/js/admin/jquery-file-upload/jquery.iframe-transport.js"></script>
<script src="assets/js/admin/jquery-file-upload/jquery.fileupload.js"></script>
<script src="assets/js/admin/jquery-file-upload/jquery.fileupload-process.js"></script>
<script src="assets/js/admin/jquery-file-upload/jquery.fileupload-image.js"></script>
<script src="assets/js/admin/jquery-file-upload/jquery.fileupload-audio.js"></script>
<script src="assets/js/admin/jquery-file-upload/jquery.fileupload-video.js"></script>
<script src="assets/js/admin/jquery-file-upload/jquery.fileupload-validate.js"></script>
<script src="assets/js/admin/jquery-file-upload/jquery.fileupload-ui.js"></script>
<script type="text/javascript">
$(function () {
	'use strict';
	$('#fileupload').fileupload({
		//xhrFields: {withCredentials: true},
		url: 'upload-foto-blog/<?=$s->id?>',
		acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i
	});

	$('#fileupload').addClass('fileupload-processing');
	$.ajax({
		//xhrFields: {withCredentials: true},
		url: $('#fileupload').fileupload('option', 'url'),
		acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
		dataType: 'json',
		context: $('#fileupload')[0]
	}).always(function (){
		$(this).removeClass('fileupload-processing');
	}).done(function (result){
		$(this).fileupload('option', 'done').call(this, $.Event('done'), {result: result});
	});
});
</script>
<?
Inline::b();
?>