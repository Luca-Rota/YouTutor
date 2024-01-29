<?php include('../include/Navbar.php');?> 

<div class="myProf">
  <div class="container myProf1">
    
    <?php 
      $id = $_SESSION['id'];

      if(isset($_POST['firstname'])){

        $nome = trim(mysqli_real_escape_string($con, $_POST["firstname"]));
        $first_name = filter_var($nome, FILTER_SANITIZE_STRING);
        $cognome = trim(mysqli_real_escape_string($con, $_POST["lastname"]));
        $last_name = filter_var($cognome, FILTER_SANITIZE_STRING);

        if(isset($_POST['email'])){   
          $email1 = trim(mysqli_real_escape_string($con, $_POST["email"]));
          $email = filter_var($email1, FILTER_SANITIZE_EMAIL, FILTER_FLAG_STRIP_HIGH);}
        else
          $email = $_SESSION['email'];

        function ModifyUser($last_name, $first_name, $email, $con, $id){
          $ModifyUser = "UPDATE utenti SET nome = '$first_name', cognome = '$last_name', email = '$email' WHERE  id = '$id'";
          $result = mysqli_query($con, $ModifyUser);
          if ($result){
            if (mysqli_affected_rows($con)){
              $_SESSION['mod'] = "Dati modificati correttamente.";
              $_SESSION['email'] = $email;
              $_SESSION['name'] = $first_name;
              $_SESSION['surname'] = $last_name;}
            else 
              $_SESSION['mod'] = "Non sono state apportate modifiche ai dati.";
            return true;}
          else {
            $_SESSION['mod'] = "Errore - Mancata connessione con il database, riprovare.";
            return false;}
        }

        $successfull = ModifyUser($last_name, $first_name, $email, $con, $id);

        if ($successfull)
          header('Location: show_profile.php');  
        else
          header('Location: form_update_profile.php');
      }
      else 
        echo "<h1 class=\"myNo\"> NON SEI AUTORIZZATO AD ACCEDERE A QUESTA PAGINA!! </h1>";
      
      if(isset($_POST['oldpass'])){

        $oldpassword1 = trim(mysqli_real_escape_string($con, $_POST["oldpass"]));
        $oldpassword = crypt((filter_var($oldpassword1, FILTER_SANITIZE_STRING)), 'rl');
        $newpassword1 = trim(mysqli_real_escape_string($con, $_POST["newpass"]));
        $newpassword = crypt((filter_var($newpassword1, FILTER_SANITIZE_STRING)), 'rl');
        $newpassword2 = trim(mysqli_real_escape_string($con, $_POST["newconfirm"]));
        $newpassword_confirm = crypt((filter_var($newpassword2, FILTER_SANITIZE_STRING)), 'rl');

        function ModifyPass($oldpassword, $newpassword, $newpassword_confirm, $con, $id){
          if ($newpassword != $newpassword_confirm) {
            $_SESSION['mod2'] = "Errore - Le password inserite non coincidono.";
            return false;}
          $confoldpass= "SELECT password FROM utenti WHERE id = $id";
          $res1 = mysqli_query($con, $confoldpass);
          $pass = mysqli_fetch_assoc($res1);
          if (!$res1) {
            $_SESSION['mod2'] = "Errore - Mancata connessione con il database, riprovare.";
            return false;}
          if ($oldpassword != $pass['password']) {
              $_SESSION['mod2'] = "Errore - La vecchia password inserita è errata.";
              return false;}
          if ($newpassword == $oldpassword) {
              $_SESSION['mod2'] = "Errore - La nuova nuova password è uguale alla precedente.";
              return false;}
          $ModifyUser = "UPDATE utenti SET password = '$newpassword' WHERE  id = '$id' ";
          $res2 = mysqli_query($con, $ModifyUser);
          if ($res2) {
            $_SESSION['mod'] = "Password modificata correttamente.";
            return true;}  
          else {
            $_SESSION['mod2'] = "Errore - Mancata connessione con il database, riprovare.";
            return false;}
        }

        $successfull = ModifyPass($oldpassword, $newpassword, $newpassword_confirm, $con, $id);

        if ($successfull) 
          header('Location: show_profile.php');
        else 
          header('Location: form_update_profile.php');

      }
      else 
        echo "<h1 class=\"myNo\">NON SEI AUTORIZZATO AD ACCEDERE A QUESTA PAGINA!!</h1>";

    ?>
    
  </div>
</div>

<?php include('../include/Footer.php');?>