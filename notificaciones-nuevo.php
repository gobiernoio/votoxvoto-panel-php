<?php include("header.php"); ?>
<?php include("aside.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" ng-app="panelNezApp" ng-controller="nezappController">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Nueva 
        <small> Notificación.</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        
        <div class="col-md-12">
          


              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Llena el siguiente formulario para envíar una notificación.</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="canales-nuevo-agregar.php" method="post" enctype="multipart/form-data">
                  <div class="box-body">


                    <div class="form-group">
                      <label for="titulo">Encabezado de la notificación</label>
                      <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingresar encabezado">
                    </div>

                    <div class="form-group">
                      <label for="notificacion">Mensaje de la notificación</label>
                      <input type="password" class="form-control" id="notificacion" name="notificacion" placeholder="Ingresar notificación">
                    </div>


                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-warning">Enviar Notificación</button>
                  </div>
                </form>
              </div>



        </div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<script>


var miAplicacion = angular.module('panelNezApp', ['firebase'])

//    ====================================================    Controller
miAplicacion.controller ('nezappController', [ '$scope', '$http', '$firebaseArray', function($scope, $http, $firebaseArray, miFirebase) {
  var remitente, remitenteId, destinatario, destinatarioId;

  var config = {
    apiKey: "AIzaSyAF5l1DfB5QF3FfGfp6HeEf_eEZVQbBO58",
    authDomain: "nezapp.firebaseapp.com",
    databaseURL: "https://nezapp.firebaseio.com",
    storageBucket: "project-8647383937695665487.appspot.com",
    messagingSenderId: "839553948433"
  };


  firebase.initializeApp(config);
  var database = firebase.database();
  



  //    ====================================================    Envíar Push
  function enviarPush(titulo, mensaje) {
      $http({
          method: 'POST', 
          url: 'https://onesignal.com/api/v1/notifications', 
          data: {
          "app_id": "24fb1008-1a7e-414f-bb62-01251ad15b4a", 
          // "tags": [{"key": "Vial", "relation": "=","value": true }], 
          "tags": [{"key": "Canal", "relation": "=","value": "Pruebas7-SZPWB77" }], 
          "data": { "hoja": "tab.vialidad" }, 
          "headings" : { "en" : titulo },
          "contents": {"en": mensaje }
          },
          headers: {
          'Authorization': 'Basic YjE2MTQzYzgtMjZiNS00YzJhLWIwMzMtZTc4OTEyY2RlMzJk'
          }
      }).then(function successCallback(response) {
        console.log(response);
      }, function errorCallback(response) {
        console.log(response);
      });
  }
  
  enviarPush("Título de Prueba", "Maneja con precaución, recuerda utilizar el cinturón de seguridad.");



  //    ====================================================    Controller
  $scope.procesarMensaje = function(mensaje) {
    // Datos Mensaje
    var elMensaje = this.mensaje;
  
    var mensajeJson = {
      // facebookProfileImageURL : facebookProfileImageURL,
      // facebookDisplayName : facebookDisplayName,
      // facebookId : facebookId,
      hora: makeHora(), 
      fecha: makeFecha(), 
      usuario: remitente, 
      usuarioId: remitenteId, 
      destinatario: destinatario, 
      destinatarioId: destinatarioId, 
      mensaje: elMensaje
    }

    enviarMensaje(mensajeJson, mensajesSusMensajes, mensajesMisMensajes, elMensaje);

    this.mensaje = '';
  }

  // Envíando el mensaje a firebase
  function enviarMensaje(mensaje, susmensajes, mismensajes, mensajeSimple) {

    // Trayendo la Key del chat
    var nuevaKey = database.ref('usuarios/'+remitente+'/mensajes').push().key;

    // Escribir datos de forma simultanea
    var actualizaciones = {};
    // Enviar datos de | para | sus mensajes | mis mensajes
    actualizaciones['/usuarios/' + remitenteId + '/mensajes/' + destinatarioId + "/" + nuevaKey] = mensaje;
    actualizaciones['/usuarios/' + destinatarioId + '/mensajes/' + remitenteId + "/" + nuevaKey] = mensaje;
    actualizaciones['/usuarios/' + destinatarioId + '/mischats/' + remitenteId ] = susmensajes;
    actualizaciones['/usuarios/' + remitenteId + '/mischats/' + destinatarioId ] = mismensajes;

    //console.log(actualizaciones);
    firebase.database().ref().update(actualizaciones).then(function() {
      console.log("Se Envió Correctamente");
      enviarPush(remitente, destinatarioId, mensajeSimple);
    });
  }
  
}])
</script>




<?php include("footer.php"); ?>