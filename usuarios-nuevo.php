<?php include("header.php"); ?>
<?php include("aside.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Usuarios 
        <small>Crear nuevo usuario</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <form role="form" action="usuarios-agregar.php" method="post" enctype="multipart/form-data">
        
            <div class="col-md-8">
              


                  <div class="box box-warning">
                    <div class="box-header with-border">
                      <h3 class="box-title">Llena el siguiente formulario y da clic en el botón "Crear usuario" para crear un nuevo usuario.</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    
                      <div class="box-body">


                        <div class="form-group">
                          <label for="nombre">Nombre del usuario</label>
                          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresar nombre aquí">
                        </div>

                        <div class="form-group">
                          <label for="clave">Clave de acceso provisional</label>
                          <input type="text" class="form-control" id="clave" name="clave" placeholder="Ingresar clave aquí">
                        </div>

                        <div class="form-group">
                          <label for="email">E-mail</label>
                          <input type="text" class="form-control" id="email" name="email" placeholder="Ingresar e-mail aquí">
                        </div>

                        <div class="form-group">
                          <label for="foto">Subir foto de perfil</label>
                          <input type="file" id="foto" name="foto">

                          <p class="help-block">Elige la imagen que se verá en el chat como miniatura.</p>
                        </div>


                        <div class="form-group">
                          <label for="observaciones">Observaciones</label>
                          <input type="text" class="form-control" id="observaciones" name="observaciones" placeholder="Agregar cualquier observación o dato extra aquí">
                        </div>

                      </div>
                      <!-- /.box-body -->

                      <div class="box-footer">
                        <button type="submit" class="btn btn-warning">Crear usuario</button>
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
                            <input type="checkbox" class="flat-green" name="permiso_usuarios" value="true">
                          </label>

                          <label>
                            Modificar usuarios
                          </label>
                        </div>


                        <!-- checkbox -->
                        <div class="form-group">
                          <label>
                            <input type="checkbox" class="flat-green" name="permiso_vial" value="true">
                          </label>

                          <label>
                            Crear reportes víales
                          </label>
                        </div>

                        <!-- checkbox -->
                        <div class="form-group">
                          <label>
                            <input type="checkbox" class="flat-green" name="permiso_noticias" value="true">
                          </label>

                          <label>
                            Administrar noticias
                          </label>
                        </div>

                        <!-- checkbox -->
                        <div class="form-group">
                          <label>
                            <input type="checkbox" class="flat-green" name="permiso_agenda" value="true">
                          </label>

                          <label>
                            Administrar directorio telefónico
                          </label>
                        </div>

                        <!-- checkbox -->
                        <div class="form-group">
                          <label>
                            <input type="checkbox" class="flat-green" name="permiso_notificaciones" value="true">
                          </label>

                          <label>
                            Envíar notificaciones
                          </label>
                        </div>

                        <!-- checkbox -->
                        <div class="form-group">
                          <label>
                            <input type="checkbox" class="flat-green" name="permiso_chats_ver" value="true">
                          </label>

                          <label>
                            Ver todas las conversaciones del chat
                          </label>
                        </div>

                        <!-- checkbox -->
                        <div class="form-group">
                          <label>
                            <input type="checkbox" class="flat-green" name="permiso_chats_responder" value="true">
                          </label>

                          <label>
                            Contestar conversaciones de cualquier chat
                          </label>
                        </div>

                        <!-- checkbox -->
                        <div class="form-group">
                          <label>
                            <input type="checkbox" class="flat-green" name="permiso_canales" value="true">
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