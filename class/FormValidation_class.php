<?php


class FormValidation_class
{
    //Definisani property
    private $__database = null,
            $__error = array(),
            $__success = false;
    
    public function __construct() {
      $this->__database = DataBase_class::instance();

    }
    
    public function check($input, $fields = array())
    {
        foreach ($fields as $fields => $rules) {
            foreach ($rules as $key => $key_value) {
                $value = $input[$fields]; // Unos sa tastature, polje <textbox>
                
                if ($key === 'obavezno' && empty($value)) //U slucaju da je polje obavezno a da je unos prazan
                {
                   $this->addError("{$fields} je obavezno uneti."); //Npr: Korisnicko ime je obavezno
                }
                
                elseif (!empty ($value)) {
                    
                    switch ($key) {
                        case 'minimalno':

                           if (strlen($value) < $key_value)
                           {
                               $this->addError("Polje {$fields} mora imati najmanje {$key_value} karaktera.");
                           }
                            break;
                            
                        case 'maksimalno':
                        {
                            
                            if (strlen($value) > $key_value)
                            {
                                $this->addError("Polje {$fields} mora imati najviše {$key_value} karaktera.");
                            }
                        }
                            break;
                            
                        case 'jedinstven': //U slucaju da vec postoji taj username u bazi
                        {
                            
                            $query = $this->__database->query("korisnicko_ime");
                           
                            if ($query->count())
                            {
                               $this->addError("{$fields} postoji u bazi, pokušajte sa nekim drugim.");
                            }
                        }
                        break;
                            
                        case 'isto':
                        {
                            
                            if ($value != $input[$key_value])
                            {
                                $this->addError("Polje {$fields} mora biti isto kao polje lozinka");
                            }
                        }
                        break;
                            
                        case 'ispravno':
                        {
                            
                            if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $value))
                                    {
                                        $this->addError("Pogrešan {$key_value} format");
                                    }
                        }
                        break;

                        default:
                            break;
                    }
                
            }
            }
        }
        
        if (empty($this->__error))
        {
            $this->__success = TRUE;
        }
        return $this; //Vraca current objekat
    }
    
    public function success()
    {
        return $this->__success;
    }
    
    public function error()
    {
        return $this->__error;
    }
    
    private function addError($error)
    {
       $this->__error[] = $error;
    }

}