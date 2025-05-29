<?php
// Activar la visualizaci¨®n de errores en el servidor
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

// Solo procesar si el formulario ha sido enviado por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recogiendo los datos del formulario
    $to = 'unlimited1401@gmail.com';
    $name = $_POST['nombre'];
    $mail = $_POST['mail'];
    $msg = $_POST['msg'];
    $asunto = "Contacto desde Blog";

    // Cuerpo del mensaje
    $cuerpo = "Nombre: " . $name . "\n";
    $cuerpo .= "Correo: " . $mail . "\n";
    $cuerpo .= "Mensaje: " . $msg;

    // Cabeceras del correo
    $headers = "From: " . $mail . "\r\n";
    $headers .= "Reply-To: " . $mail . "\r\n";

    // Intentar enviar el correo
    if (mail($to, $asunto, $cuerpo, $headers)) {
        // Si el mensaje se env¨ªa con ¨¦xito, redirigir a escribeme.html con el par¨¢metro 'status=success'
        header("Location: https://blog.technoservices.cl/paginas/escribeme.html?status=success");
        exit(); // Detener la ejecuci¨®n del script
    } else {
        // Si hay un error al enviar, redirigir con 'status=error'
        header("Location: https://blog.technoservices.cl/paginas/escribeme.html?status=error");
        exit();
    }
} else {
    // Si no es un POST, redirigir al formulario
    header("Location: https://blog.technoservices.cl/paginas/escribeme.html");
    exit();
}
?>

