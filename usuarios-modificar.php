<?php include("header.php"); ?>
<?php include("aside.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Usuarios 
        <small>Modificar usuario</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <form role="form" action="usuarios-modificando.php" method="post" enctype="multipart/form-data">
        
            <div class="col-md-8">
              
                  
                  <?php
                  include("configuracion.php");
                  $id = $_GET['id'];
                  $query = "SELECT * FROM nezapp_usuarios WHERE id = $id";
                  $result = mysql_query($query);
                  $row = mysql_fetch_assoc($result);
                  ?>

                  <div class="box box-warning">
                    <div class="box-header with-border">
                      <h3 class="box-title">Cambia los datos que quieras modificar y da clic en el botón de "Modificar usuario".</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    
                      <div class="box-body">

                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">


                        <div class="form-group">
                          <label for="nombre">Nombre del usuario</label>
                          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresar nombre aquí" value="<?php echo $row['nombre'] ?>">
                        </div>

                        <div class="form-group">
                          <label for="clave">Clave de acceso provisional</label>
                          <input type="text" class="form-control" id="clave" name="clave" placeholder="Ingresar clave aquí" value="<?php echo $row['clave'] ?>">
                        </div>

                        <div class="form-group">
                          <label for="email">E-mail</label>
                          <input type="text" class="form-control" id="email" name="email" placeholder="Ingresar e-mail aquí" value="<?php echo $row['email'] ?>">
                        </div>

                        
                          
                        <div class="form-group">  
                          
                          <label for="foto">Cambiar foto de perfil</label>
                          <p class="help-block">Elige la imagen que se verá en el chat como miniatura, si no eliges ninguna se mantendrá tu foto actual.</p>
                          <input type="file" id="foto" name="foto" class="form-control">

                          

                        </div>

                        <div class="form-group">
                          <label for="foto">Foto de perfil actual</label>
                          <div class="">
                            <img src="<?php echo $row['foto_perfil']; ?>" width="40px;" class="img-circle">
                          </div>
                          <input type="hidden" name="foto_vieja" value="<?php echo $row['foto_perfil']; ?>">
                        </div>


                        <div class="form-group">
                          <label for="observaciones">Observaciones</label>
                          <input type="text" class="form-control" id="observaciones" name="observaciones" placeholder="Agregar cualquier observación o dato extra aquí"  value="<?php echo $row['observaciones'] ?>">
                        </div>

                      </div>
                      <!-- /.box-body -->

                      <div class="box-footer">
                        <button type="submit" class="btn btn-warning">Modificar usuario</button>
                      </div>
                    
                  </div>



            </div>






            <div class="col-md-4">
              


                  <div class="box box-warning">
                    <div class="box-header with-border">
                      <h3 class="box-title">Elige los permisos que quieras otorgarle a este usuario.</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="canales-nuevo-agregar.php" method="post" enctype="multipart/form-data">
                      <div class="box-body">


                        <!-- checkbox -->
                        <div class="form-group">
                          <label>
                            <input type="checkbox" class="flat-green" name="permiso_usuarios" value="true" <?php if($row['permiso_usuarios']) { echo "checked"; }  ?>>
                          </label>

                          <label>
                            Modificar usuarios
                          </label>
                        </div>


                        <!-- checkbox -->
                        <div class="form-group">
                          <label>
                            <input type="checkbox" class="flat-green" name="permiso_vial" value="true" <?php if($row['permiso_vial']) { echo "checked"; }  ?>>
                          </label>

                          <label>
                            Crear reportes víales
                          </label>
                        </div>

                        <!-- checkbox -->
                        <div class="form-group">
                          <label>
                            <input type="checkbox" class="flat-green" name="permiso_noticias" value="true" <?php if($row['permiso_noticias']) { echo "checked"; }  ?>>
                          </label>

                          <label>
                            Administrar noticias
                          </label>
                        </div>

                        <!-- checkbox -->
                        <div class="form-group">
                          <label>
                            <input type="checkbox" class="flat-green" name="permiso_agenda" value="true" <?php if($row['permiso_agenda']) { echo "checked"; }  ?>>
                          </label>

                          <label>
                            Administrar directorio telefónico
                          </label>
                        </div>

                        <!-- checkbox -->
                        <div class="form-group">
                          <label>
                            <input type="checkbox" class="flat-green" name="permiso_notificaciones" value="true" <?php if($row['permiso_notificaciones']) { echo "checked"; }  ?>>
                          </label>

                          <label>
                            Envíar notificaciones
                          </label>
                        </div>

                        <!-- checkbox -->
                        <div class="form-group">
                          <label>
                            <input type="checkbox" class="flat-green" name="permiso_chats_ver" value="true" <?php if($row['permiso_chats_ver']) { echo "checked"; }  ?>>
                          </label>

                          <label>
                            Ver todas las conversaciones del chat
                          </label>
                        </div>

                        <!-- checkbox -->
                        <div class="form-group">
                          <label>
                            <input type="checkbox" class="flat-green" name="permiso_chats_responder" value="true" <?php if($row['permiso_chats_responder']) { echo "checked"; }  ?>>
                          </label>

                          <label>
                            Contestar conversaciones de cualquier chat
                          </label>
                        </div>

                        <!-- checkbox -->
                        <div class="form-group">
                          <label>
                            <input type="checkbox" class="flat-green" name="permiso_canales" value="true" <?php if($row['permiso_canales']) { echo "checked"; }  ?>>
                          </label>

                          <label>
                            Administrar canales
                          </label>
                        </div>



                      </div>
                      <!-- /.box-body -->

                    </form>
                  </div>



            </div>

        </form>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





<?php include("footer.php"); ?>