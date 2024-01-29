
<?php include('../include/Navbar.php');?>

<div class="myProf">
  <div class="container myProf1">
    
    <?php 
    
      if(isset($_SESSION['id'])){
			  $nome = $_SESSION['name'];
        echo
          "<div class=\"row\">
            <div class=\"col-md-12 myTutorTitle\">
              <h2 class=\"\"> Siamo felici di rivederti, $nome</h2>
            </div>
          </div>";}
      
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
        </div>
		
		    <div class=\"row\">
          <div class=\"col-md-12\">
		        <h2 class=\"mySecondTitle\"> Alcuni dei nostri Tutor:</h2>
          </div>
        </div>

        <div class=\"row\">
          <div class=\"col-md-11 myDeck\">
            <div class=\"card-deck\">";
			        $sqlCard = "SELECT * FROM tutor, utenti WHERE id=id_tutor ORDER BY RAND() limit 3";
              $result = mysqli_query($con, $sqlCard);
              while($row = mysqli_fetch_assoc($result)){ 
                echo "<div class=\"card\">";
                $id = $row['id_tutor'];
				        $cognome = $row["cognome"];
				
                if($row['status'] == '1')
                  echo 
                  "<div class=\"myMiddle\">
                    <a href='tutor.php?search=$cognome'>
                      <img class=\"MyImgFluid2\" src=\"../imgs_users/$id.jpg\" alt=\"foto_profilo\" >
                    </a>
						      </div>";
                else{
                  echo 
                  "<div class=\"myMiddle\">
							      <a href='tutor.php?search=$cognome'>
							        <img class=\"MyImgFluid2\" src=\"../img/blank.jpg\" alt=\"foto_profilo\" >
							      </a>
						      </div>";}
                echo
                    "<div class=\"card-body\">
                      <h4 class=\"card-title\"><b>" .$row["nome"]. " " .$row["cognome"]. "</b></h4>
                      <p class=\"card-text myCardText\"> Corso di studi: <b>".$row["corsodistudi"]."</b></p> 
                      <p class=\"card-text myCardText\"> Materia: <b>".$row["materia"]."</b></p>
                      <p class=\"card-text myCardText\"> Voto: <b>".$row["votoConseguito"]."</b></p>
                    </div>
				   
                  </div>";}
                
              echo 
            "</div>
          </div>
        </div>";
  
      ?>

    </div>
  </div>

<?php include('../include/Footer.php'); ?>      




