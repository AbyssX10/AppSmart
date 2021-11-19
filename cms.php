<!DOCTYPE html>
<html lang="en">
<head>
    <?php 

        include ("config.php");
        require_once "./Salinas/Controllers/CSession.php";

        $configSession = new Session();

        if ($configSession->getInstance()->GetSession("user") == null){
            header("location: principal");
        }
    
        include ("Salinas/Views/VHead.php");
    
    ?>
</head>
<body>
    <div class="content-cms">
        <?php 
        
            include ("Salinas/Views/VSideBar.php");
            include ("Salinas/Views/VMenuResponsive.php");
            include ("Salinas/Views/VNotification.php")

        ?>

        <div class="content-screen">

        </div>
    </div>

    <?php 
    
        include ("Salinas/Views/VScripts.php");
        
        
    ?>
</body>
</html>