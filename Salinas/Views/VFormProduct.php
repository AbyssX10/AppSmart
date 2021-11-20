<div class="content-products" id="formprod">
    <div class="contenido">
        <button class="sal" onclick="ShowObject('formprod')">x</button>
        <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="POST" enctype='multipart/form-data'>
            <div class="content-left">
                <div class="mask-foto">
                    <input name="foto" id="foto" type="file" accept="image/*" onchange="ChangeImage()"></input>
                </div>
                <h3>Añadir Imagen</h3>
            </div>

            <div class="content-right">
                <h3>Añadir Productos</h3>
                <div class="boxx">                    
                    <div class="obj">
                        <div class="etq">
                            <label for="">Nombre: </label>
                        </div>
                        <input name="nombreProducto" type="text" placeholder="Producto">
                    </div>

                    <div class="obj">
                        <div class="etq">
                            <label for="">Cantidad: </label>
                        </div>
                        <input name="cantidadProducto" type="number" placeholder="Cantidad">
                    </div>

                    <div class="obj">
                        <div class="etq">
                            <label for="">Precio Unitario: </label>
                        </div>
                        <input name="precioUnitario" type="text" placeholder="Precio">
                    </div>
                    
                    <div class="obj">
                        <div class="etq">
                            <label for="">Referencia: </label>
                        </div>
                        <input name="referenciaProducto" type="text" placeholder="Referencia">
                    </div>

                    <div class="obj">
                        <div class="etq">
                            <label for="">Proveedor: </label>
                        </div>

                        <select name="provider" id="">
                            <option value="">Selecciona un proveedor</option>
                            <?php
                            
                                foreach($config->GetAllProviders() as $item){
                            
                            ?>
                            <option value="<?php echo $item["nombreProveedor"]; ?>"><?php echo $item["nombreProveedor"]; ?></option>
                            <?php
                            
                                }

                            ?>
                        </select>
                    </div>

                    <div class="obj">
                        <div class="etq">
                            <label for="">Categoria: </label>
                        </div>

                        <!--<input list="categories" placeholder="Selecciona/Escribe una categoría" name="category">
                        <datalist id="categories">
                        <option value="Opcion1"></option>
                        </datalist>-->

                        <select name="category" id="">
                        <option value="">Selecciona una categoría</option>

                        <?php
                        
                            foreach ($config->GetAllCategories() as $item){

                        ?>
                        <option value="<?php echo $item["nombreCategoria"]; ?>"><?php echo $item["nombreCategoria"]; ?></option>
                        
                        <?php
                        
                            }

                        ?>
                        </select>
                    </div>

                    <button class="btn" type="submit" name="AddProduct">Agregar</button>
                <div>
            </div>
        </form>
    </div>
</div>