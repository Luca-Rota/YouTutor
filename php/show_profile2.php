<?php include('../include/Navbar.php'); ?>

<div class="myReg myMiddle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content myReg2">
            <div class="modal-header myHeader">
              <h5 class="modal-title font-weight-bold" id="exampleModalCenterTitle"> Tutor </h5>
            </div>
            <div class="modal-body myRegMex">
              <?php
                if(isset ($_POST["sub"])){
                  
                  $idProfile = $_SESSION['id'];

                  $corso_di_studi1 = trim(mysqli_real_escape_string($con, $_POST["corso"]));
                  $corso_di_studi = filter_var($corso_di_studi1, FILTER_SANITIZE_STRING);
                  $materia1 = trim(mysqli_real_escape_string($con, $_POST["materia"]));
                  $materia = filter_var($materia1, FILTER_SANITIZE_STRING);
                  $voto_conseguito1 = trim(mysqli_real_escape_string($con, $_POST["voto"]));
                  $voto_conseguito = filter_var($voto_conseguito1, FILTER_SANITIZE_STRING);
                  
                  function add_tutor($id, $corso_di_studi, $materia, $voto_conseguito, $db_connection) {
                    if ($voto_conseguito < 27){
                      echo "Spiacenti, devi aver ottenuto un voto maggiore o uguale a \"27\" per poter essere tutor di una determinata materia.";
                      return false;}
                    else{ 
                      $searchId = "SELECT * FROM tutor WHERE id_tutor='$id'";
                      $res1 = mysqli_query($db_connection, $searchId);
                      $searchMat = "SELECT * FROM tutor WHERE id_tutor='$id' AND corsodistudi='$corso_di_studi' AND materia='$materia'";
                      $res3 = mysqli_query($db_connection, $searchMat);
                      if ($res3-> num_rows > 0){
                        echo "Errore: materia già presente nel database.";
                        return false;}
                      else{
                        $addMat = "INSERT INTO tutor(id_tutor, corsodistudi, materia, votoConseguito) VALUES ('$id', '$corso_di_studi', '$materia', '$voto_conseguito')";
                        $res2 = mysqli_query($db_connection, $addMat);
                        if ($res1 && $res2) {
                          if ($res1-> num_rows > 0) {
                            header('Location: show_profile.php'); 
                            exit;}
                          else {
                            echo "Congratulazioni, ora sei anche te un tutor!";
                            return true;}
                        }  
                        else {
                          echo "Mancata connessione con il database.";
                          return false;}}}}
          
                  $successfull= add_tutor($idProfile, $corso_di_studi, $materia, $voto_conseguito, $con);
                
                  if ($successfull){
                      echo "<br> Potrai vedere le materie da te caricate ed aggiungerne di nuove direttamente dal tuo profilo.
                            <br> Visita anche la sezione messaggi ed organizzati con gli altri utenti per i tuoi tutoraggi. </div>";
                      echo "<div class=\"modal-footer\">
                            <a href=\"Messaggi.php?typeMex=new\" class=\"btn btn-success active\" role=\"button\" aria-pressed=\"true\">Messaggi</a>
                            <a href=\"show_profile.php\" class=\"btn btn-secondary active\" role=\"button\" aria-pressed=\"true\">Torna al profilo</a>
                            <a href=\"index.php\" class=\"btn btn-primary active\" role=\"button\" aria-pressed=\"true\">Home</a>
                            </div>";}
                  else {
                      echo "</div>";
                      echo "<div class=\"modal-footer\">
                            <a href=\"show_profile.php\" class=\"btn btn-secondary active\" role=\"button\" aria-pressed=\"true\">
                            Torna al Profilo </a>       
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