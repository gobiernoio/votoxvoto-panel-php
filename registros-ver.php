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
                  $query = "SELECT * FROM encuesta WHERE id = $id";
                  $result = mysql_query($query);
                  ?>

                  <div class="box box-default">
                    <div class="box-header with-border">
                      <h3 class="box-title">Cambia los datos que quieras modificar y da clic en el botón de "Modificar usuario".</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    
                      <div class="box-body">
                      

                      <?php
                        echo count($result);
                      ?>
                      
                  </div>



            </div>


        </form>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





<?php include("footer.php"); ?>