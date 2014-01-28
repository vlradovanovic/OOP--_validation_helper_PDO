<?php

class DataBase_class {
    
    //Definisani property
    
    private static $__instance = null;
    
    private  $__pdo,
            $__error = false,
            $__result,
            $__query,
            $__count = 0;
    
    private function __construct() {
        
    // Napraviti konekciju prema bazi
        
    $hostname = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "validacija";
    
    try {
         $conn = "mysql:host=$hostname;dbname=$dbname";
        
        $this->__pdo = new PDO($conn, $user, $pass);
        
    } 
    
         catch (Exception $exc) {
            die($exc->getMessage());
        }
        }
    
        
        public static function instance()
        {
            //Pomocu instance() komuniciramo sa bazom iz razlicitih klasa
            
            if (!isset(self::$__instance))
            {
                self::$__instance = new DataBase_class();
            }
            
            return self::$__instance;
        }
        
        public function query($value)
        {
            $this->__error = FALSE;
            
  
                    if ($this->__query = $this->__pdo->prepare("SELECT * FROM korisnici WHERE korisnicko_ime = :name"))
                    {
                        
                        $this->__query->bindParam(":name", Input_class::input($value));
                        
                        if ($this->__query->execute())
                        {
                              $this->__result = $this->__query->fetchAll(PDO::FETCH_OBJ);
                              $this->__count = $this->__query->rowCount();
                        }
                    }
                
                else {
                    
                $this->__error = TRUE;

            }
          
            return $this;
}


        public function count()
        {
            return $this->__count;
        }
        
       
        
        public function result()
        {
            return $this->__result;
        }
        
        public function error()
        {
            return $this->__error;
        }
    
}