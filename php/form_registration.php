
<?php include('../include/Navbar.php'); ?>

<div class="myReg">
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3 myRegTitle">
        <h1 class="myRegTitle2 font-weight-bold"> Registrati Ora! </h1>
      </div>
    </div> 

    <div class="row">
      <div class="col-md-6 offset-md-3 myRegForm">
        <form action="registration.php" method="POST">
          <div class="form-group">
            <i class="fa fa-user myIcons" aria-hidden="true"></i>
            <label class="font-weight-bold"> Nome </label>
            <input type="text" class="form-control myRegForm2" placeholder="InserisciNome" required name="firstname">
          </div>
          <div class="form-group">
            <i class="fa fa-user myIcons" aria-hidden="true"></i>
            <label class="font-weight-bold"> Cognome </label>
            <input type="text" class="form-control myRegForm2" placeholder="InserisciCognome" required name="lastname">
          </div>
          <div class="form-group">
            <i class="fa fa-envelope myIcons" aria-hidden="true"></i>
            <label class="font-weight-bold"> Email </label>            
            <input type="email" class="form-control myRegForm2" placeholder="InserisciEmail" required name="email">
          </div>
          <div class="form-group">
            <i class="fa fa-lock myIcons" aria-hidden="true"></i>
            <label class="font-weight-bold"> Password </label>
            <input type="password" class="form-control myRegForm2" placeholder="InserisciPassword" required name="pass">
          </div>
          <div class="form-group">
            <i class="fa fa-lock myIcons" aria-hidden="true"></i>
            <label class="font-weight-bold"> Conferma Password </label>
            <input type="password" class="form-control myRegForm2" placeholder="RipetiPassword" required name="confirm">
          </div>
			<div class="row">
			  <div class="col-md-6 offset-md-3 myRegBottom">
					  <button type="submit" value="Submit" class="btn btn-primary active" name="sub"> Crea Account </button>
			  </div>
			</div>
		</form>
      </div>
    </div>
  </div>
</div>
  
<?php  include('../include/Footer.php'); ?>