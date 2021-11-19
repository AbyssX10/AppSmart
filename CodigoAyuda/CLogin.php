<?php

    include "CConnect.php";

    $txtCorreo = $_POST["txtCorreo"];
    $txtPassword = md5($_POST["txtPassword"]);

    $config = new Connect();

    if ($config->Login($txtCorreo, $txtPassword)){
        echo "<script>alert('Usuario Ingresado');</script>";
    } else {
        echo "<script>alert('".$config->VerifyUser($txtCorreo, $txtPassword)."'); </script>";
    }

?>