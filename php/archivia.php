
<?php include('../include/Navbar.php'); 

  $id = $_GET['id'];
  $typeMex = $_GET['typeMex'];

  $sql = "UPDATE messaggi SET flag = '1' WHERE id_messaggio = '$id'";
  $result = mysqli_query($con, $sql);
  mysqli_close($con);

  if ($result) {
    header("Location: Messaggi.php?typeMex=$typeMex"); 
    exit;} 
?>