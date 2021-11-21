<div class="content-confirm" id="confirm-product">
    <div class="confirm">
        <div class="confirm-header">
            <p>¿Estas seguro que quieres eliminar a <b id="nombreProducto">Productos</b>?</p>
            <button onclick="ShowObject('confirm-product')"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg></button>
        </div>
        <div class="confirm-body">
            <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="POST">
                <div class="confirm-label">
                    <div class="group">
                        <div class="label-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                            </svg>
                        </div>
                        <div class="label-date">
                            <input type="text" name="nombreProducto" id="nombreProductox" readonly>
                        </div>
                    </div>
                </div>

                <div class="confirm-label">
                    <div class="group">
                        <div class="label-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                        </div>
                        <div class="label-date">
                            <input type="text" name="nombreReferencia" id="nombreReferencia" readonly>
                        </div>
                    </div>
                </div>

                <input type="submit" name="delete-producto" value="Eliminar"> <!-- onclick = <?php /*echo "alert('".$_SERVER["PHP_SELF"]."?name=".$_GET["name"]."&delete=delete'); ";*/ ?> -->
            </form>
        </div>
    </div>
</div>