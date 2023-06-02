<script
    type="text/javascript"
    src='https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js'
    referrerpolicy="origin">
  </script>
  <script type="text/javascript">
  tinymce.init({
    selector: '#myTextarea',
    width: 600,
    height: 300,
    plugins: [
      'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
      'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen', 'insertdatetime',
      'media', 'table', 'emoticons', 'template', 'help'
    ],
    toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
      'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
      'forecolor backcolor emoticons | help',
    menu: {
      favs: { title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons' }
    },
    menubar: 'favs file edit view insert format tools table help',
    content_css: 'css/content.css'
  });
  </script>

<h1> <?php echo($action=='edit') ? 'Modificar':'Nueva';?> publicacion </h1>

<form method="POST" action="publicacion.php?action=<?php echo ($action);?>" enctype="multipart/from-data">

<div class="row">
        <div class="col-2">
<label for="Nombre">Titulo: </label>
</div>
    </div>
    <div class="row">
        <div class="col-2">
<input required="required" type="text" id="nombre" name="data[titulo]" 
value="<?php echo isset($data[0]['titulo'])?$data[0]['titulo']:''; ?>"  minlength=3 maxlength=200>
</div>
    </div>

    <div class="row">
        <div class="col-2">
<label for="Descripcion">Contenido: </label>
</div>
    </div>
    <div class="row">
        <div class="col-2">
<textarea id="myTextarea"  type="text" id="descripcion" name="data[contenido]" 
value=""><?php echo isset($data[0]['contenido'])?$data[0]['contenido']:''; ?></textarea>
</div>
    </div>
<?php /*$dd = isset($data[0]['contenido'])?$data[0]['contenido']:''; 
print_r($dd); */?>

<input type="submit" name="enviar" value="Guardar">

<?php
if($action=='edit'):?>
    <input type="hidden" name="data[id_publicacion]" 
    value="<?php echo isset($data[0]['id_publicacion'])?$data[0]['id_publicacion']:''?>">
<?php endif;?>

</form>
<div class="col">
            <a class="btn btn-lg btn-primary" href="indexadmin.php">Regresar</a>
</div>