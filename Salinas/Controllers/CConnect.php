<?php
    include $dir."/Salinas/Interfaces/IConfigDB.php"; //C:/xampp\htdocs\ADSI\ProyectoCheo/Salinas/Interfaces/IConfigDB.php

    class Connect implements IConfigDB {
        const HOST = "localhost";
        const USER = "root";
        const PASS = "";
        const DB = "ferrexito";

        private $connect;

        public function __construct()
        {
            $this->connect = new mysqli(self::HOST, self::USER, self::PASS, self::DB);
        }

        public function GetConnect() : mysqli 
        {
            return $this->connect;
        }

        public function CheckConnect(): string
        {
            return $this->connect->connect_errno;
        }

        private function Login($pTxtCorreo, $pTxtPassword){
            if (mysqli_fetch_array($this->connect->query("SELECT * FROM users WHERE correoUser = '$pTxtCorreo' AND passwordUser = '$pTxtPassword'"))){
                return true;
            } else {
                return false;
            }
        }

        private function Register($pTxtCorreo, $pTxtPassword, $pTxtRolUser, $pTxtDNI, $pTxtNombre, $pTxtTelefono, $pTxtDireccion){
            if ($this->connect->query("INSERT INTO person VALUES ('$pTxtDNI', '$pTxtNombre', '$pTxtTelefono', '$pTxtDireccion')")){
                if ($this->connect->query("INSERT INTO users (correoUser, passwordUser, rolUser, dniPerson) VALUES ('$pTxtCorreo', '$pTxtPassword', '$pTxtRolUser', '$pTxtDNI')")){
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        private function FindUser($pTxtCorreo){
            if ($fila = mysqli_fetch_array($this->connect->query("SELECT * FROM users u INNER JOIN person p ON u.dniPerson = p.dniPerson AND u.correoUser = '$pTxtCorreo'"))){
                return array("nombrePerson"=>$fila["nombrePerson"], "rolUser"=>$fila["rolUser"]);
            }
        }

        private function VerifyUser($pTxtCorreo, $pTxtPassword){
            if (!mysqli_fetch_array($this->connect->query("SELECT * FROM users WHERE correoUser = '$pTxtCorreo'"))){
                return "Correo no registrado";
            } else if (mysqli_fetch_array($this->connect->query("SELECT * FROM users WHERE correoUser = '$pTxtCorreo' AND passwordUser != '$pTxtPassword'"))){
                return "Contraseña Incorrecta";
            }
        }

        private function GetAllUsers($pTxtRol){
            if ($result = $this->connect->query("SELECT * FROM users u INNER JOIN person p ON u.dniPerson = p.dniPerson AND u.rolUser = '$pTxtRol'")){
                return $result;
            } else {
                return null;
            }
        }

        private function DeleteUser($pTxtCorreo){
            if ($this->connect->query("DELETE u, p FROM users u INNER JOIN person p ON u.dniPerson = p.dniPerson WHERE u.correoUser = '$pTxtCorreo'")){
                return true;
            } else {
                return false;
            }
        }

        // Providers
        private function AddProviderInfo($pNombre, $pDireccion, $pCiudad, $pTelefono, $pNombreContacto){
            if ($this->connect->query("INSERT INTO providers (nombreProveedor, direccionProveedor, ciudadProveedor, telefonoProveedor, nombreContacto) VALUES ('$pNombre', '$pDireccion', '$pCiudad', '$pTelefono', '$pNombreContacto')")){
                return true;
            } else {
                return false;
            }
        }

        private function GetAllProvidersInfo(){
            if ($result = $this->connect->query("SELECT * FROM providers")){
                return $result;
            } else {
                return null;
            }
        }

        private function FindProviderByNameInfo($pNombre){
            if ($fila = mysqli_fetch_array($this->connect->query("SELECT * FROM providers WHERE nombreProveedor = '$pNombre'"))){
                return $fila;
            }
        }

        private function DeleteProvider($pNombre, $pContacto){
            if ($this->connect->query("DELETE FROM providers WHERE nombreProveedor = '$pNombre' AND nombreContacto = '$pContacto'")){
                return true;
            } else {
                return false;
            }
        }

        // Categories
        private function AddCategoryInfo($pNombre){
            if ($this->connect->query("INSERT INTO category (nombreCategoria) VALUES ('$pNombre')")){
                return true;
            } else {
                return false;
            }
        }

        private function GetAllCategoriesInfo(){
            if ($result = $this->connect->query("SELECT * FROM category")){
                return $result;
            } else {
                return null;
            }
        }

        private function FindCategoryByNameInfo($pNombre){
            if ($fila = mysqli_fetch_array($this->connect->query("SELECT * FROM category WHERE nombreCategoria = '$pNombre'"))){
                return $fila;
            }
        }

        private function DeleteCategoryByNameInfo($pNombre){
            if ($this->connect->query("DELETE FROM category WHERE nombreCategoria = '$pNombre'")){
                return true;
            } else {
                return false;
            }
        }

        // Product
        private function AddProductInfo($pNombre, $pCantidad, $pPrecioUnitario, $pReferencia, $pFoto, $pIdProveedor, $pIdCategoria){
            if ($this->connect->query("INSERT INTO products (nombreProducto, cantidadProducto, precioUnitario, referenciaProducto, fotoProducto, idProveedor, idCategoria) VALUES ('$pNombre', '$pCantidad', '$pPrecioUnitario', '$pReferencia', '$pFoto', '$pIdProveedor', '$pIdCategoria')")){
                return true;
            } else {
                return false;
            }
        }

        private function GetAllProductsInfo(){
            if ($result = $this->connect->query("SELECT * FROM products")){
                return $result;
            } else {
                return null;
            }
        }

        /* INTERFACE */

        public function LoginUser($pTxtCorreo, $pTxtPassword) : bool
        {
            return $this->Login($pTxtCorreo, $pTxtPassword);
        }

        public function RegisterUser($pTxtCorreo, $pTxtPassword, $pTxtRolUser, $pTxtDNI, $pTxtNombre, $pTxtTelefono, $pTxtDireccion) : bool
        {
            return $this->Register($pTxtCorreo, $pTxtPassword, $pTxtRolUser, $pTxtDNI, $pTxtNombre, $pTxtTelefono, $pTxtDireccion);
        }

        public function FindUserByEmail($pTxtCorreo) : array
        {
            return $this->FindUser($pTxtCorreo);
        }

        public function VerifyUserExists($pTxtCorreo, $pTxtPassword) : string
        {
            return $this->VerifyUser($pTxtCorreo, $pTxtPassword);
        }

        public function GetAll($pTxtRol)
        {
            return $this->GetAllUsers($pTxtRol);
        }

        public function FindProviderByName($pNombre): array
        {
            return $this->FindProviderByNameInfo($pNombre);
        }

        public function DeleteUserByEmail($pTxtCorreo) : bool
        {
            return $this->DeleteUser($pTxtCorreo);
        }

        // Providers
        public function AddProvider($pNombre, $pDireccion, $pCiudad, $pTelefono, $pNombreContacto): bool
        {
            return $this->AddProviderInfo($pNombre, $pDireccion, $pCiudad, $pTelefono, $pNombreContacto);
        }

        public function GetAllProviders()
        {
            return $this->GetAllProvidersInfo();
        }

        public function DeleteProviderByNameAndContact($pNombre, $pContacto): bool
        {
            return $this->DeleteProvider($pNombre, $pContacto);
        }

        // Categories
        public function AddCategory($pNombre): bool
        {
            return $this->AddCategoryInfo($pNombre);
        }

        public function GetAllCategories()
        {
            return $this->GetAllCategoriesInfo();
        }

        public function FindCategoryByName($pNombre): array
        {
            return $this->FindCategoryByNameInfo($pNombre);
        }

        public function DeleteCategoryByName($pNombre): bool
        {
            return $this->DeleteCategoryByNameInfo($pNombre);
        }

        // Product
        public function AddProduct($pNombre, $pCantidad, $pPrecioUnitario, $pReferencia, $pFoto, $pIdProveedor, $pIdCategoria): bool
        {
            return $this->AddProductInfo($pNombre, $pCantidad, $pPrecioUnitario, $pReferencia, $pFoto, $pIdProveedor, $pIdCategoria);
        }

        public function GetAllProducts()
        {
            return $this->GetAllProductsInfo();
        }
    }

?>