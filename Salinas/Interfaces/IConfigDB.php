<?php

    interface IConfigDB {
        /* LOGIN, REGISTER, USERS TABLE */

        /**
         * Login
         * 
         * Función que se encarga de buscar en la base de datos una cuenta de usuario de acuerdo al correo electrónico
         * y su contraseña. Retorna dos estados (true/false).
         * 
         * true: Si encontro una cuenta de usuario y se autenticó 
         * 
         * false: Si no encontro coincidencia alguna
         * 
         * @author Jose Luis Salinas
         * @author Katerin Vanesa Vega Roa
         * @author Jhon Mario Diaz Bustos
         */
        public function LoginUser($pTxtCorreo, $pTxtPassword) : bool;

        /**
         * Register
         * 
         * Función que se encarga de ingresar un nuevo registro a la base de datos como cuenta de usuario, junto con
         * la información de dicha cuenta. Retorna dos estados (true/false).
         * 
         * true: Si pudo añadir un nuevo registro a la base de datos.
         * 
         * false: Si se presentó algún problema con el nuevo registro.
         * 
         * @author Jose Luis Salinas
         * @author Katerin Vanesa Vega Roa
         * @author Jhon Mario Diaz Bustos
         */
        public function RegisterUser($pTxtCorreo, $pTxtPassword, $pTxtRolUser, $pTxtDNI, $pTxtNombre, $pTxtTelefono, $pTxtDireccion) : bool;
        
        /**
         * Find User By Email
         * 
         * Función que se encarga de buscar un registro en la base de datos de acuerdo al correo electrónico.
         * Retorna un array asociativo con la información del registro.
         * 
         * @var nombreUser correoUser
         * @var rolUser  rol
         * @author Jose Luis Salinas
         * @author Katerin Vanesa Vega Roa
         * @author Jhon Mario Diaz Bustos
         */
        public function FindUserByEmail($pTxtCorreo) : array; /* Fix */

        /**
         * Verify User Exists
         * 
         * Función que se encarga de verificar la existencia de una cuenta, en una primera instancia verifica si el correo
         * electrónico existe, si no existe, retorna un mensaje diciendo que el correo no ha sido registrado; de lo contrario,
         * si el correo existe pero la contraseña no coincide con la del registro, retornará un mensaje diciendo que la
         * contraseña es incorrecta. Esta función retorna un string con dicho mensaje de notificación.
         * 
         * @author Jose Luis Salinas
         * @author Katerin Vanesa Vega Roa
         * @author Jhon Mario Diaz Bustos
         */
        public function VerifyUserExists($pTxtCorreo, $pTxtPassword) : string; /* Fix */

        /**
         * Get All
         * 
         * Función que se encarga de obtener todos los registros de una tabla de la base de datos de acuerdo al rol. 
         * Retorna un mysqli_result con los registros de la tabla.
         * 
         * @author Jose Luis Salinas
         * @author Katerin Vanesa Vega Roa
         * @author Jhon Mario Diaz Bustos
         */
        public function GetAll($pTxtRol);

        /**
         * Delete User By Email
         * 
         * Función que se encarga de eliminar un registro de la base de datos de acuerdo a su correo electrónico. Retorna
         * dos estados (true/false);
         * 
         * true: Si pudo eliminar el registro de la base de datos.
         * 
         * false: Si ocurrió algún error durante el proceso de eliminación.
         * 
         * @author Jose Luis Salinas
         * @author Katerin Vanesa Vega Roa
         * @author Jhon Mario Diaz Bustos
         */
        public function DeleteUserByEmail($pTxtCorreo) : bool; /* Fix */

        /* PROVIDERS */

        public function AddProvider($pNombre, $pDireccion, $pCiudad, $pTelefono, $pNombreContacto) : bool;
        public function GetAllProviders();
        public function DeleteProviderByNameAndContact($pNombre, $pContacto) : bool;
    }

?>