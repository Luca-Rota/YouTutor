
<?php include('../include/Navbar.php'); ?>

  <div class="container-fluid myInfo ">
    <div class="row myRowInfo">

      <div class="col-md-2 myMenu">
        <div class="nav flex-column nav-pills font-weight-bold" id="v-pills-tab" role="tablist" aria-orientation="vertical">
         
          <a class="nav-link <?php if($_GET['info']==='chi') echo 'active';?>" 
          id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" 
          aria-selected="<?php if(isset($_GET['info'])){if($_GET['info']==='chi') echo 'true';} else echo 'false';?>"> Chi Siamo </a>

          <a class="nav-link <?php if($_GET['info']==='dove') echo 'active';?>" 
          id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" 
          aria-selected="<?php if(isset($_GET['info'])){if($_GET['info']==='dove') echo 'true';} else echo 'false';?>"> Dove Siamo </a>
            
          <a class="nav-link <?php if($_GET['info']==='cosa') echo 'active';?>" 
          id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" 
          aria-selected="<?php if(isset($_GET['info'])){if($_GET['info']==='cosa') echo 'true';} else echo 'false';?>"> Cosa Facciamo </a>
            
          <a class="nav-link <?php if($_GET['info']==='cont') echo 'active';?>" 
          id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" 
          aria-selected="<?php if(isset($_GET['info'])){if($_GET['info']==='cont') echo 'true';} else echo 'false';?>"> Contatti </a>
        </div>
      </div>

      <div class="col-md-10 myText">
        <div class="tab-content" id="v-pills-tabContent">
          
          <div class="tab-pane fade <?php if($_GET['info'] === 'chi')  echo'show active'; ?>" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
            <div class="container myContText">
              <div class="row">
                <div class="col-md-4 myBoxImg">
                  <img src="../img/reg.jpg" alt="paginaInformativa" class="img-fluid">
                </div>
                <div class="col-md-7 myRealT">
                  <p>Ciao, mi presento, sono <b>Luca</b>, ho 21 anni, vengo dalla <b>provincia di Savona</b> ed insieme al mio collega <b>Andrea</b>, 21 anni, residente di <b>Genova</b>, siamo due amanti <b>dell'informatica ed aspiranti ingegneri</b>.</p>
                  <p>Quest' anno abbiamo frequentato il terzo anno di <b>Ingegneria Informatica</b> e per il corso <b>Svilluppo di Applicazioni Web</b>, abbiamo deciso di creare questo sito, con l'obbiettivo di facilitare la ricerca di tutor all'interno dell'ateneo e non solo. </p>
                </div> 
              </div>
            </div>
          </div>
          
          <div class="tab-pane fade <?php if($_GET['info']==='dove') echo 'show active'; ?>" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
            <div class="container myContText2">
              <div class="row">
                <div class="col-md-4 myBoxImg2">
                  <a href="https://www.google.it/maps/place/Universit%C3%A0+degli+studi+di+Genova+-+Dipartimento+di+Informatica,+Bioingegneria,+Robotica+e+Ingegneria+dei+Sistemi/@44.4029728,8.9586525,18z/data=!4m12!1m6!3m5!1s0x12d3430b03781669:0x811064c08964d8bb!2sUniversit%C3%A0+degli+studi+di+Genova+Dipartimento+di+Ingegneria+Meccanica,+Energetica,+Gestionale+e+dei+Trasporti!8m2!3d44.402892!4d8.9587846!3m4!1s0x0:0xdc35f0ca6001ca6f!8m2!3d44.4033423!4d8.9584011"> 
                    <img src="../img/mappa.JPG" alt="paginaInformativa" class="img-fluid"> </a>
                </div>
                <div class="col-md-7 myRealT myDove">
                  <p> Non abbiamo ancora una vera e propria sede, ma il punto di partenza è sicuramente dove è nato il progetto, ovvero a <b>Genova</b>, in <b>Via dell'Opera Pia</b>, dove è presente <b>l'Università degli studi di Genova, Dipartimento di Informatica</b>. </p>
                </div> 
              </div>
            </div>
          </div>

          <div class="tab-pane fade <?php if ($_GET['info'] === 'cosa') {echo 'show active';}?>" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
            <div class="container myContText3">
              <div class="row">
                <div class="col-md-4 myBoxImg3">
                    <img src="../img/info.jpg" alt="paginaInformativa" class="img-fluid"> 
                </div>
                <div class="col-md-7 myRealT">
                  <p> Il nostro obbiettivo è di creare un sito che permetta a gli utenti di registrarsi sia come utenti basic che come tutor.</p>
                  <p> Il sito infatti permette a gli utenti basic di trovare il tutor di cui hanno bisogno, per ovviare alla loro carenze in un alcune materie, ma non solo.</p>
                  <p> Infatti gli utenti possono al tempo stesso registrarsi come tutor,<b> per offrire il loro aiuto agli altri studenti </b>, nella materie in cui eccellono. </p>
                </div> 
              </div>
            </div>
          </div>

          <div class="tab-pane fade <?php if ($_GET['info'] === 'cont') {echo 'show active';}?>" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
            <div class="container myContText4">
              <div class="row">
                <div class="col-md-2 myColCont1">
                  <p>Indirizzi Email:</p>
                </div>
                <div class="col-md-6 myColCont2">
                  <p><b>Luca.tutor@gmail.com</b></p>
                  <p><b>Andrea.tutor@gmail.com</b></p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 myColCont3">
                  <p>Seguici sui social:</p>
                </div>
              </div>
            
            <div class="row">
              <div class="col-md-8 myColCont4">
                <a href="http://scripteden.com/download/eden-ui/" target="_blank" class="btn-social btn-facebook"><i class="fa fa-facebook"></i></a>
                <a href="http://scripteden.com/download/eden-ui/" target="_blank" class="btn-social btn-google-plus"><i class="fa fa-google-plus"></i></a>
                <a href="http://scripteden.com/download/eden-ui/" target="_blank" class="btn-social btn-linkedin"><i class="fa fa-linkedin"></i></a>
                <a href="http://scripteden.com/download/eden-ui/" target="_blank" class="btn-social btn-twitter"><i class="fa fa-twitter"></i></a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<?php  include('../include/Footer.php'); ?>