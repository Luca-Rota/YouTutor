
<?php 
  include('../include/Navbar.php'); ?>

<div class="myProf">
  <div class="container myProf1">
      
    <?php 
      
      if(isset($_SESSION['id'])){
        
        $idProfile = $_SESSION['id'];  
        $first_name = $_SESSION['name'];
        $last_name = $_SESSION['surname'];
        $email = $_SESSION['email'];
        $status = $_SESSION['status'];

        echo
          "<div class=\"row\">
            <div class=\"col-md-3 myColProfIm\">";
              if($status == '1')
                echo"<img src=\"../imgs_users/$idProfile.jpg\" alt=\"Immagine Profilo\" class=\"myImg\">";
              else
                echo"<img src=\"../img/blank.jpg\" alt=\"Immagine Profilo\" class=\"myImg\">";

              if(isset($_SESSION['error'])){
                $errore = $_SESSION['error'];
                echo"<p class=\"errorLogin\">$errore</p>";
                unset($_SESSION['error']);
              }

        echo
            "</div>
              <div class=\"col-md-7\"> 
                <h2 class=\"myDati\"> Dati Personali: </h2>";
                  
                if (isset($_SESSION['mod'])){
                  echo 
                    "<div class=\"row\">
                      <div class=\"col-md-12\">
                        <p class=\"myYesMex\"> ".$_SESSION['mod']." </p>
                      </div>
                    </div>";
                  unset($_SESSION['mod']);}

                echo
                "<div class=\"row\">
                  <div class=\"col-md-2\">
                    <p><b> Nome: </b></p>
                  </div>
                  <div class=\"col-md-8\">
                    <p class=\"form-control\"><b> $first_name </b></p>
                  </div>
                </div>
                <div class=\"row\">
                  <div class=\"col-md-2\">
                    <p><b> Cognome: </b></p>
                  </div>
                  <div class=\"col-md-8\">
                    <p class=\"form-control\"><b> $last_name </b></p>
                  </div>
                </div>
                <div class=\"row\">
                  <div class=\"col-md-2\">
                    <p><b> Email: </b></p>
                  </div>
                  <div class=\"col-md-8\">
                    <p class=\"form-control\"><b> $email </b></p>
                  </div>
                </div>
              </div>

              <div class=\"col-md-1 myColBtn\">
                <div class=\"row\">
                  <div class=\"col-md-12 myMiddle myBtn1\"> 
                    <form action=\"form_update_profile.php\">
                      <button class=\"btn btn-primary active \"> Modifica </button>
                    </form>
                  </div>
                </div>
         
                <div class=\"row\"> 
                  <div class=\"col-md-12 myMiddle myBtn1\"> 
                      <button class=\"btn btn-danger myBtn\" onclick=\"logout()\"> Esci </button>
                  </div>
                </div>
              </div> 
            </div>";
    ?>

    <script>
      function logout(){
          var result = confirm("Sei sicuro di voler uscire?"); 
        if (result === true) { 
            window.location.href = 'logout.php';
            exit;
        }
      }
    </script>

    <?php
      function IsTutor($id, $db_connection){
        $searchUser = "SELECT * FROM tutor WHERE id_tutor = '$id' ";
        $result = mysqli_query($db_connection, $searchUser);
        if ($result-> num_rows > 0) {
          return true;}
        else 
          return false;} 

      $successfull=IsTutor($idProfile,$con);
        
      if(!$successfull){
        echo      
        "<div class=\"row \"> 
          <div class=\"col-md-8 offset-md-2 myTut2\">
            <h2 class=\"myDati2\">  Unisciti alla community, diventa Tutor anche tu! </h2>
          </div>
        </div>

        <form method=\"POST\" action=\"show_profile2.php\">
            <div class=\"row\">
              <div class=\"col-md-8 offset-md-2 myTut1\">
                <div class=\"row myTut3\">
                  <div class=\"col-md-3\">
                    <p class=\"font-weight-bold\"> Corso di Studi: </p>
                  </div>
                  <div class=\"col-md-9\">
                    <input type=\"text\" class=\"form-control\" placeholder=\"InserisciCorsoDiStudi\" required name=\"corso\">
                  </div>
                </div>

                <div class=\"row myTut3\">
                  <div class=\"col-md-3\">
                    <p class=\"font-weight-bold\"> Materia: </p>
                  </div>
                  <div class=\"col-md-9\">
                    <input type=\"text\" class=\"form-control\" placeholder=\"InserisciMateria\" required name=\"materia\">
                  </div>
                </div>

                <div class=\"row myTut3\">
                  <div class=\"col-md-3\">
                    <p class=\"font-weight-bold\"> Voto Conseguito: </p>
                  </div>
                  <div class=\"col-md-9\">
                    <input type=\"text\" class=\"form-control\" placeholder=\"InserisciVotoConseguito\" required name=\"voto\">
                  </div>
                </div>
              
                <div class=\"row myTut3\">
                  <div class=\"col-md-12 myMiddle\">
                    <button type=\"submit\" class=\"btn btn-success\" name=\"sub\"> Conferma </button>
                  </div>
                </div>
              </div>
            </div> 
        </form>";}
      
      else{  
        echo 
        "<div class=\"row \"> 
          <div class=\"col-md-8 offset-md-2 myTut\">
            <h2 class=\"myDati2\"> Offri tutoraggi per: </h2>
          </div>
        </div>

        <div class=\"row \"> 
          <div class=\"col-md-8 offset-md-2 myTut5\">
            <div class=\"table-responsive\">
              <table class=\"table myTab\">
                <thead>
                  <tr>
                    <th scope=\"col\"> </th>
                    <th scope=\"col myTabCol\"><h3> Corso di Studi </h3></th>
                    <th scope=\"col\"><h3> Materia </h3></th>
                    <th scope=\"col\"><h3> Voto </h3></th>
                    <th scope=\"col\"> </th>
                  </tr>
                </thead>
                <tbody>";

                function add_tab($id, $db_connection){
                  $searchId = "SELECT * FROM tutor WHERE id_tutor = '$id' ";
                  $result = mysqli_query($db_connection, $searchId);
                  if ($result-> num_rows > 0){
                    $i = 1;
                    while($row = mysqli_fetch_assoc($result)){
                      echo
                        "<tr>
                          <th scope=\"row\" class=\"myNumb\"><h4>".$i."</h4></th>
                          <td><p class=\"form-control myFormCont\"><b>" .$row["corsodistudi"]. "</b></p></td>
                          <td><p class=\"form-control myFormCont\"><b>" .$row["materia"]. "</b></p></td>
                          <td><p class=\"form-control myFormCont\"><b>" .$row["votoConseguito"]. "</b></p></td>
                          <td><a class=\"btn btn-danger\" href='delete.php?id=".$row['id_tutoraggio']."&type=prof'> Elimina </a></td>
                        </tr>";
                      $i++;}
                    return true;}
                  else 
                    return false;} 
        
                $success=add_tab($idProfile,$con);
                
                if($success)
                  echo  
                  "<tr>
                    <form method=\"POST\" action=\"show_profile2.php\">
                    <th scope=\"row\" class=\"myNumb\"> </th>
                    <td><input type=\"text\" class=\"form-control\" placeholder=\"InserisciCorsoDiStudi\" required name=\"corso\"></td>
                    <td><input type=\"text\" class=\"form-control\" placeholder=\"InserisciMateria\" required name=\"materia\"></td>
                    <td><input type=\"text\" class=\"form-control\" placeholder=\"Voto\" required name=\"voto\"></td>
                    <td> </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class=\"row\">
          <div class=\"col-md-8 offset-md-2 myMiddle myTut4\">                
            <button type=\"submit\" class=\"btn btn-success\" name=\"sub\"> Aggiungi </button> </form>
          </div>
        </div>";
                else
                  echo "<p>Mancata connessione con il database</p>";}
    }
    else 
      echo "<h1 class=\"myNo\">NON SEI AUTORIZZATO AD ACCEDERE A QUESTA PAGINA!!</h1>";  
    ?>

  </div>
</div>

<?php include('../include/Footer.php'); ?>
