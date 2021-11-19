<!DOCTYPE html>
<html lang="en">
<head>
    <?php

        include ("config.php");
        require_once "./Salinas/Controllers/CSession.php";

        $configSession = new Session();

        if ($configSession->getInstance()->GetSession("user") != null){
            header("location: cms");
        }

    
        include ("Salinas/Views/VHead.php");
        include ("config.php");
        
    ?>
</head>
<body>
    <?php 
    
        include ("Salinas/Views/VPageLogin.php");
        include ("Salinas/Views/VNotification.php");
        include ("Salinas/Views/VFoot.php");
        include ("Salinas/Views/VScripts.php");

    ?>
</body>
</html>