<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Iniciar Sesión
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->


	<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Ingresa tus datos para poder iniciar sesión</h3>
        </div>

		

		<div class="box-body">

			<form action="sesion-validar.php" method="post" enctype="multipart/form-data">
				<div class="form-group has-feedback">
					<label for="email">E-mail</label>
			    	<input type="text" name="email" class="form-control">
			    	<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>

				<div class="form-group has-feedback">
					<label for="password">Password</label>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>

					<!-- <input type="hidden" name="url_destino" value="<?php echo '..'.$_SERVER['PHP_SELF']; ?>"> -->
			    	<input type="password" name="password" class="form-control">
				</div>
			    
			    <div class="form-group">
			    	<button class="btn btn-block btn-success" type="submit">Entrar</button>
			    </div>

			    

			    	<?php 
			    	if ( isset($_SESSION['mensaje'] )) {
			    		echo '<div class="form-group" style="color: red;">';
			    		echo $_SESSION['mensaje'];
			    		echo '</div>';
			    	} 
			    	?>

			</form>

		</div>

	</div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





				