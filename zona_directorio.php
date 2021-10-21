<?php include("header.php"); ?>
<?php include("aside.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Zonas del <?php echo $_GET['distrito']; ?> - <?php echo $_GET['cabecera']; ?>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
              <?php include("configuracion.php"); include("funciones.php"); ?>
        

              







                <div class="box"><div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-sort-numeric-desc"></i>
                  <b>Elige Zona</b>
                  </h3>
                </div>



                <div class="box-body">  

                    
                    <?php
                      $distrito = $_GET['distrito'];
                      
                      $consulta = "SELECT * FROM distritos WHERE distrito = '$distrito'";
                      $result = mysql_query($consulta);

                      while ($row = mysql_fetch_assoc($result)) {  ?>
                          
                          <div class="col-xs-6 col-sm-4 col-md-3">
                            <a href="zona.php?zona=<?php echo $row['zona']; ?>&distrito=<?php echo $row['distrito']; ?>&cabecera=<?php echo $row['cabecera']; ?>" class="btn btn-block btn-primary btn-lg" style="margin-bottom: 10px;"><?php echo $row['zona']; ?></a>
                          </div>

                          
                        
                      <?php } ?>

                </div>



            </div>


           

          </div>

        
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->








  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <!-- <div class="pull-right hidden-xs">
      ¡Tu clic al siguiente nivel!
    </div> -->
    <!-- Default to the left -->
    <!-- <strong>Soporte por <a href="http://hmedia.com.mx">h media</a>.</strong> -->
  </footer>

  
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->

  
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- FLOT CHARTS -->
<script src="plugins/flot/jquery.flot.min.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="plugins/flot/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="plugins/flot/jquery.flot.pie.min.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="plugins/flot/jquery.flot.categories.min.js"></script>

<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->


</body>
</html>



