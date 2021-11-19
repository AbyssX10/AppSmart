<?php

    require_once $dir."/Salinas/Controllers/CSession.php";

    $configSession = new Session();

    $data = $configSession->getInstance();

?>

<div class="content-menu">
    <aside class="sidebar">
        <header>
            <img src="https://cdn-icons-png.flaticon.com/512/147/147140.png" alt="">
            <p>
                <?php echo $data->GetSession("user")["nombrePerson"]; ?>
                <br>
                <span class="rol">[ <?php echo $data->GetSession("user")["rolUser"]; ?> ]</span>
            </p>
        </header>

        <nav>
            <ul>
                <li>
                    <div class="buttons">
                        <div class="left">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                            </svg>
                        </div>
                        <div class="right">
                            <input type="submit" value="Dashboard" onclick="location.href='cms'"> <!-- 1 ../../../ADSI/ProyectoCheo/cms.php?name=echo $_GET['name']--> <!-- onclick="location.href='../../../ProyectoCheo/cms'" -->
                        </div>
                    </div>
                </li>

                <li style="<?php if($_SESSION["user"]["rolUser"] == "Administrador") { echo "display: block;"; } else { echo "display: none;"; }?>"> <!-- 1. php if($_GET["rol"] == "Administrador") { echo "display: block;"; } else { echo "display: none;"; }?>-->
                    <div class="buttons">
                        <div class="left">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                        </div>
                        <div class="right">
                            <input type="submit" value="User Profile" onclick="location.href='cms-userprofile'"> <!-- importante: ?name=php echo $_GET['name']?>&rol=php echo $_GET['rol']; --> <!-- ../../../ProyectoCheo/cms-userprofile -->
                        </div>
                    </div>
                </li>

                <li>
                    <div class="buttons">
                        <div class="left">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                                <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                        </div>
                        <div class="right">
                            <input type="submit" value="Products" onclick="location.href='cms-products'">
                        </div>
                    </div>
                </li>

                <li style="<?php if($_SESSION["user"]["rolUser"] == "Administrador") { echo "display: block;"; } else { echo "display: none;"; }?>">
                    <div class="buttons">
                        <div class="left">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pie-chart-fill" viewBox="0 0 16 16">
                            <path d="M15.985 8.5H8.207l-5.5 5.5a8 8 0 0 0 13.277-5.5zM2 13.292A8 8 0 0 1 7.5.015v7.778l-5.5 5.5zM8.5.015V7.5h7.485A8.001 8.001 0 0 0 8.5.015z"/>
                        </svg>
                        </div>
                        <div class="right">
                            <input type="submit" value="Graphics">
                        </div>
                    </div>
                </li>

                <li>
                    <div class="buttons">
                        <div class="left">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                            </svg>
                        </div>
                        <div class="right">
                            <input type="submit" value="Help">
                        </div>
                    </div>
                </li>
            </ul>
        </nav>

        <div class="bottom">
            <div class="buttons exit">
                <div class="left">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </div>
                <div class="right">
                    <input type="submit" name="exit" value="Exit" onclick="location.href='cms?exit=exit'"> <!-- onclick="location.href='../../../ADSI/ProyectoCheo/cms.php?name= echo $_GET['name']?>&exit=exit''" -->
                </div>
            </div>
        </div>
    </aside>
</div>