<?php include("header.php"); ?>
<?php include("aside.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Estadísticas 
        <small>de la encuesta Neza</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        
        <div class="col-md-6">
                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">1.- Del 0 al 10, ¿Qué calificación le otorga al trabajo del Presidente de la República, Enrique Peña Nieto?</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                  <?php include("configuracion.php"); ?>

                    

                    <?php 
                      function getPromedio($campo, $pregunta) {
                          echo '<table class="table table-bordered table-hover" style="margin-bottom: 15px;">
                                  <tr>
                                  <th class="text-center">No. de encuestados</th>
                                  <th class="text-center">'.$campo.'</th>
                                  <th class="text-center">Promedio</th>
                                </tr>';

                          $sql = "SELECT COUNT(*), $campo, AVG($pregunta) FROM encuesta GROUP BY $campo";
                          $result = mysql_query($sql);

                          while( $row = mysql_fetch_assoc($result) ) {
                              echo '<tr>
                                      <td class="text-center">'.$row['COUNT(*)'].'</td>
                                      <td class="text-center">'.$row[$campo].'</td>
                                      <td class="text-center">'.$row[ 'AVG('.$pregunta.')' ].'</td>
                                    </tr>';
                          }
                          echo "</table>";
                      }

                      getPromedio('localidad', 'pregunta1');
                      getPromedio('sexo', 'pregunta1');
                      getPromedio('edad', 'pregunta1');
                    ?>



                  </div>
     
              </div>
          </div>

          <div class="col-md-6">
                <!-- Donut chart -->
                <div class="box">
                  <div class="box-header with-border">
                    <i class="fa fa-bar-chart-o"></i>
                    <h3 class="box-title">Estadística General</h3>
                  </div>

                  <div class="box-body">
                    <div id="donut-chart" style="height: 300px; margin-top: 30px; margin-bottom: 30px;"></div>
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
    <div class="pull-right hidden-xs">
      ¡Tu clic al siguiente nivel!
    </div>
    <!-- Default to the left -->
    <strong>Soporte por <a href="http://hmedia.com.mx">h media</a>.</strong>
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







<?php 
      $pregunta = 'pregunta1';

      $sql = "SELECT AVG($pregunta) FROM encuesta";
      $result = mysql_query($sql);
      $row = mysql_fetch_assoc($result);

      $valor = number_format($row[ 'AVG('.$pregunta.')' ], 1);
      $espacio = 10-$valor;
      
      echo '
      {label: "Promedio", data: '.$valor.', color: "#3c8dbc"},
      {label: "", data: '.$espacio.', color: "#0073b7"}
      ';
      ?>


<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {    
    //bootstrap WYSIHTML5 - text editor
    $("#nota").wysihtml5();
  });


 $(function () {
  
    /* DONUT CHART */
    var donutData = [
      <?php 
        echo '
        {label: "Promedio", data: '.$valor.', color: "#23A129"},
        {label: "", data: '.$espacio.', color: "#D40300"}
        ';
      ?>
    ];

    $.plot("#donut-chart", donutData, {
      series: {
        pie: {
          show: true,
          radius: 1,
          innerRadius: 0.45,
          label: {
            show: true,
            radius: 2.2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
      legend: {
        show: false
      }
    });
   
  });

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    console.log(series);
    return '<div style="font-size:18px; text-align:center; padding:2px; color: #FFF; font-weight: 600;">'
        + label
        + "<br>"
        + series.data[0][1] + "</div>";
  }

</script>



</body>
</html>



