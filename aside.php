  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
  

    <?php  if(isset($_SESSION['usuario'])) { ?>


    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="uploads/fotobeto.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['usuario']; ?></p>
          
          <!-- <a href=""><i class="fa fa-circle text-success"></i> Ver Perfil</a> -->
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">Menú</li>
        <!-- Optionally, you can add icons to the links -->

        <!--
        <li class="active"><a href="#"><i class="fa fa-credit-card"></i> <span>Link</span></a></li>
        <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
        -->

        <!-- <li><a href="chat-conectando.php"><i class="fa fa-comment"></i> <span>Conectar <b>chat</b></span></a></li> -->
        
        
        <!-- <li class="header">VOTOS CON COALICIÓN</li> -->
        
    

        <!-- ========================================================================================= -->
        <!-- ====================================== VOTOS POR PARTIDO ================================ -->
        <li class="header">VOTOS POR PARTIDOS</li>
        <li><a href="general.php"><i class="fa fa-table"></i> <span>Votos Totales<b> por Partido</b></span></a></li>
        
        <!-- ====================================== MUNICIPIOS ================================ -->
        <li class="treeview">
          <a href="#"><i class="fa fa-bar-chart"></i> <span>Votos por <b>Municipio</b></span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
              <?php 
                include("configuracion.php");                
                $result = mysql_query("SELECT DISTINCT municipio, clave FROM distritos ORDER BY clave");

                while ( $row = mysql_fetch_assoc($result) ) { 

                      $clave = utf8_encode($row['clave']);
                      $municipio = utf8_encode($row['municipio']);
                ?>
                    
                    <li>
                      <a href="municipio.php?municipio=<?php echo $municipio; ?>">
                      <i class="fa fa-angle-right"></i>
                          <?php echo $clave." - ".$municipio; ?>
                      </a>
                    </li>

              <?php } ?>
          </ul>
        </li>
        <!-- ====================================== DISTRITOS ================================ -->
        <li class="treeview">
          <a href="#"><i class="fa fa-bar-chart"></i> <span>Votos por <b>Distritos</b></span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
              <?php 
                include("configuracion.php");                
                $result = mysql_query("SELECT DISTINCT distrito, cabecera FROM `distritos`");

                while ( $row = mysql_fetch_assoc($result) ) { 

                      $distrito = utf8_encode($row['distrito']);
                      $cabecera = utf8_encode($row['cabecera']);
                      $no_cabecera = explode(" ", $distrito);
                ?>
                    
                    <li>
                      <a href="distrito.php?distrito=<?php echo $distrito; ?>&cabecera=<?php echo $cabecera; ?>">
                      <i class="fa fa-angle-right"></i>
                          <?php echo $no_cabecera[1]." - ".$cabecera; ?>
                      </a>
                    </li>

              <?php } ?>
          </ul>
        </li>
        <!-- ====================================== ZONAS ================================ -->
        <li class="treeview">
          <a href="#"><i class="fa fa-bar-chart"></i> <span>Votos por <b>Zona</b></span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">

              <?php 
                include("configuracion.php");                
                $result = mysql_query("SELECT DISTINCT distrito, cabecera FROM `distritos`");

                while ( $row = mysql_fetch_assoc($result) ) { 

                      $distrito = utf8_encode($row['distrito']);
                      $cabecera = utf8_encode($row['cabecera']);
                      $no_cabecera = explode(" ", $distrito);
                ?>
                    
                    <li>
                      <a href="zona_directorio.php?distrito=<?php echo $distrito; ?>&cabecera=<?php echo $cabecera; ?>">
                      <i class="fa fa-angle-right"></i>
                          <?php echo $no_cabecera[1]." - ".$cabecera; ?>
                      </a>
                    </li>

              <?php } ?>

          </ul>
        </li>




        

        <li><a href="salir.php"><i class="fa fa-close"></i> <span>Salir</span></a></li>

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->

    <?php } ?>

  </aside>