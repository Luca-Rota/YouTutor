
<?php include('../include/Navbar.php');   
  $id = $_SESSION['id'];?>

<div class="myMenu2">
  <div class="nav flex-column nav-pills font-weight-bold" id="v-pills-tab" role="tablist" aria-orientation="vertical">
  
    <a class="nav-link <?php if($_GET['typeMex']==='new') echo 'active';?>" 
    id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" 
    aria-selected="<?php if(isset($_GET['typeMex'])){if($_GET['typeMex']==='new') echo 'true';}  else echo 'false';?>"> Nuovi messaggi </a>

    <a class="nav-link <?php if($_GET['typeMex']==='send') echo 'active';?>" 
    id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" 
    aria-selected="<?php if(isset($_GET['typeMex'])){if($_GET['typeMex']==='send') echo 'true';}  else echo 'false';?>"> Messaggi inviati </a>
      
    <a class="nav-link <?php if($_GET['typeMex']==='rec') echo 'active';?>" 
    id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" 
    aria-selected="<?php if(isset($_GET['typeMex'])){if($_GET['typeMex']==='rec') echo 'true';}  else echo 'false';?>"> Messaggi ricevuti </a>
    
  </div>
</div>

<?php
  function mex_list($id, $con, $type){
    if ($type == "send")
      $sqlMex = "SELECT * FROM messaggi WHERE id_mittente = '$id' AND eliminata != '1' ORDER BY id_messaggio DESC";
    if ($type == "rec")
      $sqlMex = "SELECT * FROM messaggi WHERE flag = '1' and id_destinatario = '$id' AND eliminata != '2' ORDER BY id_messaggio DESC";
    $res1 = mysqli_query($con, $sqlMex);
    if ($res1-> num_rows > 0)
      while($row = mysqli_fetch_assoc($res1)){
        if ($type == "rec")
          $sqlName = "SELECT * FROM utenti WHERE id= ".$row['id_mittente']."";
        if ($type == "send")
          $sqlName = "SELECT * FROM utenti WHERE id= ".$row['id_destinatario']."";  
        $res2 =  mysqli_query($con,$sqlName);
        $date = mysqli_fetch_assoc($res2);
        echo
        "<div class=\"row\">
          <div class=\"col-md-9 offset-md-1 myBoxMex\">
            <div class=\"row\">
              <div class=\"col-md-3\">";
                if ($type == "rec")
                  echo "<p class=\"myHeadMex1\"> Da: ".$date['nome']." ".$date['cognome']." </p>";
                if ($type == "send")
                  echo "<p class=\"myHeadMex1\"> A: ".$date['nome']." ".$date['cognome']." </p>";
              echo "</div>
              <div class=\"col-md-6\">
                <p class=\"myHeadMex1\"> Ogg: ".$row['oggetto']." </p>
              </div>
              <div class=\"col-md-3\">
                <p class=\"myHeadMex1\"> ".$row['data_invio']." </p>
              </div>
            </div>
              <hr>
            <div class=\"row\">
              <div class=\"col-md-10 offset-md-1\">
                <p> ".$row['messaggio']." </p>
              </div>
            </div>
          </div>

          <div class=\"col-md-1\">";
            if ($type == "send")
              echo "<a class=\"btn btn-danger myBtnBoxMex\" href='delete.php?id=".$row['id_messaggio']."&type=mex&typeMex=send'> Elimina </a>";
            if ($type == "rec")
              echo "<a class=\"btn btn-success myBtnBoxMex\" href='form_mex.php?email=".$date['email']."&type=mex&typeMex=rec'> Rispondi </a>
              <a class=\"btn btn-danger myBtnBoxMex3\" href='delete.php?id=".$row['id_messaggio']."&type=mex&typeMex=rec'> Elimina </a>";
          echo "</div>
        </div>";
      }
    else{
      if ($type == "send")
        echo "<div class=\"row\">
                <p class=\"nexMex\"> Nessun messaggio inviato. </p>
              </div>";
      if ($type == "rec")
        echo "<div class=\"row\">
                <p class=\"nexMex\"> Nessun messaggio ricevuto. </p>
              </div>";
    }
  }
?>

<div class="mainMex">
  <div class="tab-content" id="v-pills-tabContent">
    
    <div class="tab-pane fade <?php if($_GET['typeMex'] === 'new')  echo'show active'; ?>" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
      <div class="container myBoxTextMex"> 
        <?php 

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
		  
		    ?>
        <div id="NewMsg">
          <?php include("NuoviMsg.php");?>
          <script>
            setInterval(refreshMessages, 1000);
            function refreshMessages() {
              $.ajax({
                url: 'NuoviMsg.php',
                type: 'GET',
                dataType: 'html',
                success: function(data) {
                  $('#NewMsg').html(data);
                },
                error: function() {
                  $('#NewMsg').prepend('Errore');
                }
              });
            }
          </script> 
        </div>
      </div>
    </div>
      
    <div class="tab-pane fade <?php if($_GET['typeMex'] === 'send')  echo'show active'; ?>" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
      <div class="container myBoxTextMex">
        <?php

          $type = "send";
          mex_list($id, $con, $type);
        ?>
      </div>
    </div>

    <div class="tab-pane fade <?php if($_GET['typeMex'] === 'rec')  echo'show active'; ?>" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
      <div class="container myBoxTextMex"> 
        <?php

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

          $type = "rec";
          mex_list($id, $con, $type);
        ?>
      </div>
    </div>

  </div>
</div>
    
<?php include('../include/Footer.php'); ?>
