<?php include("header.php"); ?>
<?php include("aside.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Canales de chat 
        <small>Agregando registro</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        
        <div class="col-md-12">
          


          <?php
            // Declaramos errores en cero y leyenda de errores.
            $errores = 0;
            $mensaje = "";



            $id = $_POST['id'];

            // ****************** Comprobamos los campos obligatorios.
            if($_POST['nombre']) {
              $nombre = $_POST['nombre'];
            }
            else {
              $errores++;
              $mensaje.= "<li>No puedes borrar el nombre, es un campo obligatorio</li>";
            }

            if($_POST['clave']) {
              $clave = $_POST['clave'];
            }
            else {
              $errores++;
              $mensaje.= "<li>No puedes dejar en blanco la clave si no no podrás iniciar sesión</li>";
            }

            if($_POST['email']) {
              $email = $_POST['email'];
            }
            else {
              $errores++;
              $mensaje.= "<li>Hace falta el e-mail</li>";
            }

            if($_POST['observaciones']) {
              $observaciones = $_POST['observaciones'];
            }
            else {
              $observaciones = NULL;
            }
            

            // ****************** Comprobamos los campos de permisos.
            if(isset($_POST['permiso_usuarios'])) { $permiso_usuarios = true; } else { $permiso_usuarios = false; }
            if(isset($_POST['permiso_vial'])) { $permiso_vial = true; } else { $permiso_vial = false; }
            if(isset($_POST['permiso_noticias'])) { $permiso_noticias = true; } else { $permiso_noticias = false; }
            if(isset($_POST['permiso_agenda'])) { $permiso_agenda = true; } else { $permiso_agenda = false; }
            if(isset($_POST['permiso_notificaciones'])) { $permiso_notificaciones = true; } else { $permiso_notificaciones = false; }
            if(isset($_POST['permiso_chats_ver'])) { $permiso_chats_ver = true; } else { $permiso_chats_ver = false; }
            if(isset($_POST['permiso_chats_responder'])) { $permiso_chats_responder = true; } else { $permiso_chats_responder = false; }
            if(isset($_POST['permiso_canales'])) { $permiso_canales = true; } else { $permiso_canales = false; }
          ?>


      
          <?php if($errores >= 1) {  echo "<h1> la cantidad de errores es:: ".$errores."</h1>"; ?>
            

            <div class="callout callout-danger">
              <?php if($errores == 1) { echo "<h4>Ocurrió un error</h4>"; } else { echo "<h4>Ocurrieron los siguientes errores</h4>"; } ?>
              
              <?php echo "<ul>".$mensaje."</ul>" ?>

              <a href="usuarios-nuevo.php" class="btn btn-warning">Regresar</a>
            </div>

          <?php } else { 


              include_once("includes/imagen_class.php");

              if(!empty($_FILES['foto']['tmp_name'])) {
                $extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
                $foto_file_name = "foto".$_POST['clave'].".".$extension;

                $foto_picture = new Image;
                $foto_picture->loadImage($_FILES['foto']['tmp_name']);
                $foto_picture->resizeWH(200, 200, true);
                $foto_picture->saveImage("uploads/".$foto_file_name, 60); 

                
                //Obtenemos el directorio
                $curdir = dirname($_SERVER['REQUEST_URI'])."/";
                $directorio = "http://".$_SERVER['SERVER_NAME'].$curdir."uploads/".$foto_file_name;
              }
              else {
                // Declaramos foto a NULL
                $directorio = $_POST['foto_vieja'];;
              }


              $fecha_registro = date("Y-m-d");
              $fecha_ultimo_acceso = date("Y-m-d");


              include("configuracion.php");


              $query = "UPDATE nezapp_usuarios SET nombre = '$nombre', clave = '$clave', email = '$email', foto_perfil = '$directorio', fecha_ultimo_acceso = '$fecha_ultimo_acceso', permiso_usuarios = '$permiso_usuarios', permiso_vial = '$permiso_vial', permiso_noticias = '$permiso_noticias', permiso_agenda = '$permiso_agenda', permiso_notificaciones = '$permiso_notificaciones', permiso_chats_ver = '$permiso_chats_ver', permiso_chats_responder = '$permiso_chats_responder', permiso_canales = '$permiso_canales', observaciones = '$observaciones' WHERE id = '$id'";
              
              mysql_query($query);
              ?>
            




          
            <div class="callout callout-success">
              <h4>Tu registro se ha agregado correctamente.</h4>

              
            </div>

            <a class="btn btn-warning" href="usuarios-administrar.php">Da clic en este enlace para regresar</a>

          <?php } ?>
                
             
        </div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include("footer.php"); ?>