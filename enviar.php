<?php 
	//FORMAS DE TESTEAR LO QUE HAY EN UNA VARIABLE:
	
	//print_r($_POST); //<----- Muestra estructura y variables de tipo Array.

	//var_dump($_POST); //<----- Muestra estructura, datos y sus tipos (string, int, float, ) de una variable de tipo Array.


	if ($_SERVER["REQUEST_METHOD"] == "POST") {//-----> Si la Petición http es "POST"
	
		// ▼ Acá programo qué hacer con los datos del formulario de contacto: ▼
		
		// ▼ 1. VALIDACIÓN DEL NOMBRE ▼
		if (empty($_POST["nombre"]) || is_numeric($_POST["nombre"]) ) {

			echo "Error, tiene que completar un nombre válido";

			//▼ 2. VALIDACIÓN DEL MAIL ▼
		} elseif (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

			echo "Error, tiene que ingresar un mail válido";

						//▼ 2. VALIDACIÓN DEL MENSAJE ▼
		} elseif (empty($_POST["mensaje"]) || strlen($_POST["mensaje"]) < 10 || strlen($_POST["mensaje"]) > 280) {

			echo "Error, ingrese un mensaje de hasta 280 caracteres.";

		} else {
			
			//▼ Acá programo enviar los datos porque son válidos ▼

			$nombre = 	filter_var($_POST["nombre"], FILTER_SANITIZE_SPECIAL_CHARS);
			$email = 	filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
			$mensaje = 	filter_var($_POST["mensaje"], FILTER_SANITIZE_SPECIAL_CHARS);

			$destinatario = "naciofclp@gmail.com";

			$asunto = "Contacto desde MERCADO TECH";

			$cuerpo = "<h1> Datos de la consulta</h1>";
			$cuerpo.= "<p>Nombre: {$nombre} </p>";
			$cuerpo.= "<p>E-mail: {$email} </p>";
			$cuerpo.= "<p>Mensaje: </p>";
			$cuerpo.= "<blockquote>{$mensaje} </blockquote>";

				require 'mail.config.php';

		# Configuracion del envio
		$mail->setFrom($email, $nombre);			// ◄ Emisor
		$mail->addAddress($destinatario);		// ◄ Destinatario
		$mail->addReplyTo($email, $nombre);	// ◄ E-Mail de respuesta (opcional)
		//$mail->addCC('cc@example.com');						// ◄ E-Mail adicional en Copia Compartida (opcional)
	    //$mail->addBCC('bcc@example.com');						// ◄ E-Mail adicional en Copia Compartida Oculta (opcional)
	
		# Configuracion del email
			$mail->isHTML(true);									// ◄ Soporte para HTML (true/false)
			$mail->Subject = $asunto;								// ◄ Asunto del E-Mail
			$mail->Body = $cuerpo;								// ◄ Cuerpo del E-Mail
			$mail->CharSet = 'UTF-8';
			$mail->SMTPDebug = 0;									// ◄ Visualizador para testeo (0: apagado | 1: mensajes del cliente | 2: mensajes del cliente y servidor)

			if ($mail->send()) {
				//echo "¡Gracias! Su consulta ha sido enviada";
				include "formsuccess.php";
			};




			//DESENLACE -----> HACER EL INTENTO DE ENVÍO


		}





	} else { //-----> Si la Petición http no es "POST"
		// ▼ Acá programo que el usuario sea redireccionado hacia el form de contacto: ▼
			header("location: index.php?p=contacto");
	}

	
	// if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// 	include "formsuccess.php";
	// }	

 ?>