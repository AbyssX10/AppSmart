<?php
    include $dir."Salinas/Interfaces/IConfigSession.php";

    class Session implements IConfigSession {
        const SESSION_ACTIVE = TRUE;
        const SESSION_INACTIVE = FALSE;

        private $sessionState = self::SESSION_INACTIVE;
        private static $instance;

        public function __construct()
        {
            
        }

        public static function getInstance(){
            if (!isset(self::$instance)){
                self::$instance = new self;
            }

            self::$instance->StartSession();

            return self::$instance;
        }

        private function StartSession(){
            if ($this->sessionState == self::SESSION_INACTIVE){
                $this->sessionState = session_start();
            }

            return $this->sessionState;
        }

        private function SetSessionInfo($pNameSession, $pValueSession){
            $_SESSION[$pNameSession] = $pValueSession;
        }

        private function GetSessionInfo($pNameSession){
            if (isset($_SESSION[$pNameSession])){
                return $_SESSION[$pNameSession];
            }
        }

        private function DestroySession($pNameSession){
            if ($this->sessionState == self::SESSION_ACTIVE){
                $this->sessionState = !session_destroy();
                unset($_SESSION[$pNameSession]);

                return !$this->sessionState;
            }

            return false;
        }

        // INTERFACE

        public function SetSession($pNameSession, $pDataSession)
        {
            $this->SetSessionInfo($pNameSession, $pDataSession);
        }

        public function GetSession($pNameSession) : ?array 
        {
            return $this->GetSessionInfo($pNameSession);
        }

        public function CloseSession($pNameSession): bool
        {
            return $this->DestroySession($pNameSession);
        }
    }

?>