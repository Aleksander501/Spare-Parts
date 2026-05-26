
<?php
function CRUD($query,$tipo)
{
    $consultas = new Procesos();
    $data = $consultas->isdu($query,$tipo);
    return $data;
}

    function AccesoLogin($user,$passw,$tabla,$campo)
    {
        $consulta = new Procesos();
        $data = $consulta->GetDataUser($user,$tabla,$campo);
        if($data)
        {
            foreach($data AS $result)
            {
                $iduser = $result['id_usuario'];
                $hash = $result['contraseña'];
                $estado = $result['estado'];
                $tipo = $result['tipo'];
            }
            if($estado == 1)
            {
                if(password_verify($passw,$hash))
                {
                    $_SESSION['iduser'] = $iduser;
                    $_SESSION['user'] = $user;
                    $_SESSION['tipo'] = $tipo;
                    $_SESSION['login_ok'] = 1;
                    echo '<script>
                            window.location.href = "../index.php";
                        </script>';
                }
                else{
                    $_SESSION['msj'] = "Contraseña incorrecta...";
                    echo '<script>
                        window.location.href="../index.php";
                    </script>';
                }
            }
            else
            {
                $_SESSION['msj'] = "El usuario no tiene permisos de acceso...";
                echo '<script>
                        window.location.href="../index.php";
                    </script>';
            }
        }
        else{
            $_SESSION['msj'] = "Usuario no existe...";
            echo '<script>
                    window.location.href="../index.php";
                </script>';
        }
    }
    function Token($longitud)
    {
        $key = '';
        $cadena = "0123456789abcdefghijklmnopqrstuwxyz";
        for($i=0;$i < $longitud;$i++)
        {
            $key .= $cadena[rand(0,35)];
        }
        return $key;
    }

    function buscarvalor($tabla,$campo,$condicion)
    {
        $valor = NULL;
        $consulta = new Procesos();
        $datos = $consulta->BuscaValor($tabla,$campo,$condicion);
        if($datos)
        {
            foreach ($datos AS $result)
            {
                $valor = $result['0'];
            }
            return $valor;
        }

    }

    function Email($email,$token)
    {
        $desde = "admin@gmail.com";
        $cabecera = "From. Soporte '< '".$desde.'>'."\r\n".'Reply-To'.$desde."\r\n";
        $cabecera .= 'Content-type: text/html; charset=utf-8'."\r\n";
        $msj = "<b>Token</b>".$token;
        mail($email,"Solicitud de Token",$msj,$cabecera);
    }
    function CambioClave($token,$passw1,$passw2)
    {
        $buscaToken = buscarvalor("usuarios","COUNT(token)","token='$token'");
        $idusuario = buscarvalor("usuarios","id_usuario","token='$token'");

        if ($buscaToken !=0) {
            if ($passw1 === $passw2) {
                $newpassw = password_hash($passw1, PASSWORD_DEFAULT);
                $update = CRUD("UPDATE usuarios SET contraseña='$newpassw',token='' WHERE id_usuario='$idusuario'","u");

                if ($update) {
                    echo '<script>
                    alertify.success("Contraseña actualizada");
                    $("#data").load("./index.php");
                </script>';
                }else {
                    echo '<script>
                    alertify.success("Contraseña no actualizada");
                    $("#data").load("./views/olvide_clave.php");
                </script>';
                }
            }else {
                echo '<script>
                alertify.success("Error contraseña no coinciden..");
                $("#data").load("./views/cambio_clave.php");
            </script>';
            }
        }else {
            echo '<script>
            alertify.success("Token no coincide..");
            $("#data").load("./views/cambio_clave.php");
        </script>';
        }

    }

    function CountReg($query)
    {
        $consultas = new Procesos();
        $data = $consultas->row_data($query);
        return $data;
    }
?>
