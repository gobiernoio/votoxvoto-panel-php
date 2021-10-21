<?php session_start();
header("Location: ".$_SERVER['HTTP_REFERER']);

$errores = 0;
$mensaje = "";

if ($_POST['email']) {
	$email = $_POST['email'];	
}
else {
	$errores++;
	$mensaje.= "<li>Debes colocar tu e-mail</li>";
}

if ($_POST['password']) {
	$password = $_POST['password'];	
}
else {
	$errores++;
	$mensaje.= "<li>Debes colocar una contraseña</li>";
}


if($errores == 0){

	include("configuracion.php");
	$query = "SELECT * FROM nezapp_usuarios WHERE email = '$email'";
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	
	
		if($row['clave'] == $password)
		{
		//$_SESSION['usuario'] = $muser;
		$mensaje.= "<li>Entró bien</li>";

		$mensaje.= "<li>El permiso permiso_usuarios está establecido en: ".$row['permiso_usuarios']."</li>";
		$mensaje.= "<li>El permiso permiso_vial está establecido en: ".$row['permiso_vial']."</li>";
		$mensaje.= "<li>El permiso permiso_noticias está establecido en: ".$row['permiso_noticias']."</li>";
		$mensaje.= "<li>El permiso permiso_agenda está establecido en: ".$row['permiso_agenda']."</li>";
		$mensaje.= "<li>El permiso permiso_notificaciones está establecido en: ".$row['permiso_notificaciones']."</li>";
		$mensaje.= "<li>El permiso permiso_chats_ver está establecido en: ".$row['permiso_chats_ver']."</li>";
		$mensaje.= "<li>El permiso permiso_chats_responder está establecido en: ".$row['permiso_chats_responder']."</li>";
		$mensaje.= "<li>El permiso permiso_canales está establecido en: ".$row['permiso_canales']."</li>";

		$_SESSION['usuario'] = $row['nombre'];
		$_SESSION['foto_perfil'] = $row['foto_perfil'];
		$_SESSION['permiso_usuarios'] = $row['permiso_usuarios'];
		$_SESSION['permiso_vial'] = $row['permiso_vial'];
		$_SESSION['permiso_noticias'] = $row['permiso_noticias'];
		$_SESSION['permiso_agenda'] = $row['permiso_agenda'];
		$_SESSION['permiso_notificaciones'] = $row['permiso_notificaciones'];
		$_SESSION['permiso_chats_ver'] = $row['permiso_chats_ver'];
		$_SESSION['permiso_chats_responder'] = $row['permiso_chats_responder'];
		$_SESSION['permiso_canales'] = $row['permiso_canales'];
		}
		else {
			$mensaje.= "<li>Ocurrió un error, revisa que tus datos sean correctos.</li>";
		}
} 


$_SESSION['mensaje'] = $mensaje;

?>