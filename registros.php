<?php include("header.php"); ?>
<?php include("aside.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Registros 
        <small>de la encuesta Neza</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        
        <div class="col-md-12">

          <div>


                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Registros</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table class="table table-bordered table-hover">
                      <tr>
                        <th width="20px">id</th>
                        <th>Fecha</th>
                        <th>Encuestador</th>
                        <th>Edad</th>
                        <th>Genero</th>
                        <th>Localidad</th>
                        <th>Pregunta 5</th>
                        <th>Pregunta 15</th>
                        <th>Pregunta 25</th>
                        <th width="40px">Ver</th>
                        <th width="40px">Borrar</th>
                      </tr>


                      <?php
                      include("configuracion.php");
                      $query = "SELECT * FROM encuesta";
                      $result = mysql_query($query);

                      while ($row = mysql_fetch_assoc($result)) {
                      
                      ?>
      
                      <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['fecha']; ?></td>
                        <td><?php echo $row['eid']; ?></td>
                        <td><?php echo $row['edad']; ?></td>
                        <td><?php echo $row['sexo']; ?></td>
                        <td><?php echo $row['localidad']; ?></td>
                        <td><?php echo $row['pregunta5']; ?></td>
                        <td><?php echo $row['pregunta15']; ?></td>
                        <td><?php echo $row['pregunta25']; ?></td>
                        <td>
                            <a class="btn btn-success" href="registros-ver.php?id=<?php echo $row['id']; ?>">
                              <i class="fa fa-edit"></i> Ver
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="registros-borrar.php?id=<?php echo $row['id']; ?>">
                              <i class="fa fa-user-times"></i> Borrar
                            </a>
                        </td>
                      </tr>

                      <?php } ?>
                      


                    </table>
                  </div>
                 
                </div>

            
            

          </div>
          
            


                
                
             
        </div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include("footer.php"); ?>