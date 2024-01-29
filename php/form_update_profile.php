
<?php include('../include/Navbar.php');?>

<div class="myProf">
  <div class="container myProf2">

    <?php

      if (isset($_SESSION['id'])) {

        $id = $_SESSION['id'];
        $nameProfile = $_SESSION['name'];
        $surnameProfile = $_SESSION['surname'];
        $emailProfile = $_SESSION['email'];
        $status = $_SESSION['status'];

        echo
        "<div class=\"row\">
          <div class=\"col-md-3 myColImg\">
            <div class=\"myMiddle\">";

              if ($status == '1')
                  echo"<img src=\"../imgs_users/$id.jpg\" alt=\"Immagine Profilo\" class=\"myImg2\"> </div>";
              else
                  echo"<img src=\"../img/blank.jpg\" alt=\"Immagine Profilo\" class=\"myImg2\"> </div>";

            echo 
            "<p class=\"imgText\"> Selezionare un'immagine in formato .jpg  </p>
            <form enctype=\"multipart/form-data\" action=\"upload.php\" method=\"POST\">
            <input name=\"immagine\" type=\"file\">
              <div class=\"myMiddle\"> 
                <button type=\"submit\" name=\"upload\" class=\"btn btn-success myUpBtn\">Conferma</button>
              </div>
            </form>
          </div>

          <div class=\"col-md-8\"> 
            <div class=\"row\">
              <h2 class=\"myDati myColUp\"> Modifica i tuoi dati personali: </h2>
            </div>";

            if (isset($_SESSION['mod'])){
              echo 
                "<div class=\"row\">
                  <div class=\"col-md-12\">
                    <p class=\"myNoMex\"> ".$_SESSION['mod']." </p>
                  </div>
                </div>";
              unset($_SESSION['mod']);}

            echo
            "<form action=\"update_profile.php\" method=\"POST\">
              <div class=\"row\">
                <div class=\"col-md-2\">
                  <p class=\"myTextUp\"> <b>Nome: </b></p>
                </div>
                <div class=\"col-md-7\">
                  <input type=\"text\" class=\"form-control\" value=$nameProfile required name=\"firstname\">
                </div>
              </div>

              <div class=\"row\">
                <div class=\"col-md-2\">
                  <p class=\"myTextUp\"> <b>Cognome: </b></p>
                </div>
                <div class=\"col-md-7\">
                  <input type=\"text\" class=\"form-control \" value=$surnameProfile required name=\"lastname\">
                </div>
              </div>

              <div class=\"row\">
                <div class=\"col-md-2\">
                  <p class=\"myTextUp\"> <b>Email: </b></p>
                </div>
                <div class=\"col-md-7 myColUp3\">
                  <input type=\"email\" class=\"form-control\" value=$emailProfile required name=\"email\">
                </div>
                <div class=\"col-md-3\"> 
                  <button class=\"btn btn-primary active \" name = \"mod1\"> Modifica Dati </button>
                </div>
              </div>
            </form>

            <div class=\"row\">
              <h5 class=\"myColUp2\"> Compilare il form sottostante solo se si vuole modificare la password: </h5>
            </div>";

            if (isset($_SESSION['mod2'])){
              echo 
                "<div class=\"row\">
                  <div class=\"col-md-12\">
                    <p class=\"myNoMex\"> ".$_SESSION['mod2']." </p>
                  </div>
                </div>";
              unset($_SESSION['mod2']);}

            echo
            "<form action=\"update_profile.php\" method=\"POST\">  
              <div class=\"row\">
                <div class=\"col-md-3\">
                  <p class=\"myTextUp\"> <b>Vecchia Password: </b></p>
                </div>
                <div class=\"col-md-6\">
                  <input type=\"password\" class=\"form-control\" placeholder=\"InserisciVecchiaPassword\" required name=\"oldpass\">
                </div>
              </div>

              <div class=\"row\">
                <div class=\"col-md-3\">
                  <p class=\"myTextUp\"><b> Nuova Password:</b> </p>
                </div>
                <div class=\"col-md-6\">
                  <input type=\"password\" class=\"form-control\" placeholder=\"InserisciNuovaPassword\" required name=\"newpass\">
                </div>
              </div>

              <div class=\"row\">
                <div class=\"col-md-3\">
                  <p class=\"myTextUp\"> <b>Conferma Password: </b></p>
                </div>
                <div class=\"col-md-6 myColUp3\">
                  <input type=\"password\" class=\"form-control\" placeholder=\"RipetiNuovaPassword\" required name=\"newconfirm\">
                </div>
                <div class=\"col-md-3 myColUp3\"> 
                  <button class=\"btn btn-primary active \" name = \"mod2\"> Modifica Password </button>
                </div>
              </div>
            </form>
            
            <div class=\"row\">
              <div class=\"col-md-12 myMiddle\">
                <a class=\"btn btn-danger myLastBtn\" href=\"show_profile.php\"> Annulla </a>
              </div>
            </div>
            
          </div>
        </div>";

      }     
      else 
        echo "<h1 class=\"myNo\">NON SEI AUTORIZZATO AD ACCEDERE A QUESTA PAGINA!!</h1>";

    ?>

  </div>
</div>

<?php include('../include/Footer.php'); ?>