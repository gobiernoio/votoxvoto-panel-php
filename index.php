<?php include("header.php"); ?>
<?php include("aside.php"); ?>

  

<?php if(isset($_SESSION['usuario'])) { ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Bienvenido
        <small>a tu panel de control Encuestas Neza.</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<?php } else { include("sesion-login.php"); } ?>



<?php include("footer.php"); ?>