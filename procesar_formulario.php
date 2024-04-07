<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $comentarios = $_POST['comentarios'];
    
    // Correo electrónico al que quieres enviar los datos del formulario
    $destinatario = 'magy@magytarot.mx';
    
    // Asunto del correo electrónico
    $asunto = 'Contacto desde sitio web LEKET';

    // Construir el cuerpo del correo electrónico
    $mensaje = "Nombre: $nombre\n";
    $mensaje .= "Correo electrónico: $email\n";
    $mensaje .= "Telefono: $telefono\n";
    $mensaje .= "Comentarios: $comentarios\n";

    // Cabeceras del correo electrónico
    $headers = 'From: ' . $email . "\r\n" .
               'Reply-To: ' . $email . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    // Enviar el correo electrónico
    if (mail($destinatario, $asunto, $mensaje, $headers)) {
        // Redirigir al usuario a otra página
        header('Location: gracias.html');
        exit;
    } else {
        echo "<h2>Error al enviar el formulario. Por favor, intenta nuevamente más tarde.</h2>";
    }
} else {
    echo "<h2>Error: Acceso no permitido</h2>";
}
?>
