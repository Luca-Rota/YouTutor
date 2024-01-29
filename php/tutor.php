
<?php include('../include/Navbar.php'); ?>
  
<div class="myProf">
  <div class="container myProf1"> 

    <?php 
      
      echo
        "<div class=\"row\">
          <div class=\"col-md-12 myTutorTitle\">
            <h1 class=\"myTutorTitle1\"> Scegli il Tutor più adatto a te! </h1>
          </div>
        </div>

        <div class=\"row\">
          <div class=\"col-md-12 myTutorTitle\">
            <div class=\"container h-100\">
              <form id=\"searchbar\" action=\"tutor.php\" method=\"GET\"> 
                <div class=\"d-flex justify-content-center h-100\">
                  <div class=\"searchbar\">
                    <input class=\"search_input\" type=\"text\" name=\"search\" placeholder=\"Es. sviluppo applicazioni web\">
                    <a href=\"#\" class=\"search_icon\" onclick=\"document.getElementById('searchbar').submit()\"><i class=\"fas fa-search\" ></i></a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>";

      $search = false;

      echo
        "<div class=\"row \">";

      if(isset ($_GET["search"])){

        $search1 = trim(mysqli_real_escape_string($con, $_GET["search"]));
        $search = filter_var($search1, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

        echo
          "<div class=\"col-md-5 offset-md-1\">
            <h5> Risultati per:  \"" .$search. "\". </h5>
          </div>";}
      else 
        echo
          "<div class=\"col-md-5 offset-md-1\">
            <h5> Lista completa dei Tutoraggi. </h5>
          </div>";
      
      if (isset($_SESSION['send'])){
        
        if ($_SESSION['send']){
          echo
            "<div class=\"col-md-4 myMexEmTut\">
              <p class=\"myYesMex\"> MESSAGGIO INVIATO CON SUCCESSO! </p>
            </div>";
          unset($_SESSION['send']);}
        else{
          echo
            "<div class=\"col-md-4 myMexEmTut\">
              <p class=\"myNoMex\"> MESSAGGIO NON INVIATO CON SUCCESSO! </p>
            </div>";
          unset($_SESSION['send']);}
      }

      if (!isset($_SESSION['id']))
        echo
            "<div class=\"col-md-5 myMexEmTut\">
              <p class=\"myNoMex\"> <b>PER POTER SCRIVERE AI TUTOR ACCEDI O REGISTRATI!</b> </p>
            </div>";

      echo 
        "</div>";
      
      function tutor_list($search, $db_connection){
        if(!isset($_SESSION['id'])){
          if (!$search)
            $sqlSearch = "SELECT * FROM utenti, tutor WHERE id = id_tutor"; 
          else
            $sqlSearch = "SELECT * FROM utenti, tutor 
                          WHERE (nome LIKE'%$search%' OR cognome LIKE '%$search%' OR materia LIKE '%$search%' OR corsodistudi LIKE '%$search%')
                          AND id = id_tutor";}
        else{
          $myId = $_SESSION['id'];
          if (!$search)
            $sqlSearch = "SELECT * FROM utenti, tutor WHERE id != $myId AND id = id_tutor"; 
          else
            $sqlSearch = "SELECT * FROM utenti, tutor 
                          WHERE (nome LIKE '%$search%' OR cognome LIKE '%$search%' OR materia LIKE '%$search%' OR corsodistudi LIKE'%$search%')
                          AND id != $myId AND id = id_tutor";}
        $result = mysqli_query($db_connection, $sqlSearch);
        if ($result-> num_rows > 0){
          while($row = mysqli_fetch_assoc($result)){
            echo
              "<div class=\"row \">
                <div class=\"col-md-9 offset-md-1 myBoxTut\">
                  <div class=\"row\">
                    <div class=\"col-md-2 myLastCol\">";
                      $idProfile = $row["id"];
                      $imgProfile = "SELECT status FROM utenti WHERE id = '$idProfile' ";
                      $result2 = mysqli_query($db_connection, $imgProfile);
                      $data = mysqli_fetch_assoc($result2);
                      $status = $data['status'];
                      if($status == '1')
                        echo"<img src=\"../imgs_users/$idProfile.jpg\" alt=\"Immagine Profilo\" class=\"MyImgFluid\">";
                      else
                        echo"<img src=\"../img/blank.jpg\" alt=\"Immagine Profilo\" class=\"MyImgFluid\">";
                      echo"
                    </div>

                    <div class=\"col-md-5 myLastCol\">
                      <p class=\"myBoxText\">Materia: <b>".$row["materia"]."</b></p>
                      <p class=\"myBoxText\"><b>".$row["nome"]. " " .$row["cognome"]."</b></p>
                    </div>
                    <div class=\"col-md-4 myLastCol\">
					  <p class=\"myBoxText \">Corso: <b>".$row["corsodistudi"]."</b></p>
                      <p class=\"myBoxText\">Voto: <b>".$row["votoConseguito"]."</b></p>
                    </div>
                  </div>
                </div>";

            if(isset($_SESSION['id'])) 
              echo
                "<div class=\"col-md-1\">
                  <a class=\"btn btn-success myBtnBox\" href='form_mex.php?email=".$row['email']."&type=tut'> Scrivi al Tutor </a>
                </div>";
            else
              echo
                "<div class=\"col-md-1\">
                  <a class=\"btn btn-success myBtnBox\" href='tutor.php'> Scrivi al Tutor </a>
                </div>";   

            echo
              "</div>";}
          return true;
        }
        else 
          return false;
      }
      
      $successfull = tutor_list($search, $con);
      
      if($successfull) 
        echo
          "<div class=\"row\">
            <div class=\"col-md-12 myFinTut\">
              <a href=\"Home.php\" class=\"btn btn-primary active\" role=\"button\" >Home</a>
            </div>
          </div>";
      else
          echo
            "<div class=\"row\">
              <div class=\"col-md-12 myTutorTitle\">
                <h2> Spiacenti, nessun risultato trovato. </h2>
              </div>
            </div>";

    ?>

  </div>
</div>

<?php include('../include/Footer.php'); ?>