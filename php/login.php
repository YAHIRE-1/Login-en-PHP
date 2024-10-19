<?php
// Incluir el archivo de conexión a la base de datos
include './conection_bd.php';

// Obtener los datos del formulario
$User_Correo = $_POST['User_Correo'];
$User_Password = $_POST['User_Password'];

// Escapar los datos para evitar inyección SQL
$User_Correo = mysqli_real_escape_string($conn, $User_Correo);
$User_Password = mysqli_real_escape_string($conn, $User_Password);

// Consulta para verificar si el correo existe en la base de datos
$query = "SELECT * FROM users WHERE User_Correo = '$User_Correo' LIMIT 1";
$result = mysqli_query($conn, $query);

// Verificar si la consulta obtuvo resultados
if (mysqli_num_rows($result) > 0) {
    // Obtener los datos del usuario
    $user = mysqli_fetch_assoc($result);

    // Verificar si la contraseña es correcta
    if (password_verify($User_Password, $user['User_Password'])) {
        // Si la contraseña es correcta, iniciar sesión
        echo '
        <script>
            alert("Login exitoso. Bienvenido!");
            window.location = "../text.html";
        </script>';
        exit();
    } else {
        // Si la contraseña es incorrecta
        echo '
        <script>
            alert("Contraseña incorrecta. Inténtalo de nuevo.");
            window.location = "../login.html";
        </script>';
        exit();
    }
} else {
    // Si el correo no está registrado
    echo '
    <script>
        alert("El correo no está registrado. Por favor, regístrate.");
        window.location = "../login.html";
    </script>';
    exit();
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
