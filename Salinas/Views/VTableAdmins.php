<?php

    require_once $dir."Salinas/Controllers/CConnect.php";

    $config = new Connect();
?>

<div class="content-table">
    <div class="content-header">
        <p>Admins <b>Management</b></p>

        <div class="header-inputs">
            <div class="inputs">
                <div class="child">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-file-earmark-arrow-down-fill" viewBox="0 0 16 16">
                        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0z"/>
                    </svg>
                </div>
                <input type="submit" value="Export to Excel" onclick="tableToExcel('table-admins', 'Administradores')">
            </div>
            <div class="inputs">
                <div class="child">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                    </svg>
                </div>
                <input type="submit" value="Add New User" onclick="ShowObject('formUsers')">
            </div>
        </div>

        <div class="header-inputs-mobile">
            <div class="inputs">
                <div class="child">
                    <button onclick="tableToExcel('table-admins', 'Administradores')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-file-earmark-arrow-down-fill" viewBox="0 0 16 16">
                            <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0z"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="inputs">
                <div class="child">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <table id="table-admins">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Email</td>
                    <td>Fullname</td>
                    <td>Phone</td>
                    <td>Rol</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                <?php

                    foreach($config->GetAll("Administrador") as $item){
                        
                ?>
                    <tr style="<?php if($_SESSION["user"]["nombrePerson"] == $item["nombrePerson"]) echo "cursor: not-allowed; background-color: #DADADA; color: #616161;" ?>">
                        <td><?php echo $item["idUser"]; ?></td>
                        <td><?php echo $item["correoUser"]; ?></td>
                        <td><?php echo $item["nombrePerson"]; ?></td>
                        <td><?php echo $item["telefonoPerson"]; ?></td>
                        <td><?php echo $item["rolUser"]; ?></td>
                        <td>
                            <div class="inputs-actions">
                                <div class="left">
                                    <button onclick="<?php if($_SESSION["user"]["nombrePerson"] == $item["nombrePerson"]) { echo "event.cancelBubble = true;"; } else { echo "alert('xd');"; } ?>" style="<?php if($_SESSION["user"]["nombrePerson"] == $item["nombrePerson"]) echo "cursor: not-allowed;" ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                                            <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                                        </svg>
                                    </button>
                                </div>
                                <div class="right">
                                    <button id="Delete" onclick="<?php if($_SESSION["user"]["nombrePerson"] == $item["nombrePerson"]) { echo "event.cancelBubble = true;"; } else { echo "Confirm('".$item["nombrePerson"]."', '".$item["correoUser"]."', '".$item["rolUser"]."')"; } ?>" style="<?php if($_SESSION["user"]["nombrePerson"] == $item["nombrePerson"]) echo "cursor: not-allowed;" ?>">
                                        <svg class="trash" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php
                
                    }
                
                ?>
            </tbody>
        </table>
    </div>
</div>

