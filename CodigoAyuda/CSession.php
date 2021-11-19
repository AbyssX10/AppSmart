<?php

    class Session {
        const SESSION_STARTED = TRUE;
        const SESSION_NOT_STARTED = FALSE;

        private $sessionState = self::SESSION_NOT_STARTED;

        private static $instance;

        public static function getInstance(){
            if (!isset(self::$instance)){
                self::$instance = new self;
            }

            self::$instance->StartSession();

            return self::$instance;
        }

        public function StartSession(){
            if($this->sessionState == self::SESSION_NOT_STARTED){
                $this->sessionState = session_start();
            }

            return $this->sessionState;
        }

        public function __set($name, $value)
        {
            $_SESSION[$name] = $value;
        }

        public function __get($name)
        {
            if (isset($_SESSION[$name])){
                return $_SESSION[$name];
            }
        }

        public function __unset($name)
        {
            unset($_SESSION[$name]);
        }

        public function Destroy(){
            if ($this->sessionState == self::SESSION_STARTED){
                $this->sessionState = !session_destroy();
                unset($_SESSION);

                return !$this->sessionState;
            }

            return false;
        }
    }

?>