<?php include("header.php"); ?>
<?php include("aside.php"); ?>
  

  <?php
  $casilla     = utf8_encode($_GET['casilla']);
  $distrito    = utf8_encode($_GET['distrito']);
  $cabecera    = utf8_decode($_GET['cabecera']);
  $zona        = utf8_decode($_GET['zona']);
  ?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h2>
        Votos Casilla <?php echo $casilla; ?> <span style="font-weight: lighter; font-size: 18px;"> del municipio de <?php echo $municipio; ?>.  <?php echo $distrito; ?> - <?php echo $cabecera; ?></span>
      </h2>

      
      <!-- <h1>Abrir Foto</h1> -->

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
              <?php include("configuracion.php"); include("funciones.php"); ?>
        




              <div class="box"><div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-sort-numeric-desc"></i>
                <b>Conteo de Votos casilla <?php echo $casilla; ?></b> - <?php echo $distrito; ?>.- <?php echo $cabecera; ?></b>
                </h3>
                
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                    </div>

                </div>



              <div class="box-body">  
                <table class="table table-bordered table-hover" style="margin-bottom: 45px;">
                  <tr>
                      <th class="text-center">
                        <img src="img/pri.gif" alt="" width="30px"><br>
                        PRI</th>

                      <th class="text-center">
                        <img src="img/pan.gif" alt="" width="30px"><br>
                        PAN</th>

                      <th class="text-center">
                        <img src="img/prd.gif" alt="" width="30px"><br>
                        PRD</th>

                      <th class="text-center">
                        <img src="img/pt.gif" alt="" width="30px"><br>
                        PT</th>

                      <th class="text-center">
                        <img src="img/pv.gif" alt="" width="30px"><br>
                        PV</th>

                      <th class="text-center">
                        <img src="img/na.gif" alt="" width="30px"><br>
                        Nueva Alianza</th>

                      <th class="text-center">
                        <img src="img/morena.gif" alt="" width="30px"><br>
                        Morena</th>

                      <th class="text-center">
                        <img src="img/es.gif" alt="" width="30px"><br>
                        Encuentro Social</th>
                  </tr>
                  
                  
                  <?php
                    $casilla = $casilla;
                    
                    $consulta = "SELECT 
                                foto, 
                                SUM(pan) as pantotal, 
                                SUM(pri) as pritotal, 
                                SUM(prd) as prdtotal, 
                                SUM(pt) as pttotal, 
                                SUM(pv) as pvtotal, 
                                SUM(na) as natotal, 
                                SUM(morena) as morenatotal, 
                                SUM(es) as estotal
                                FROM votoxvoto WHERE casilla = '$casilla' && zona = '$zona'";
                    $result = mysql_query($consulta);

                    while ($row = mysql_fetch_assoc($result)) {  ?>

                      <p style="font-size: 20px;"><a href="<?php echo $row['foto']; ?>" target="_blank">Abrir Foto Boleta</a></p style="font-size: 20px;">
                      
                      <tr>
                        <td style="text-align: center;"><?php echo number_format(  $row['pantotal']  ); ?></td>
                        <td style="text-align: center;"><?php echo number_format(  $row['pritotal']  ); ?></td>
                        <td style="text-align: center;"><?php echo number_format(  $row['prdtotal']  ); ?></td>
                        <td style="text-align: center;"><?php echo number_format(  $row['pttotal']  ); ?></td>
                        <td style="text-align: center;"><?php echo number_format(  $row['pvtotal']  ); ?></td>
                        <td style="text-align: center;"><?php echo number_format(  $row['natotal']  ); ?></td>
                        <td style="text-align: center;"><?php echo number_format(  $row['morenatotal']  ); ?></td>
                        <td style="text-align: center;"><?php echo number_format(  $row['estotal']  ); ?></td>
                      </tr>
                      
                    <?php } ?>

                </table>
              </div>
            </div>


            <div class="box box-default">
              <div class="box-header with-border">
                <i class="fa fa-bar-chart-o"></i>

                <h3 class="box-title"><b>Gráfica de Votos de la casilla <?php echo $casilla; ?></b> - <?php echo $distrito; ?>.- <?php echo $cabecera; ?></h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="box-body">
                <div id="bar-chart" style="height: 300px;"></div>
              </div>
              <!-- /.box-body-->
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



<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
 
 $(function () {

     /*
     * BAR CHART
     * ---------
     */

    var bar_data = {
      data: [

      <?php 
      $pregunta = 'pregunta5';
        $arrayColores = ['#A1C30D', '#2471FE', '#BF55FE', '#FE509D', '#FEA714', '#289340'];

        $sql = "SELECT     COUNT(*) as cuantos, 
                                SUM(pan) as pantotal, 
                                SUM(pri) as pritotal, 
                                SUM(prd) as prdtotal, 
                                SUM(pt) as pttotal, 
                                SUM(pv) as pvtotal, 
                                SUM(na) as natotal, 
                                SUM(morena) as morenatotal, 
                                SUM(es) as estotal
                                FROM votoxvoto WHERE casilla = '$casilla' && zona = '$zona'";

        
        //$sql = "SELECT COUNT(*) as cuantos, pregunta5 FROM encuesta GROUP BY pregunta5";


        $result = mysql_query($sql);
        $total = mysql_num_rows(mysql_query("SELECT * FROM votoxvoto"));
        // Número de campos afectados en la consulta
        $campos = mysql_num_rows($result);
        $puntero = 1;

        while ($row = mysql_fetch_assoc($result)) {
          $cuantos = $row['cuantos'];
          $porcentaje =  number_format( ($cuantos*100)/$total , 1);
          
          if($puntero < $campos) {
            
          }
          else {
            echo '["<img src=img/pri.gif width=50px>", '.$row['pritotal'].'],';
            echo '["<img src=img/pan.gif width=50px>", '.$row['pantotal'].'],';
            echo '["<img src=img/prd.gif width=50px>", '.$row['prdtotal'].'],';
            echo '["<img src=img/pt.gif width=50px>", '.$row['pttotal'].'],';
            echo '["<img src=img/pv.gif width=50px>", '.$row['pvtotal'].'],';
            echo '["<img src=img/na.gif width=50px>", '.$row['natotal'].'],';
            echo '["<img src=img/morena.gif width=50px>", '.$row['morenatotal'].'],' ;
            echo '["<img src=img/es.gif width=50px>", '.$row['estotal'].'],';
          }
          $puntero++;
        }
    ?>
    ],
      color: "#26942A"
    };
    $.plot("#bar-chart", [bar_data], {
      grid: {
        borderWidth: 1,
        borderColor: "#CFCFCF",
        tickColor: "#CFCFCF"
      },
      series: {
        bars: {
          show: true,
          barWidth: 0.5,
          align: "center"
        }
      },
      xaxis: {
        mode: "categories",
        tickLength: 0
      }
    });
    /* END BAR CHART */


   
  });

  

</script>



</body>
</html>



