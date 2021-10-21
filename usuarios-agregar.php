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




            // ****************** Comprobamos los campos obligatorios.
            if($_POST['nombre']) {
              $nombre = $_POST['nombre'];
            }
            else {
              $errores++;
              $mensaje.= "<li>Debes colocar un nombre, es un campo obligatorio</li>";
            }

            if($_POST['clave']) {
              $clave = $_POST['clave'];
            }
            else {
              $errores++;
              $mensaje.= "<li>Debes colocar una claven si no no podrás iniciar sesión</li>";
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
                $directorio = NULL;
              }


              $fecha_registro = date("Y-m-d");
              $fecha_ultimo_acceso = date("Y-m-d");


              include("configuracion.php");
              mysql_query("insert into nezapp_usuarios values ('', 
                '$nombre', 
              '$clave', 
              '$email', 
              '$directorio', 
              '$fecha_registro', 
              '$fecha_ultimo_acceso', 
              '$permiso_usuarios', 
              '$permiso_vial', 
              '$permiso_noticias', 
              '$permiso_agenda', 
              '$permiso_notificaciones', 
              '$permiso_chats_ver', 
              '$permiso_chats_responder', 
              '$permiso_canales', 
              '$observaciones'
              );");
              ?>



          
            <div class="callout callout-success">
              <h4>Tu registro se ha agregado correctamente.</h4>
            </div>

          <?php } ?>
                
             
        </div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include("footer.php"); ?>