<div class="content-products" id="formprod">
    <div class="contenido">
        <div class="content-left">
            <div class="abajo">
                
                <div class="circulo">
                    <input id="foto" type="file" class="foto" accept="image/*" onchange="ChangeImage()"></input>
                </div>
                <h3>Añadir imagen</h3>
            </div>
        </div>

        <div class="content-right">
          <div class="arriba">
              <div class="salir">
                <button class="sal" onclick="ShowObject('formprod')">x</button>
              </div>
          <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="POST" enctype='multipart/form-data'>
            <h3>Añadir Productos</h3>
              <div class="boxx">
                <link rel="stylesheet" type="text/css" href="pagina.css">
                
                <div   class="obj">
                  <div class="etq">
                      <label for="">Nombre: </label>
                   </div>
                    <input type="text" placeholder="Producto">
               </div>

                <div class="obj">
                  <div class="etq">
                    <label for="">Cantidad: </label>
                  </div>
                    <input type="num" placeholder="Cantidad">
                </div>

                <div class="obj">
                  <div class="etq">
                    <label for="">Precio Unitario: </label>
                  </div>
                    <input type="text" placeholder="Precio">
                </div>
                
                <div class="obj">
                  <div class="etq">
                      <label for="">Referencia: </label>
                    </div>
                    <input type="text" placeholder="Referencia">
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
                      <option value=""><?php echo $item["nombreProveedor"]; ?></option>
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
                    </select>
                </div>

                <button class="btn" type="submit" name="AddProduct">Agregar</button>
              <div>
            </form>
          </div>
        </div>
    </div>

   
</div>