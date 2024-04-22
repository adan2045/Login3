<?php
var_dump($_POST['ingreso']);

$usuarioPrueba_user ='usuario@prueba.ts';
$contraseñaPrueba_user ='contraseña';

//$contraseñaPrueba_hash = password_hash('contraseña', );
$email= " ";
$pasword= " ";
$error_mail= " ";
$error_pasword= " ";


echo"<pre>";
var_dump('$_POST');
echo"</pre>";

//validar
if (isset($_POST['ingreso'])) {
    if (!isset($_POST['mail'])) {
        echo "No existe mail.<hr>";
    } else {
        echo 'Existe mail.<hr>';
        $mail = trim($_POST['mail']);
        if (empty($mail)) {
            echo 'No puede estar vacío.<hr>';
        } else {
            echo 'Mail no vacío.<hr>';
            if (strlen($mail) < 5 || strlen($mail) > 120) {
                echo 'Por favor ingreso un mail entre 5 y 120 caracteres.<hr>';
            } else {
                echo 'Es un correo válido.<hr>';
                if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    echo 'Formato no válido.<hr>';
                } else {
                    echo 'Formato válido.<hr>';
                    if ($mail !== $usuarioPrueba_user) {
                        echo 'Usuario inválido.<hr>';
                    } else {
                        echo 'Usuario válido.<hr>';
                    }
                }
            }
        }
    } 
    if (!isset($_POST['password'])) {
        echo "No existe contraseña.<hr>";
    } else {
        echo 'Existe contraseña.<hr>';
        $password = trim($_POST['password']);
        if (empty($password)) {
            echo 'No puede estar vacío.<hr>';
        } else {
            echo 'Contraseña no vacío.<hr>';
            if (strlen($password) < 3 || strlen($password) > 10) {
                echo 'Por favor ingrese una contraseña entre 3 y 10 caracteres.<hr>';
            }/* else {
                echo 'Contraseña válida.<hr>';
                if ($mail !== $usuarioPrueba_user) {
                    echo 'Usuario inválido.<hr>';
                } else {
                    echo 'Usuario válido.<hr>';
                }*/

                else{
                    if ($email === $usuarioPrueba_user) {
                        $verificar = password_verify($password,
                         $usuarioPrueba_passHash);
                        if ($verificar===false){
                            echo "contraseña incorrecta <hr>";
                        }else{ 
                            echo "todo ok <hr>";
                        }} else {
                            echo "usuario incorrecto<hr>";
                         }

                    }
                }
            }
        }
      else {
    echo'Botón de ingreso no existe.<hr>';
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <main class="row flex flex-justify-center">
        <form class="col_4 login_cont" method="POST">
            <div class="col_12">
                <h1>Iniciar Sesión</h1>
            </div>
            <div class="col_12 inputs">
                <input type="email" name="mail" placeholder="Ingrese su email">
            </div>
            <div class="col_12 inputs">
                <input type="password" name="password" placeholder="Ingrese su contraseña">
            </div>
            <div class="col_12 flex flex-justify-center button_log">
                <button type="submit" name="ingreso">Ingresar</button>
            </div>
        </form>
    </main>
</body>
</html>