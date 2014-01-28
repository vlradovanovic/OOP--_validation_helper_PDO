<?php

class Input_class
{
    //Ukoliko postoji unos, prveri da li je GET ili POST, oba dolaze u obzir
    //Default je 'post'
    
    public static function exist($case = 'post') 
    {
        switch ($case) {
            case 'post':
                
                if (!empty($_POST))
                {
                    return TRUE;
                }
                else                    return FALSE;

                break;
                
                  case 'get':
                
                if (!empty($_GET))
                {
                    return TRUE;
                }
                else                    return FALSE;

                break;

            default:
                break;
        }
    }
    
    public static function input($value) 
    {
        if (isset($_POST[$value]))
        {
            return $_POST[$value];
        }
        
        elseif (isset ($_GET[$value])) {
        
            return $_GET[$value];
    }
    return '';
    }
    
    
}