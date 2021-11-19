<?php

    interface IConfigSession {
        /**
         * Set Session
         * 
         * Función que se encarga de iniciar una sesión con los datos del usuario (nombreUser, rolUser). Ésta función no
         * tiene retorno. Los datos de la sesión son extraídas directamente de la base de datos.
         * 
         * @author Jose Luis Salinas
         * @author Katerin Vanesa Vega Roa
         * @author Jhon Mario Diaz Bustos
         */
        public function SetSession($pNameSession, $pDataSession);

        /**
         * Get Session
         * 
         * Función que se encarga de obtener una sesión. Si la sesión existe retornará un objeto mixto con los datos
         * de la sesión.
         * 
         * @var nombreUser
         * @var rolUser
         * @author Jose Luis Salinas
         * @author Katerin Vanesa Vega Roa
         * @author Jhon Mario Diaz Bustos
         */
        public function GetSession($pNameSession) : ?array;

        /**
         * Close Session
         * 
         * Función que se encarga de cerrar una sesión. Retorna dos estados (true/false).
         * 
         * true: Si pudo cerrar la sesión.
         * false: Si se presento algún error al cerrar la sesión.
         * 
         * @author Jose Luis Salinas
         * @author Katerin Vanesa Vega Roa
         * @author Jhon Mario Diaz Bustos
         */
        public function CloseSession($pNameSession) : bool;
    }

?>