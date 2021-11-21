<div class="notification" id="notiGood">
    <div class="content-notification" style="box-shadow: 0 0 4px 0px green;">
        <div class="left">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
            </svg>
        </div>
        <div class="right">
            <p id="mensajeGood" style="padding: 20px; font-size: 20px;">Bienvenido</p>
        </div>
    </div>
</div>

<div class="notification" id="notiBad">
    <div class="content-notification" style="box-shadow: 0 0 4px 0px red;">
        <div class="left">
        <svg style="color: red;" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
        </svg>
        </div>
        <div class="right">
            <p id="mensajeBad"></p>
        </div>
    </div>
</div>

<?php
    require_once $dir."/Salinas/Controllers/CConnect.php"; /*1 ../../../ADSI/ProyectoCheo/Salinas.Controllers/CLogin.php */ /* 2 C:/xampp\htdocs\ADSI\ProyectoCheo/Salinas/Controllers/CConnect.php */
    require_once $dir."/Salinas/Controllers/CSession.php";

    $config = new Connect();
    $configSession = new Session();

    $data = $configSession->getInstance();  

    if (isset($_POST["login"])){

        $txtCorreo = $_POST["txtCorreo"];
        $txtPassword = md5($_POST["txtPassword"]);

        //$config->RegisterUser($txtCorreo, $txtPassword, "Empleado", "28798444", "Carmen Elena Salinas", "3206909714", "Mz 5");

        if ($config->LoginUser($txtCorreo, $txtPassword)){
            $data->SetSession("user", $config->FindUserByEmail($txtCorreo));

            echo "<script>
                document.getElementById('notiGood').style.animation = 'showNoti 0.5s forwards';

                setTimeout(() => {
                    document.getElementById('notiGood').style.animation = 'hideNoti 0.5s forwards';
                }, 2000);
            </script>"; 
            //header("refresh: 2.5; url=cms?name=".$config->FindUserByEmail($txtCorreo)["nombreUser"]."&rol=".$config->FindUserByEmail($txtCorreo)["rol"]);
            header("refresh: 2.5; url=cms");
        } else {
            echo "<script>
                document.getElementById('mensajeBad').innerHTML = '".$config->VerifyUserExists($txtCorreo, $txtPassword)."';
                document.getElementById('notiBad').style.animation = 'showNoti 0.5s forwards';

                setTimeout(() => {
                    document.getElementById('notiBad').style.animation = 'hideNoti 0.5s forwards';
                }, 3000);
                </script>";
        }
    } else {

    }

    if (isset($_GET["exit"])){
        $data->CloseSession("user");
        
        echo "<script>
                document.getElementById('mensajeGood').innerHTML = 'Saliendo';
                document.getElementById('notiGood').style.animation = 'showNoti 0.5s forwards';

                setTimeout(() => {
                    document.getElementById('notiGood').style.animation = 'hideNoti 0.5s forwards';
                }, 2000);

                setTimeout(() => {
                    location.href='principal';
                }, 2500);
            </script>"; 
    }

    if (isset($_POST["delete"])){
        if ($config->DeleteUserByEmail($_POST["txtCorreo"])){
            echo "<script>
                document.getElementById('mensajeGood').innerHTML = 'Usuario Eliminado';
                document.getElementById('mensajeGood').style.fontSize = '15px';
                document.getElementById('mensajeGood').style.padding = '15px';
                document.getElementById('notiGood').style.animation = 'showNoti 0.5s forwards';
                

                setTimeout(() => {
                    document.getElementById('notiGood').style.animation = 'hideNoti 0.5s forwards';
                }, 2000);
            </script>";
        } else {
            echo "<script>
                document.getElementById('mensajeBad').innerHTML = 'Error al Eliminar';
                document.getElementById('mensajeBad').style.fontSize = '15px';
                document.getElementById('mensajeBad').style.padding = '15px';
                document.getElementById('notiBad').style.animation = 'showNoti 0.5s forwards';
                

                setTimeout(() => {
                    document.getElementById('notiGood').style.animation = 'hideNoti 0.5s forwards';
                }, 2000);
            </script>";
        }
    }

    if (isset($_POST["delete-provider"])){
        if ($config->DeleteProviderByNameAndContact($_POST["txtNombreProveedor"], $_POST["txtNombreContacto"])){
            echo "<script>
                document.getElementById('mensajeGood').innerHTML = 'Proveedor Eliminado';
                document.getElementById('mensajeGood').style.fontSize = '15px';
                document.getElementById('mensajeGood').style.padding = '15px';
                document.getElementById('notiGood').style.animation = 'showNoti 0.5s forwards';
                

                setTimeout(() => {
                    document.getElementById('notiGood').style.animation = 'hideNoti 0.5s forwards';
                }, 2000);
            </script>";
        } else {
            echo "<script>
                document.getElementById('mensajeBad').innerHTML = 'Error al Proveedor';
                document.getElementById('mensajeBad').style.fontSize = '15px';
                document.getElementById('mensajeBad').style.padding = '15px';
                document.getElementById('notiBad').style.animation = 'showNoti 0.5s forwards';
                

                setTimeout(() => {
                    document.getElementById('notiGood').style.animation = 'hideNoti 0.5s forwards';
                }, 2000);
            </script>";
        }
    }

    if (isset($_POST["AddProduct"])){
        $file = $_FILES["foto"]["name"];
        $type = $_FILES["foto"]["type"];
        $folder = "imgs/products/";

        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $folder . $file)){
            $imageBase64 = base64_encode(file_get_contents($folder.$file));
            $image = 'data:image/'.$type.';base64,'.$imageBase64;

            if ($config->AddProduct($_POST["nombreProducto"], $_POST["cantidadProducto"], $_POST["precioUnitario"], $_POST["referenciaProducto"], $image, $config->FindProviderByName($_POST["provider"])["idProveedor"], $config->FindCategoryByName($_POST["category"])["idCategoria"])){
                echo "<script>
                    document.getElementById('mensajeGood').innerHTML = 'Producto Añadido';
                    document.getElementById('mensajeGood').style.fontSize = '18px';
                    document.getElementById('mensajeGood').style.padding = '10px';
                    document.getElementById('notiGood').style.animation = 'showNoti 0.5s forwards';
                    

                    setTimeout(() => {
                        document.getElementById('notiGood').style.animation = 'hideNoti 0.5s forwards';
                    }, 2000);
                </script>";
            } else {
                echo "<script>
                    document.getElementById('mensajeBad').innerHTML = 'Error con el Producto';
                    document.getElementById('mensajeBad').style.fontSize = '15px';
                    document.getElementById('mensajeBad').style.padding = '15px';
                    document.getElementById('notiBad').style.animation = 'showNoti 0.5s forwards';
                    

                    setTimeout(() => {
                        document.getElementById('notiGood').style.animation = 'hideNoti 0.5s forwards';
                    }, 2000);
                </script>";
            }
        }

    }

    if (isset($_POST["AddUser"])){
        $correoUser = $_POST["correoUser"];
        $passwordUser = md5($_POST["passwordUser"]);
        $rolUser = $_POST["rolUser"];
        $dniPerson = $_POST["dniPerson"];
        $nombrePerson = $_POST["nombrePerson"];
        $telefonoPerson = $_POST["telefonoPerson"];
        $direccionPerson = $_POST["direccionPerson"];

        if ($config->RegisterUser($correoUser, $passwordUser, $rolUser, $dniPerson, $nombrePerson, $telefonoPerson, $direccionPerson)){
            echo "<script>
                    document.getElementById('mensajeGood').innerHTML = 'Usuario Añadido';
                    document.getElementById('mensajeGood').style.fontSize = '18px';
                    document.getElementById('mensajeGood').style.padding = '10px';
                    document.getElementById('notiGood').style.animation = 'showNoti 0.5s forwards';
                    

                    setTimeout(() => {
                        document.getElementById('notiGood').style.animation = 'hideNoti 0.5s forwards';
                    }, 2000);
                </script>";
        } else{ 
            echo "<script>
                    document.getElementById('mensajeBad').innerHTML = 'Error con el Usuario';
                    document.getElementById('mensajeBad').style.fontSize = '15px';
                    document.getElementById('mensajeBad').style.padding = '15px';
                    document.getElementById('notiBad').style.animation = 'showNoti 0.5s forwards';
                    

                    setTimeout(() => {
                        document.getElementById('notiGood').style.animation = 'hideNoti 0.5s forwards';
                    }, 2000);
                </script>";
        }
    }
 
    if(isset ($_POST["delete-producto"])){
        if($config->DeleteProductByNameAndReference($_POST["nombreProducto"],$_POST["nombreReferencia"])){
            echo "<script>
            document.getElementById('mensajeGood').innerHTML = 'Producto Eliminado';
            document.getElementById('mensajeGood').style.fontSize = '18px';
            document.getElementById('mensajeGood').style.padding = '10px';
            document.getElementById('notiGood').style.animation = 'showNoti 0.5s forwards';
            

            setTimeout(() => {
                document.getElementById('notiGood').style.animation = 'hideNoti 0.5s forwards';
            }, 2000);
         </script>";
        }
        else{
            echo "<script>
                    document.getElementById('mensajeBad').innerHTML = 'Error con el Producto';
                    document.getElementById('mensajeBad').style.fontSize = '15px';
                    document.getElementById('mensajeBad').style.padding = '15px';
                    document.getElementById('notiBad').style.animation = 'showNoti 0.5s forwards';
                    

                    setTimeout(() => {
                        document.getElementById('notiGood').style.animation = 'hideNoti 0.5s forwards';
                    }, 2000);
                </script>";
        }
    }

    if(isset($_POST["EditsUser"]))
    {
        if($config->UpdateUser($_POST["dniPerson"],$_POST["nombrePerson"],$_POST["telefonoPerson"],
        $_POST["direccionPerson"],$_POST["rolUser"])){

            echo "<script>
            document.getElementById('mensajeGood').innerHTML = 'Usuario Actualizado';
            document.getElementById('mensajeGood').style.fontSize = '18px';
            document.getElementById('mensajeGood').style.padding = '10px';
            document.getElementById('notiGood').style.animation = 'showNoti 0.5s forwards';
            

            setTimeout(() => {
                document.getElementById('notiGood').style.animation = 'hideNoti 0.5s forwards';
            }, 2000);
         </script>";   
        }
        else {
            echo "<script>
            document.getElementById('mensajeBad').innerHTML = 'Error con el actualizar';
            document.getElementById('mensajeBad').style.fontSize = '15px';
            document.getElementById('mensajeBad').style.padding = '15px';
            document.getElementById('notiBad').style.animation = 'showNoti 0.5s forwards';
            

            setTimeout(() => {
                document.getElementById('notiGood').style.animation = 'hideNoti 0.5s forwards';
            }, 2000);
        </script>";
        }
    
    }
?>