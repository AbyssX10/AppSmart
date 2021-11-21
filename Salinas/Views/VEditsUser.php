<div class="content-form" id="EditsUsers">
    <div class="contenido">
        <button class="sal" onclick="ShowObject('EditsUsers')">x</button>
        <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="POST">

            <div class="papa">

                <h2>Editar Usuario</h2>

                <div class="hijo">

                    <label>DNI</label>
                    <input id="dniPerson" type="number" name="dniPerson" placeholder="Digite un nombre" readonly> 

                </div>

                <div class="hijo">

                    <label>Nombre</label>
                    <input id="nombrePerson" type="text" name="nombrePerson" placeholder="Digite un nombre" required> 

                </div>

                <div class="hijo">

                    <label>Telefono</label>
                    <input id="telefonoPerson"type="number" name="telefonoPerson" placeholder="Digite un Telefono" required>

                </div>

                <div class="hijo">

                    <label>Direccion</label>
                    <input id="direccionPerson" type="text" name="direccionPerson" placeholder="Digite una direccion" required> 

                </div>

                <div class="hijo">

                    <label>Rol</label>
                    <select name="rolUser" id="">
                        <option value="Administrador">Administrador</option>
                        <option value="Empleado">Empleado</option>
                    </select>

                </div>

                <input type="submit" value="Actualizar" name="EditsUser">

            </div>
        </form>
    </div>
</div>