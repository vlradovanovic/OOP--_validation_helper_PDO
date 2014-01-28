<?php 

spl_autoload_register(function($class) //Biblioteka koja ucitava sve klase projekta
{
    require_once 'class/'.$class.'.php';
}
    );
    
  if (Input_class::exist())
  {
      $formvalidation = new FormValidation_class();
      
      $validate = $formvalidation->check($_POST, array(
          
          'korisnicko_ime' => array(
              'obavezno' => TRUE,
              'minimalno' => 4,
              'maksimalno' => 20,
              'jedinstven' => 'korisnici'
          ),
          
              'lozinka' => array(
              'obavezno' => TRUE,
              'minimalno' => 5,
              'maksimalno' => 25,
      ),
          'ponovo_lozinka' => array(
              
              'obavezno' => TRUE,
              'isto' => 'lozinka' 
          ),
          
          'email' => array(
              'obavezno' => TRUE,
              'ispravno' => 'email'
              
          )));
      
      if ($validate->success())
      {
          ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Registracija korisnika</title>
        <link rel="stylesheet" type="text/css" href="xHTML/css/style.css">
    </head>
    <body>
        
        <div id="signup-form">
            <div id="signup-inner">
                <div class="clearfix" id="header">
                    <img id="signup-inner" src="xHTML/images/signup.png" alt>
                    <h1>
                        Isprobaj validation helper <br/>
                        Registruj se!
                    </h1>   
                   <br />
                    
                </div>
                
                <?php
                          echo 'Validacija uspešno prošla';
                ?>
                
                
                <form method="post" action="" id="send">
                    
                    <p>
                        <label for="korisnicko_ime">Korisničko ime *</label>
                        <input type="text" name="korisnicko_ime" id="korisnicko_ime">
                    </p>
                    
                    <p>
                        <label for="lozinka">Lozinka *</label>
                        <input type="password" name="lozinka" id="lozinka">
                    </p>
                    
                    <p>
                        <label for="ponovo_lozinka">Ponovo lozinka *</label>
                        <input type="password" name="ponovo_lozinka" id="ponovo_lozinka">
                    </p>
                    
                    <p>
                        <label for="ime_prezime">Ime i prezime</label>
                        <input type="text" name="ime_prezime" id="ime_prezime">
                    </p>
                    
                    <p>
                        <label for="email">Email *</label>
                        <input type="text" name="email" id="email">
                    </p>
                    
                    <button type="submit" id="submit"> Registracija! </button>
                    
                </form>
                
                <div id="required">
                    <p>
                        " Polja označena sa * su obavezna!!! "
                    </p>
                </div>
                
            </div>
        </div>
        
    </body>
</html>

<?php
      }

 else {
     
     ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Registracija korisnika</title>
        <link rel="stylesheet" type="text/css" href="xHTML/css/style.css">
    </head>
    <body>
        
        <div id="signup-form">
            <div id="signup-inner">
                <div class="clearfix" id="header">
                    <img id="signup-inner" src="xHTML/images/signup.png" alt>
                    <h1>
                        Isprobaj validation helper <br/>
                        Registruj se!
                    </h1>   
                   <br />
                    
                </div>
                
                 <?php
                    
                         foreach ($validate->error() as $error)
                                {
                                    echo $error, '<br />';
                                }
                    
                    ?>
                
                
                <form method="post" action="" id="send">
                    
                    <p>
                        <label for="korisnicko_ime">Korisničko ime *</label>
                        <input type="text" name="korisnicko_ime" id="korisnicko_ime">
                    </p>
                    
                    <p>
                        <label for="lozinka">Lozinka *</label>
                        <input type="password" name="lozinka" id="lozinka">
                    </p>
                    
                    <p>
                        <label for="ponovo_lozinka">Ponovo lozinka *</label>
                        <input type="password" name="ponovo_lozinka" id="ponovo_lozinka">
                    </p>
                    
                    <p>
                        <label for="ime_prezime">Ime i prezime</label>
                        <input type="text" name="ime_prezime" id="ime_prezime">
                    </p>
                    
                    <p>
                        <label for="email">Email *</label>
                        <input type="text" name="email" id="email">
                    </p>
                    
                    <button type="submit" id="submit"> Registracija! </button>
                    
                </form>
                
                <div id="required">
                    <p>
                        " Polja označena sa * su obavezna!!! "
                    </p>
                </div>
                
            </div>
        </div>
        
    </body>
</html>
     
     <?php
         
     
      }
      
  } else {
    ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Registracija korisnika</title>
        <link rel="stylesheet" type="text/css" href="xHTML/css/style.css">
    </head>
    <body>
        
        <div id="signup-form">
            <div id="signup-inner">
                <div class="clearfix" id="header">
                    <img id="signup-inner" src="xHTML/images/signup.png" alt>
                    <h1>
                        Isprobaj validation helper <br />
                        Registruj se!
                    </h1>
                    
                </div>
                
                
                <form method="post" action="" id="send">
                    
                    <p>
                        <label for="korisnicko_ime">Korisničko ime *</label>
                        <input type="text" name="korisnicko_ime" id="korisnicko_ime">
                    </p>
                    
                    <p>
                        <label for="lozinka">Lozinka *</label>
                        <input type="password" name="lozinka" id="lozinka">
                    </p>
                    
                    <p>
                        <label for="ponovo_lozinka">Ponovo lozinka *</label>
                        <input type="password" name="ponovo_lozinka" id="ponovo_lozinka">
                    </p>
                    
                    <p>
                        <label for="ime_prezime">Ime i prezime</label>
                        <input type="text" name="ime_prezime" id="ime_prezime">
                    </p>
                    
                    <p>
                        <label for="email">Email *</label>
                        <input type="text" name="email" id="email">
                    </p>
                    
                    <button type="submit" id="submit"> Registracija! </button>
                    
                </form>
                
                <div id="required">
                    <p>
                        " Polja označena sa * su obavezna!!! "
                    </p>
                </div>
                
            </div>
        </div>
        
    </body>
</html>

<?php
}

?>