<div class="content-form" id="formUsers">
    <div class="contenido">
        <button class="sal" onclick="ShowObject('formUsers')">x</button>
        <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="POST">

            <div class="papa">

                <h2>Añadir Usuario</h2>

                <div class="hijo">

                    <label>Correo Electronico</label>
                    <input type="email" name="correoUser" placeholder="Inserte un Correo Electronico" required> 

                </div>

                <div class="hijo">

                    <label>Contraseña</label>
                    <input type="password" name="passwordUser" placeholder="Digite una Contraseña" required>

                </div>

                <div class="hijo">

                    <label>Rol</label>
                    <select name="rolUser" id="">
                        <option value="Administrador">Administrador</option>
                        <option value="Empleado">Empleado</option>
                    </select>

                </div>

                <div class="hijo">

                    <label>DNI</label>
                    <input type="number" name="dniPerson" placeholder="digite una DNI valida" required> 

                </div>

                <div class="hijo">

                    <label>Nombre</label>
                    <input type="text" name="nombrePerson" placeholder="Digite un nombre" required> 

                </div>

                <div class="hijo">

                    <label>Telefono</label>
                    <input type="number" name="telefonoPerson" placeholder="Digite un Telefono" required>

                </div>

                <div class="hijo">

                    <label>Direccion</label>
                    <input type="text" name="direccionPerson" placeholder="Digite una direccion" required> 

                </div>

                <input type="submit" name="AddUser">

            </div>
        </form>
    </div>
</div>