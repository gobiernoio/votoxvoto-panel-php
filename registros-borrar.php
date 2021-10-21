<?php include("header.php"); ?>
<?php include("aside.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Borrando 
        <small>registro</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        
        <div class="col-md-12">
          


                <?php
                  $errores = 0;

                  if($_GET['id']) {
                    $id = $_GET['id'];
                  }
                  else {
                    $errores++;
                  }
                  
                  
                ?>


            
                <?php if($errores >= 1) { ?>

                  <div class="callout callout-danger">
                    <h4>Ocurrió un error.</h4>
                    
                    Revisa que todos los datos sean correctos.

                    <a class="btn btn-green" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Regresar</a>
                  </div>

                <?php } 
                  else { 
                      include("configuracion.php");
                      $query = "DELETE FROM encuesta WHERE id = $id";
                      
                      if( mysql_query($query) ) {
                  ?>
   
                        <div class="callout callout-success">
                          <h4>Se ha borrado el registro</h4>
                        </div>
                        
                        <a class="btn btn-green-light" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Da clic en este enlace para regresar</a>
                  
                <?php  } else {  ?>

                        <div class="callout callout-danger">
                          <h4>Ocurrió un error y el registro no fue eliminado.</h4>
                        </div>
                        
                        <a class="btn btn-green-light" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Da clic en este enlace para regresar</a>

                <?php }  } ?>
                
             
        </div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include("footer.php"); ?>