
<?php
  if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
  }

  require_once('db/mysql_credentials.php');
  $id=$_SESSION['id'];

  $sqlMex = "SELECT * FROM messaggi WHERE flag = '0' and id_destinatario = '$id' AND eliminata != '2' ORDER BY id_messaggio DESC";
  $res1 = mysqli_query($con, $sqlMex);
  if ($res1-> num_rows > 0)
    while($row = mysqli_fetch_assoc($res1)){
      $sqlName = "SELECT * FROM utenti WHERE id= ".$row['id_mittente']."";
      $res2 =  mysqli_query($con,$sqlName);
      $date = mysqli_fetch_assoc($res2);
      echo
      "<div class=\"row\">
        <div class=\"col-md-9 offset-md-1 myBoxMex\">
          <div class=\"row\">
            <div class=\"col-md-3\">
                <p class=\"myHeadMex1\"> Da: ".$date['nome']." ".$date['cognome']." </p>
            </div>
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

        <div class=\"col-md-1\">
          <a class=\"btn btn-success myBtnBoxMex\" href='form_mex.php?email=".$date['email']."&type=mex&typeMex=new'> Rispondi </a>
          <a class=\"btn btn-primary active myBtnBoxMex2\" href='archivia.php?id=".$row['id_messaggio']."&typeMex=new' > Archivia </a>
        </div>
      </div>";
    }
  else{
      echo "<div class=\"row\">
              <p class=\"nexMex\"> Nessun nuovo messaggio da leggere. </p>
            </div>";
  }
?>