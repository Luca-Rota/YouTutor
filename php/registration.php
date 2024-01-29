
<?php include('../include/Navbar.php'); ?>

<div class="myReg myMiddle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content myReg2">
            <div class="modal-header myHeader">
              <h5 class="modal-title font-weight-bold" id="exampleModalCenterTitle">Registrazione</h5>
            </div>
            <div class="modal-body myRegMex">
              <?php
                if(isset($_POST["firstname"])){

                  $nome = trim(mysqli_real_escape_string($con, $_POST["firstname"]));
                  $first_name = filter_var($nome, FILTER_SANITIZE_STRING);
                  $cognome = trim(mysqli_real_escape_string($con, $_POST["lastname"]));
                  $last_name = filter_var($cognome, FILTER_SANITIZE_STRING);
                  $email1 = trim(mysqli_real_escape_string($con, $_POST["email"]));
                  $email = filter_var($email1, FILTER_SANITIZE_EMAIL);
                  $password1 = trim(mysqli_real_escape_string($con, $_POST["pass"]));
                  $password = crypt((filter_var($password1, FILTER_SANITIZE_STRING)), 'rl');
                  $password2 = trim(mysqli_real_escape_string($con, $_POST["confirm"]));
                  $password_confirm = crypt((filter_var($password2, FILTER_SANITIZE_STRING)), 'rl');
                  
                  function insert_user($email, $first_name, $last_name, $password, $password_confirm, $db_connection) {
                      if($password == $password_confirm){
                          $searchEmail = "SELECT email FROM utenti WHERE email='$email'";
                          $result = mysqli_query($db_connection, $searchEmail);
                          if ($result-> num_rows > 0){
                              echo "$email è gia stata utilizzata: ";
                              return false;}
                          else{
                              $registrazione = "INSERT INTO utenti(nome, cognome, email, password, status) VALUES ('$first_name', '$last_name', '$email', '$password', 0)";
                              $reg1 = mysqli_query($db_connection, $registrazione);
                              if($reg1){
                              return true;}
                              else{
                                  echo "Mancata connessione con il database: ";
                                  return false;}}} 
                      else {
                          echo "Le password non coincidono: "; 
                          return false;}}

                  $successfull= insert_user($email, $first_name, $last_name, $password, $password_confirm, $con);
                
                  if ($successfull){
                      echo "$email è stata registrata con successo. </div>";
                      echo "<div class=\"modal-footer\">
                            <a href=\"index.php\" class=\"btn btn-primary active\" role=\"button\" aria-pressed=\"true\">Home</a>
                            </div>";}
                  else {
                      echo "Errore di registrazione.  </div>";
                      echo "<div class=\"modal-footer\">
                            <a href=\"registration.php\" class=\"btn btn-secondary active\" role=\"button\" aria-pressed=\"true\">
                            Ripeti Registrazione </a>       
                            <a href=\"index.php\" class=\"btn btn-primary active\" role=\"button\" aria-pressed=\"true\">Home</a> 
                            </div>";}
                                    
                }
              ?>
            </div>  
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
 
<?php  include('../include/Footer.php'); ?>