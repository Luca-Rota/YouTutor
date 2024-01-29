
<!DOCTYPE html>
<html lang="it">

<head>
  <title> YouTutor </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/stile.css">
  <link rel="icon"  href="../img/favicon.ico" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    
  <nav class=" navbar navbar-dark bg-primary fixed-top navbar-expand-lg navbar-light myNav">
    <a class="navbar-brand" href="../php/index.php">
      <img src="../img/Logo.jpg" width="150" height="50" class="d-inline-block align-top" alt="">
    </a>
        
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      
    <div class="collapse navbar-collapse myNav2" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link Mynav-link font-weight-bold" href="../php/index.php"> Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link Mynav-link font-weight-bold" href="../php/tutor.php"> Tutor </a>
        </li>
      
	  <?php   
        session_start();
        require_once('db/mysql_credentials.php');
        if(isset($_SESSION['id'])){     
        echo
		'<li class="nav-item active">
          <a class="nav-link Mynav-link font-weight-bold" href="../php/Messaggi.php?typeMex=new"> Messaggi </a>
        </li>';} 
	  ?>

     </ul>

     <?php 
       if(isset($_SESSION['id'])){
		 echo
		 '<ul class="navbar-nav my-2 my-lg-0">
		   <li class=" nav-item active">
			  <a class="nav-link Mynav-link font-weight-bold" href="../php/show_profile.php"> Profilo </a> 
		   </li>
		 </ul>
		 <a class="navbar-brand" href="../php/show_profile.php">
		   <img src="../img/profile-button.png" width="50" height="50" class="d-inline-block align-top" alt="">
	     </a>';
       }
	   else{ 
		 echo
		 '<ul class="navbar-nav my-2 my-lg-0"> 
		   <li class=" nav-item dropdown active">
             <a class="nav-link Mynav-link font-weight-bold dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
               Accedi </a> 
			   <form class="dropdown-menu p-4 dropdown-menu-right" action="login.php" method="POST" >
				 <div class="form-group">
				   <label for="exampleDropdownFormEmail2"> <b>Email</b> </label>
				   <input type="email" class="form-control" id="exampleDropdownFormEmail2" placeholder="Email" required name="email">
				 </div>
				 <div class="form-group">
				   <label for="exampleDropdownFormPassword2"><b>Password</b></label>
				   <input type="password" class="form-control" id="exampleDropdownFormPassword2" placeholder="Password" required name="pass">
				 </div>';
				 if(isset($_SESSION['error'])){
				   echo
				   '<p class="errorLogin">E-mail o password errati</p>';
				   unset($_SESSION['error']);
				 }
				 echo
				 '<button type="submit" class="btn btn-primary" name="Submit" value="Submit">Accedi</button>
			   </form>
</li>
<li class=" nav-item active">
<a class="nav-link Mynav-link font-weight-bold" href="../php/form_registration.php"> Registrati </a> 
</li>
</ul>'; 
		   } ?> 
    </div>
  </nav>
    
  <div class="content">