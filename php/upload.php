
<?php include('../include/Navbar.php');

  $id = $_SESSION['id'];
  $stato="SELECT status FROM utenti WHERE id = '$id'";
  $oldstato = mysqli_query($con, $stato);
  $dato=mysqli_fetch_assoc($oldstato);
  $status = $dato['status'];

  if(is_uploaded_file($_FILES['immagine']['tmp_name'])){
  
    $file=$_FILES['immagine'];
    $fileName=$file['name'];
    $fileTmpLocation=$file['tmp_name'];
    $fileError=$file['error'];
    
    $image_info = getimagesize($file["tmp_name"]);
    $image_width = $image_info[0];
    $image_height = $image_info[1];
    if($image_width > $image_height){
      $_SESSION['error']="La foto profilo deve essere verticale!";
      header("Location: show_profile.php");  
        exit;
	}

	if ($file['size'] > 7994304) {
	  $_SESSION['error']="File troppo grande";
	  header("Location: show_profile.php");  
      exit;
    }

    $fileExt=explode(".",$fileName);
    $fileActExt=strtolower(end($fileExt));
    $allowed=array("jpg");

    if(in_array($fileActExt,$allowed)){
      $fileNewName=$id.".".$fileActExt;
      $fileDestination="../imgs_users/".$fileNewName;
    }

    else{ 
      $_SESSION['error']="Estensione dell'immagine non supportata";
	  header("Location: show_profile.php");  
	  exit;
    }   
        
    if(move_uploaded_file($fileTmpLocation,$fileDestination)) {
      $query="UPDATE utenti SET status = 1 WHERE id = '$id'";

      if(mysqli_query($con,$query)){
        mysqli_close($con);
        header("Location: show_profile.php");
        exit;
      }
    }

    else{ $_SESSION['error']="Errore durante l'upload";
      header("Location: show_profile.php");  
      exit;
    }
    
  }
  else{ 
    $_SESSION['error']="Immagine non caricata correttamente";
    header("Location: show_profile.php");  
    exit;
  }
?>

 