<?php
 
?>
<?php
$form = array(
  'name' => 'form_logeo'
);
$user = array(
  'name' => 'user',
  'placeholder' => 'Inserte Usuario',
  'maxlength' => 10,
  'class' => 'prueba',
  'size' => 20,
  'required' => 1
);
$password = array(  
  'name' => 'password',
  'placeholder' => 'Inserte Contraseña',
  'maxlength' => 100,
  'class' => 'prueba',
  'size' => 25,
  'required' => 1
);
?>

<div id="login">
  <?php echo form_open('Login/obtener_tipo_usuario',$form);?>

  <?php echo form_label('Usuario: ','user'); ?>
  <?php echo form_input($user); ?>
  <br>
  <?php echo form_label('Contraseña: ','password'); ?>
  <?php echo form_input($password); ?>
  <br>  
  <?php echo form_submit('Loguear','Login',"id='boton_login'"); ?>
  <?php echo form_close();?>
</div>
<script>
  function soloLetras(e){
   key = e.keyCode || e.which;
   tecla = String.fromCharCode(key).toLowerCase();
   letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
   especiales = "8-37-39-46";

   tecla_especial = false
   for(var i in especiales){
    if(key == especiales[i]){
      tecla_especial = true;
      break;
    }
  }

  if(letras.indexOf(tecla)==-1 && !tecla_especial){
    return false;
  }
}
</script>