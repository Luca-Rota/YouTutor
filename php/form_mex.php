
<?php ob_start(); 
  include('../include/Navbar.php');
?>

<div class="myEmTut2 myMiddle">
  <div class="container">
    
    <?php   
      $email = $_GET['email'];
      $type = $_GET['type'];

      if(isset($_GET['typeMex']))
        $typeMex = $_GET['typeMex'];
       
      echo 
        "<div class=\"row\">
          <div class=\"modal-dialog myEmTut\" role=\"document\">
            <div class=\"modal-content\">
              <div class=\"modal-header\">
                <h5 class=\"modal-title\">Nuovo messaggio</h5>
              </div>
              <form action=\"#\" method=\"POST\">
                <div class=\"modal-body\">
                  <div class=\"form-group\">
                    <label class=\"col-form-label\">Email Tutor:</label>
                    <p class=\"form-control\">" .$email. "</p>
                  </div>
                  <div class=\"form-group\">
                    <label class=\"col-form-label\">Oggetto:</label>
                    <input type=\"text\" class=\"form-control\" name=\"ogg\" placeholder=\"Inserisci qui il corso e la materia\" required>
                  </div>
                  <div class=\"form-group\">
                    <label class=\"col-form-label\">Messaggio:</label>
                    <textarea class=\"form-control\" placeholder=\"Concordati con il Tutor per scegliere luogo ed ora dell'incontro\" name=\"mex\" required></textarea>
                  </div>
                </div>
                <div class=\"modal-footer\">";
                  if ($type == "tut")  
                    echo"<a type=\"button\" class=\"btn btn-danger\" href=\"tutor.php\"> Chiudi </a>";
                  if ($type == "mex")
                    echo"<a type=\"button\" class=\"btn btn-danger\" href='Messaggi.php?typeMex=".$typeMex."'> Chiudi </a>";
                  echo
                    "<button type=\"submit\" class=\"btn btn-primary active\" name=\"suby\"> Invia Messaggio </button>
                </div>
              </form>
            </div>
          </div>
        </div>";
      
      if(isset ($_POST["suby"])){
        
        $ogg1 = trim(mysqli_real_escape_string($con, $_POST["ogg"]));
        $ogg = filter_var($ogg1, FILTER_SANITIZE_STRING);
        $mex1 = trim(mysqli_real_escape_string($con, $_POST["mex"]));
        $mex = filter_var($mex1, FILTER_SANITIZE_STRING);
        $idMit = $_SESSION['id'];

        function send_mex($email, $ogg, $mex, $idMit, $db_connection){
          $orario = date("d/n/Y H:i:s");
          $sqlDest = "SELECT id FROM utenti WHERE email='$email'";
          $res1 = mysqli_query($db_connection, $sqlDest); 
          $idDest = mysqli_fetch_assoc($res1);
          $idDest1 =  $idDest['id'];      
          $sqlMex = "INSERT INTO messaggi(id_mittente, id_destinatario, oggetto, messaggio, data_invio, flag, eliminata) 
                      VALUES ('$idMit', '$idDest1', '$ogg', '$mex', '$orario', 0, 0)";
          $res2 = mysqli_query($db_connection, $sqlMex); 
          if (mysqli_affected_rows($db_connection))
            return true;
          else 
            return false;      
        }

        $success = send_mex($email, $ogg, $mex, $idMit, $con);
        
        if($success)
          $_SESSION['send'] = true;
        else
          $_SESSION['send'] = false;

        if ($type == "tut"){    
          header("Location: tutor.php"); 
          exit;
        }

        if ($type == "mex"){
          header("Location: Messaggi.php?typeMex=$typeMex");
          exit;
        }
        
      }

    ?>

  </div>
</div>

<?php  include('../include/Footer.php'); ?>