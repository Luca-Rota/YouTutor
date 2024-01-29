
<?php include('../include/Navbar.php'); 

  $id = $_GET['id'];
  $type = $_GET['type'];
  $typeMex = $_GET['typeMex'];

  if ($type == "prof"){

    $deleteTut = "DELETE FROM tutor WHERE id_tutoraggio = '$id'"; 
    $res1 = mysqli_query($con, $deleteTut);

    if ($res1) {
      header('Location: show_profile.php'); 
      exit;} 
    else 
      echo "Errore durante la cancellazione.";
  }

  if ($type == "mex"){

    $sqlMex = "SELECT * FROM messaggi WHERE id_messaggio = '$id'";
    $res1 = mysqli_query($con, $sqlMex);
    $row = mysqli_fetch_assoc($res1);
    if ($_SESSION['id'] === $row['id_mittente']){
      $sqlMex2 = "UPDATE messaggi SET eliminata = '1' WHERE id_messaggio = '$id'";}
    if ($_SESSION['id'] === $row['id_destinatario']){
      $sqlMex2 = "UPDATE messaggi SET eliminata = '2' WHERE id_messaggio = '$id'";}
      $res2 = mysqli_query($con, $sqlMex2);
    if ($row['eliminata'] == 1 || $row['eliminata'] == 2 ){
      $deleteMex = "DELETE FROM messaggi WHERE id_messaggio = '$id'"; 
      $result = mysqli_query($con, $deleteMex);}

    if ($result || $res2) {
      header("Location: Messaggi.php?typeMex=$typeMex"); 
      exit;} 
    else 
      echo "Errore durante la cancellazione.";
  }

?>

