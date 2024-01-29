
<?php
  include('../include/Navbar.php');

  if($_SERVER["REQUEST_METHOD"] == "POST"){
                
    $email1 = trim(mysqli_real_escape_string($con, $_POST["email"]));
    $email = filter_var($email1, FILTER_SANITIZE_EMAIL);
    $password1 = trim(mysqli_real_escape_string($con, $_POST["pass"]));
    $password = crypt((filter_var($password1, FILTER_SANITIZE_STRING)), 'rl');

    function login($email, $password, $con) {
      $searchUser = "SELECT * FROM utenti WHERE email='$email' and password = '$password' ";
      $result = mysqli_query($con, $searchUser);
      mysqli_close($con);
      $data = mysqli_fetch_assoc($result);
      $count = $result->num_rows;

      if ($count == 1){
        $_SESSION['id'] = $data['id'];
        $_SESSION['name'] = $data['nome'];
        $_SESSION['surname'] = $data['cognome'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['status'] = $data['status'];
       return true;}

    return false;}

    $successfull= login($email, $password, $con);

    if ($successfull){
      $nome = $_SESSION['name'];
      header("Location: index.php");}
    else {
      $_SESSION['error']=true;
      header("Location: index.php");}  
  }

?>
