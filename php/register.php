<?php
// Incluir el archivo de conexión a la base de datos
include './conection_bd.php';

    $Id_Name = $_POST['Id_Name'];
    $Name_User = $_POST['Name_User'];
    $User_Correo = $_POST['User_Correo'];
    $User_Password = $_POST['User_Password'];


// Consulta simplificada para verificar si el correo ya existe
$query = "SELECT 1 FROM users WHERE User_Correo = '$User_Correo' LIMIT 1";
$result = mysqli_query($conn, $query);

// Si el correo ya está en la base de datos
if (mysqli_num_rows($result) > 0) {
    echo '
    <script>
        alert("Este correo ya está registrado. Intenta con otro.");
        window.location = "../login.html";
    </script>';
    exit();
} 


// Hashar la contraseña antes de guardarla
$hashed_password = password_hash($User_Password, PASSWORD_DEFAULT);


    $query = "INSERT INTO users(Id_Name, Name_User, User_Correo, User_Password)
        VALUES ('$Id_Name', '$Name_User', '$User_Correo', '$hashed_password' )";

    $execute = mysqli_query ($conn,$query);

    if($execute){
        echo '
        <script>
            alert("Usuario registrado Exitosamente!");
            window.location = "../index.html";
        </script>
        ';
    }else {
        echo'
            <script>
            alert("Usuario NO registrado, Intentalo mas tarde.");
            window.location = "../login.html";
            </script>';
    }

    mysqli_close($conn);

?>