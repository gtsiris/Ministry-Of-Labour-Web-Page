<!DOCTYPE html>
<html lang="en">
<?php
if (session_status() == PHP_SESSION_NONE) session_start();
?>
<head>
  <meta charset="utf-8">
  <title>Υπουργείο Εργασίας & Κοινωνικών Υποθέσεων</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <!-- css -->
  <link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="css/bootstrap.css" rel="stylesheet" />
  <link href="css/bootstrap-responsive.css" rel="stylesheet" />
  <link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
  <link href="css/jcarousel.css" rel="stylesheet" />
  <link href="css/flexslider.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <!-- Theme skin -->
  <link href="skins/default.css" rel="stylesheet" />
  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png" />
  <link rel="shortcut icon" href="ico/favicon.ico" />

  <!-- =======================================================
    Theme Name: Flattern
    Theme URL: https://bootstrapmade.com/flattern-multipurpose-bootstrap-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <div id="wrapper">
    <!-- toggle top area -->
    <div class="hidden-top">
      <div class="hidden-top-inner container">
        <div class="row">
          <div class="span12">
            <ul>
              <li>Ωράριο λειτουργίας <i class="icon-time"></i><strong>8:30-14:30</strong></li>
              <li>Διεύθυνση <i class="icon-home"></i><strong>Σταδίου 29, Αθήνα 105 59</strong></li>
              <li>Τηλέφωνα επικοινωνίας <i class="icon-phone"></i><strong>213-1516649</strong> <i class="icon-phone"></i><strong>213-1516651</strong></li>
            </ul>
          </div>
					<div class="span12">
            <ul>
              <li>Εξυπηρέτηση με <strong>φυσική παρουσία</strong> μόνο μετά από <strong>ραντεβού!</strong></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- end toggle top area -->
    <!-- start header -->
    <header>
      <div class="container ">
        <!-- hidden top area toggle link -->
        <div id="header-hidden-link">
          <a href="#" class="toggle-link" title="Πληροφορίες Λειτουργίας" data-target=".hidden-top"><i></i>Open</a>
        </div>
        <!-- end toggle link -->
        <div class="row nomargin">
          <div class="span12">
						<div class="headnav">
							<?php
								if(isset($_POST['sign_action'])){
									include 'php/sign.php';
									if($_POST['sign_action'] == "signup"){
										$samka = $_POST['samka'];
										$smail = $_POST['smail'];
										$pass1 = $_POST['pass1'];
										$pass2 = $_POST['pass2'];
										signup($samka,$smail,$pass1,$pass2);
									}
									if($_POST['sign_action'] == "signin"){
										$samka = $_POST['samka'];
										$pass1 =$_POST['pass1'];
										signin($samka,$pass1);
									}
									if($_POST['sign_action'] == "signoff"){
										unset($_SESSION['amka']);
									}
									if($_POST['sign_action'] == "reset"){
										$samka = $_POST['samka'];
										reset_pass($samka);
									}
								}
								if(isset($_SESSION['amka'])){
									$ulg = $_SESSION['amka'];
									echo <<<_END
										<form method="post" action="ergodoths_metra.php">
										ΑΜΚΑ: $ulg &nbsp
										<button type="submit" method="post"  name="sign_action" value="signoff" class="btn btn-theme btn-rounded btn-mini">ΑΠΟΣΥΝΔΕΣΗ</button>
										</form>
									_END;
								}
								else{
									echo <<<_END
									<ul>
										<li><a href="#mySignup" data-toggle="modal"><i class="icon-user"></i> Εγγραφή</a></li>
										<li><a href="#mySignin" data-toggle="modal">Σύνδεση</a></li>
									</ul>
									_END;
								}
							?>
						</div>
            <!-- Signup Modal -->
            <div id="mySignup" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="mySignupModalLabel" aria-hidden="true">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 id="mySignupModalLabel">Δημιουργήστε <strong>λογαριασμό</strong></h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" method="post" action="ergodoths_metra.php">
                  <div class="control-group">
                    <label class="control-label" for="inputAMKA">ΑΜΚΑ</label>
                    <div class="controls">
											<input type="text" name="samka" class="form-control" id="inputAMKA" placeholder="πχ. 25018202618" pattern="[0-9]{11}" title="Εισάγετε τα 11 ψηφία του ΑΜΚΑ σας" required />
                    </div>
                  </div>
									<div class="control-group">
                    <label class="control-label" for="inputEmail">Ηλεκτρονική Διεύθυνση</label>
                    <div class="controls">
                      <input type="email" class="form-control" name="smail" id="inputEmail" placeholder="πχ. nikos@mail.com" data-rule="email" required />
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="inputSignupPassword">Κωδικός</label>
                    <div class="controls">
                      <input type="password" id="inputSignupPassword" name="pass1" placeholder="πχ. 87DNek" minlength="5" required />
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="inputSignupPassword2">Eπιβεβαίωση Κωδικού</label>
                    <div class="controls">
                      <input type="password" id="inputSignupPassword2" name="pass2" placeholder="πχ. 87DNek" minlength="5" required />
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                      <button type="submit" name="sign_action" value="signup" class="btn">ΕΓΓΡΑΦΗ</button>
                    </div>
                    <p class="aligncenter margintop20">
                      Έχετε ήδη λογαριασμό; <a href="#mySignin" data-dismiss="modal" aria-hidden="true" data-toggle="modal">Συνδεθείτε</a>
                    </p>
                  </div>
                </form>
              </div>
            </div>
            <!-- end signup modal -->
            <!-- Sign in Modal -->
            <div id="mySignin" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="mySigninModalLabel" aria-hidden="true">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 id="mySigninModalLabel">Συνδεθείτε στον <strong>λογαριασμό</strong> σας</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" method="post" action="ergodoths_metra.php">
                  <div class="control-group">
                    <label class="control-label" for="inputAMKA">ΑΜΚΑ</label>
                    <div class="controls">
											<input type="text" name="samka" class="form-control" id="inputAMKA" placeholder="πχ. 25018202618" pattern="[0-9]{11}" title="Εισάγετε τα 11 ψηφία του ΑΜΚΑ σας" required />
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="inputSigninPassword">Κωδικός</label>
                    <div class="controls">
											<input type="password" id="inputSigninPassword" name="pass1" placeholder="πχ. 87DNek" minlength="5" required />
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                      <button type="submit" name="sign_action" value="signin" class="btn">ΣΥΝΔΕΣΗ</button>
                    </div>
                    <p class="aligncenter margintop20">
                      Ξεχάσατε τον κωδικό; <a href="#myReset" data-dismiss="modal" aria-hidden="true" data-toggle="modal">Αλλαγή Κωδικού</a>
                    </p>
                  </div>
                </form>
              </div>
            </div>
            <!-- end signin modal -->
            <!-- Reset Modal -->
            <div id="myReset" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="myResetModalLabel" aria-hidden="true">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 id="myResetModalLabel">Αλλάξτε τον <strong>κωδικό</strong> σας</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" method="post" action="ergodoths_metra.php">
                  <div class="control-group">
                    <label class="control-label" for="inputAMKA">ΑΜΚΑ</label>
                    <div class="controls">
											<input type="text" name="samka" class="form-control" id="inputAMKA" placeholder="πχ. 25018202618" pattern="[0-9]{11}" title="Εισάγετε τα 11 ψηφία του ΑΜΚΑ σας" required />
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                      <button type="submit" name="sign_action" value="reset" class="btn">ΑΛΛΑΓΗ ΚΩΔΙΚΟΥ</button>
                    </div>
                    <p class="aligncenter margintop20">
                      Θα σας σταλούν οδηγίες για την αλλαγή κωδικού στην ηλεκτρονική σας διεύθυνση
                    </p>
                  </div>
                </form>
              </div>
            </div>
            <!-- end reset modal -->
          </div>
        </div>
        <div class="row">
          <div class="span4">
            <div class="logo">
              <a href="index.php"><img src="img/logo.png" alt="" class="logo" /></a>
			        <h1> Έχετε εργασιακά ζητήματα; Είμαστε στην διάθεση σας!</h1>
            </div>
          </div>
          <div class="span8">
            <div class="navbar navbar-static-top">
              <div class="navigation">
                <nav>
                  <ul class="nav topnav">
                    <li>
                      <a href="index.php"><i class="icon-home"></i>ΑΡΧΙΚΗ </a>
                    </li>
                    <li class="dropdown">
                      <a href="#">ΕΡΓΑΖΟΜΕΝΟΣ <i class="icon-angle-down"></i></a>
                      <ul class="dropdown-menu">
                        <li class="dropdown"><a href="#">ΚΟΡΩΝΟΪΟΣ <i class="icon-angle-right"></i></a>
                          <ul class="dropdown-menu sub-menu-level1">
                            <li><a href="ergazomenos_metra.php">ΜΕΤΡΑ ΠΡΟΛΗΨΗΣ</a></li>
                            <li><a href="ergazomenos_sumptwmata.php">ΣΥΝΑΔΕΛΦΟΣ ΜΕ ΣΥΜΠΤΩΜΑΤΑ</a></li>
														<li><a href="ergazomenos_thlergasia.php">ΤΗΛΕΡΓΑΣΙΑ</a></li>
														<li><a href="ergazomenos_anastolh.php">ΑΝΑΣΤΟΛΗ ΣΥΜΒΑΣΗΣ ΕΡΓΑΣΙΑΣ</a></li>
														<li><a href="ergazomenos_adeiaEidikouSkopou.php">ΑΔΕΙΑ ΕΙΔΙΚΟΥ ΣΚΟΠΟΥ</a></li>
                          </ul>
                        </li>
												<li><a href="ergazomenos_arxeio.php">ΠΡΟΣΩΠΙΚΟ ΑΡΧΕΙΟ</a></li>
                        <li class="dropdown"><a href="#">ΔΙΚΑΙΩΜΑΤΑ & ΥΠΟΧΡΕΩΣΕΙΣ <i class="icon-angle-right"></i></a>
                          <ul class="dropdown-menu sub-menu-level1">
                            <li><a href="#">ΦΟΡΟΛΟΓΙΑ</a></li>
                            <li><a href="#">ΑΣΦΑΛΙΣΗ</a></li>
                            <li><a href="#">ΑΔΕΙΕΣ</a></li>
														<li><a href="#">ΕΠΙΔΟΜΑΤΑ</a></li>
														<li><a href="#">ΕΡΓΑΤΙΚΑ ΑΤΥΧΗΜΑΤΑ</a></li>
														<li><a href="#">ΑΠΟΖΗΜΙΩΣΗ ΑΠΟΛΥΣΗΣ</a></li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown active">
                      <a href="#">ΕΡΓΟΔΟΤΗΣ <i class="icon-angle-down"></i></a>
                      <ul class="dropdown-menu">
                        <li class="dropdown active"><a href="#">ΚΟΡΩΝΟΪΟΣ <i class="icon-angle-right"></i></a>
                          <ul class="dropdown-menu sub-menu-level1">
                            <li class="active"><a href="ergodoths_metra.php">ΜΕΤΡΑ ΠΡΟΛΗΨΗΣ</a></li>
                            <li><a href="ergodoths_sumptwmata.php">ΕΡΓΑΖΟΜΕΝΟΣ ΜΕ ΣΥΜΠΤΩΜΑΤΑ</a></li>
														<li><a href="ergodoths_thlergasia.php">ΤΗΛΕΡΓΑΣΙΑ</a></li>
														<li><a href="ergodoths_anastolh.php">ΑΝΑΣΤΟΛΗ ΣΥΜΒΑΣΗΣ ΕΡΓΑΣΙΑΣ</a></li>
                          </ul>
                        </li>
												<li><a href="ergodoths_arxeio.php">ΑΡΧΕΙΟ ΕΠΙΧΕΙΡΗΣΗΣ</a></li>
                        <li class="dropdown"><a href="#">ΔΙΚΑΙΩΜΑΤΑ & ΥΠΟΧΡΕΩΣΕΙΣ <i class="icon-angle-right"></i></a>
                          <ul class="dropdown-menu sub-menu-level1">
                            <li><a href="#">ΦΟΡΟΛΟΓΙΑ</a></li>
                            <li><a href="#">ΑΣΦΑΛΙΣΗ</a></li>
                            <li><a href="#">ΑΔΕΙΕΣ ΠΡΟΣΩΠΙΚΟΥ</a></li>
														<li><a href="#">ΕΠΙΔΟΤΗΣΕΙΣ</a></li>
														<li><a href="#">ΚΛΑΔΙΚΕΣ ΣΥΜΒΑΣΕΙΣ</a></li>
														<li><a href="#">ΑΠΟΖΗΜΙΩΣΕΙΣ</a></li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#">ΑΝΕΡΓΟΣ <i class="icon-angle-down"></i></a>
                      <ul class="dropdown-menu">
												<li><a href="#">ΠΑΡΟΧΕΣ</a></li>
                        <li><a href="#">ΕΥΡΕΣΗ ΕΡΓΑΣΙΑΣ</a></li>
												<li><a href="#">ΕΠΑΓΓΕΛΜΑΤΙΚΗ ΚΑΤΑΡΤΙΣΗ</a></li>
												<li><a href="#">ΣΕΜΙΝΑΡΙΑ ΕΠΙΜΟΡΦΩΣΗΣ</a></li>
                        <li><a href="#">ΠΡΟΣΦΟΡΑ & ΖΗΤΗΣΗ ΕΠΑΓΓΕΛΜΑΤΩΝ</a></li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#">ΣΥΝΤΑΞΙΟΥΧΟΣ <i class="icon-angle-down"></i></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">ΣΥΝΤΑΞΗ</a></li>
                        <li><a href="#">ΤΑΥΤΟΧΡΟΝΗ ΕΡΓΑΣΙΑ</a></li>
                        <li><a href="#">ΕΠΙΔΟΜΑΤΑ</a></li>
												<li><a href="#">ΚΡΑΤΗΣΕΙΣ</a></li>
												<li><a href="#">ΜΕΤΑΒΙΒΑΣΗ ΣΥΝΤΑΞΗΣ</a></li>
                      </ul>
                    </li>
										<li class="dropdown">
                      <a href="#">ΕΞΥΠΗΡΕΤΗΣΗ ΠΟΛΙΤΗ <i class="icon-angle-down"></i></a>
                      <ul class="dropdown-menu">
                        <li><a href="eksuphrethsh_hlektronika.php">ΗΛΕΚΤΡΟΝΙΚΑ</a></li>
                        <li><a href="eksuphrethsh_fusikhParousia.php">ΦΥΣΙΚΗ ΠΑΡΟΥΣΙΑ</a></li>
                        <li><a href="eksuphrethsh_epikoinwnia.php">ΕΠΙΚΟΙΝΩΝΙΑ</a></li>
                      </ul>
                    </li>
                  </ul>
                </nav>
              </div>
              <!-- end navigation -->
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- end header -->
		<section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span12">
						<div class="cta floatleft">
							<ul class="breadcrumb">
								<li><a href="index.php"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
								<li class="active">Εργοδότης<i class="icon-angle-right"></i></li>
								<li class="active">Κορωνοϊός<i class="icon-angle-right"></i></li>
								<li class="active">Μέτρα Πρόληψης</li>
							</ul>
						</div>
          </div>
					<div class="span12" style="float: left; text-align: center;">
						<div class="inner-heading">
							<h2>Μέτρα Πρόληψης</h2>
						</div>
					</div>
        </div>
      </div>
    </section>
		<section class="content">
			<div class="text-center">
				<img width="100%" height="50%" src="img/symptoms/metra.jpg" title="Μέτρα προφύλαξης από τον κορωνοϊό" alt="Εικόνα που γράφει μέτρα προφύλαξης από τον κορωνοϊό.">
			</div>
		</section>
    <section class="callaction">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="big-cta">
              <div class="cta-text">
                <h4>Τα προληπτικά μέτρα για τον έλεγχο της διασποράς του κορωνοϊου περιλαμβάνουν μέτρα <span class="highlight"><strong><a href="#organisational">οργανωτικά</a>,
                   <a href="#hygiene">ατομικής υγιεινής</a></span></strong> και <span class="highlight"><strong><a href="#environmental">περιβαλλοντικά</a></strong></span>.</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <!-- Organisational Measures -->
      <div class="container">
        <div class="row">
          <div class="span12">
            <h3 id="organisational" class="heading">Οργανωτικά Μέτρα</h3>
            <div class="row">
              <section id="projects">
                <ul id="thumbs" class="portfolio">
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 design" data-id="id-0" data-type="web">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Τηλεργασία" href="img/works/full/organ1.png">
                      <span class="overlay-img"></span>
                      <span class="overlay-img-thumb font-icon-plus"></span>
                    </a>
                    <!-- Thumb Image and Description -->
                    <img src="img/works/thumbs/organ1.png" alt="Υιοθετούμε ενναλακτικές μεθόδους οργάνωσης του χρόνου εργασίας
                      όπως η σταδιακή προσέλευση και αποχώρηση των εργαζομένων και η εξ αποστάσεως εργασία.">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 design" data-id="id-1" data-type="icon">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Τήρηση Αποστάσεων" href="img/works/full/organ2.png">
                      <span class="overlay-img"></span>
                      <span class="overlay-img-thumb font-icon-plus"></span>
                    </a>
                    <!-- Thumb Image and Description -->
                    <img src="img/works/thumbs/organ2.png" alt="Αναδιοργανώνουμε τις θέσεις εργασίας τηρώντας τις ασφαλείς αποστάσεις
                      και τον συνολικό αριθμό ατόμων ανά μονάδα επιφάνειας. Έως 20τμ: 4 άτομα | 20-100τμ: 4 άτομα και 1/10τμ | Άνω
                        των 100τμ: 12 άτομα και 1/15τμ.">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 photography" data-id="id-2" data-type="illustrator">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Τηλεδιασκέψεις" href="img/works/full/organ3.png">
                      <span class="overlay-img"></span>
                      <span class="overlay-img-thumb font-icon-plus"></span>
                    </a>
                    <!-- Thumb Image and Description -->
                    <img src="img/works/thumbs/organ3.png" alt="Μεταθέτουμε μελλοντικά, στο μέτρο του εφικτού, εκδηλώσεις, συνεργασίες, 
                    ημερίδες και συναντήσεις. Εφαρμόζουμε εναλλακτικές πρακτικές όπως η τηλεφωνική επικοινωνία, οι τηλεδιασκέψεις και τα e-mail.">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 photography" data-id="id-2" data-type="illustrator">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Ρύθμιση Προσέλευσης" href="img/works/full/organ4.png">
                      <span class="overlay-img"></span>
                      <span class="overlay-img-thumb font-icon-plus"></span>
                    </a>
                    <!-- Thumb Image and Description -->
                    <img src="img/works/thumbs/organ4.png" alt="Επιβλέπουμε την προσέλευση τρίτων, όπως πελάτες, συνεργάτες και διανομείς, για την 
                    αποφυγή του συνωστισμού σε κοινόχρηστους χώρους. Είμαστε υπεύθυνοι για την εφαρμογή των μέτρων προστασίας (μάσκες, αποστάσεις ασφαλείας).">
                  </li> 
                  <!-- End Item Project -->
                </ul>
              </section>
            </div>
          </div>
        </div>
        <!-- End Organisational Measures -->
        <a href="#organisationalModal" data-toggle="modal" class="pull-right">Τα οργανωτικά μέτρα (αριθμημένα) <i class="icon-angle-right"></i></a>
        <!-- Organisational Measures Modal -->
        <div id="organisationalModal" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="organisationalModalLabel" aria-hidden="true">
          <div class="modal-header analysis-header text-center">
            <button type="button" class="close analysis-close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 id="organisationalModalLabel"><strong>Οργανωτικά Μέτρα</strong></h4>
          </div>
          <div class="modal-body analysis-body">
            <img src="img/modals/modal1.png" alt="Αναλυτικά τα οργανωτικά μέτρα.">
          </div>
        </div>
        <!-- End Organisational Measures modal -->
        <!-- divider -->
        <div class="row">
          <div class="span12">
            <div class="solidline">
            </div>
          </div>
        </div>
        <!-- end divider -->
      </div>
      <!-- Hygiene Measures -->
      <div class="container">
        <div class="row">
          <div class="span12">
            <h3 id="hygiene" class="heading">Μέτρα Υγιεινής</h3>
            <div class="row">
              <section id="projects">
                <ul id="thumbs" class="portfolio">
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 design" data-id="id-0" data-type="web">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Προφύλαξη από Πιθανά Κρούσματα" href="img/works/full/hygiene1.png">
                      <span class="overlay-img"></span>
                      <span class="overlay-img-thumb font-icon-plus"></span>
                    </a>
                    <!-- Thumb Image and Description -->
                    <img src="img/works/thumbs/hygiene1.png" alt=" Αποφεύγουμε τις επαφές εργαζομένων και τρίτων
                      με άτομα που παρουσιάζουν συμπτώματα λοιμώξεων, χωρίς την κατάλληλη προφύλαξη.">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 design" data-id="id-1" data-type="icon">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Επίβλεψη Ατομικής Υγιεινής" href="img/works/full/hygiene2.png">
                      <span class="overlay-img"></span>
                      <span class="overlay-img-thumb font-icon-plus"></span>
                    </a>
                    <!-- Thumb Image and Description -->
                    <img src="img/works/thumbs/hygiene2.png" alt="Προτρέπουμε και επιβλέπουμε τους εργαζομένους και τρίτους για την
                     ορθή εφαρμογή των πρακτικών ατομικής υγιεινής και την χρήση ατομικών μέσων προστασίας.">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 photography" data-id="id-2" data-type="illustrator">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Παροχή Μέσων Καθαρισμού" href="img/works/full/hygiene3.png">
                      <span class="overlay-img"></span>
                      <span class="overlay-img-thumb font-icon-plus"></span>
                    </a>
                    <!-- Thumb Image and Description -->
                    <img src="img/works/thumbs/hygiene3.png" alt="Παρέχουμε ατομικά μέσα προστασίας και αντισηπτικά διαλύματα
                    στους εργαζομένους και τοποθετούμε μηχανισμούς αντισηψίας στους κοινόχρηστους χώρους.">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 photography" data-id="id-2" data-type="illustrator">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Συλλογή Απορριμάτων" href="img/works/full/hygiene4.png">
                      <span class="overlay-img"></span>
                      <span class="overlay-img-thumb font-icon-plus"></span>
                    </a>
                    <!-- Thumb Image and Description -->
                    <img src="img/works/thumbs/hygiene4.png" alt="Τοποθετούμε κάδους με πηδάλιο ποδιού για τη 
                      συλλογή μασκών, χαρτιών και άλλων μέσων απολύμανσης και ατομικής υγιεινής. Δεν καταναλώνουμε
                      τροφές εκτός των χώρων εστιάσης.">
                  </li> 
                  <!-- End Item Project -->
                </ul>
              </section>
            </div>
          </div>
        </div>
        <!-- End Hygiene Measures -->
        <a href="#hygieneModal" data-toggle="modal" class="pull-right">Τα μέτρα υγιεινής (αριθμημένα) <i class="icon-angle-right"></i></a>
        <!-- Hygiene Measures Modal -->
        <div id="hygieneModal" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="hygieneModalLabel" aria-hidden="true">
          <div class="modal-header analysis-header text-center">
            <button type="button" class="close analysis-close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 id="hygieneModalLabel"><strong>Μέτρα Υγιεινής</strong></h4>
          </div>
          <div class="modal-body analysis-body">
            <img src="img/modals/modal2.png" alt="Αναλυτικά τα μέτρα υγιεινής.">
          </div>
        </div>
        <!-- End Hygiene Measures modal -->        
        <!-- divider -->
        <div class="row">
          <div class="span12">
            <div class="solidline">
            </div>
          </div>
        </div>
        <!-- end divider -->
      </div>
      <!-- Environmental Measures -->
      <div class="container">
        <div class="row">
          <div class="span12">
            <h3 id="environmental" class="heading">Περιβαλλοντικά Μέτρα</h3>
            <div class="row">
              <section id="projects">
                <ul id="thumbs" class="portfolio">
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 design" data-id="id-0" data-type="web">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Αερισμός Χώρων" href="img/works/full/env1.png">
                      <span class="overlay-img"></span>
                      <span class="overlay-img-thumb font-icon-plus"></span>
                    </a>
                    <!-- Thumb Image and Description -->
                    <img src="img/works/thumbs/env1.png" alt=" Φροντίζουμε για τον αερισμό όλων των χώρων εργασίας και 
                      συντηρούμε τακτικά τα συστήματα κλιματισμού και εξαερισμού.">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 design" data-id="id-1" data-type="icon">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Τακτικός Καθαρισμός" href="img/works/full/env2.png">
                      <span class="overlay-img"></span>
                      <span class="overlay-img-thumb font-icon-plus"></span>
                    </a>
                    <!-- Thumb Image and Description -->
                    <img src="img/works/thumbs/env2.png" alt="Καθαρίζουμε συστηματικά τις επιφάνειες, τον εξοπλισμό, τα αντικείμενα και τους 
                     κοινόχρηστους χώρους, όπως τα λουτρά και οι χώροι εστίασης.">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 photography" data-id="id-2" data-type="illustrator">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Απολύμανση μετά από Κρούσμα " href="img/works/full/env3.png">
                      <span class="overlay-img"></span>
                      <span class="overlay-img-thumb font-icon-plus"></span>
                    </a>
                    <!-- Thumb Image and Description -->
                    <img src="img/works/thumbs/env3.png" alt="Απολυμαίνουμε άμεσα τους χώρους όπου εντοπίζεται πιθανό ή 
                     επιβεβαιωμένο κρούσμα του κορωνοϊού με κατάλληλα εξοπλισμένο προσωπικό.">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 photography" data-id="id-2" data-type="illustrator">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Καθαρισμός Ένδυσης" href="img/works/full/env4.png">
                      <span class="overlay-img"></span>
                      <span class="overlay-img-thumb font-icon-plus"></span>
                    </a>
                    <!-- Thumb Image and Description -->
                    <img src="img/works/thumbs/env4.png" alt="Καθαρίζουμε όσο το δυνατόν συχνότερα φόρμες και στολές εργασίας, γυαλιά, κράνη
                     και κάθε άλλο επαναχρησιμοποιούμενο μέσο ατομικής υγιεινής.">
                  </li> 
                  <!-- End Item Project -->
                </ul>
              </section>
            </div>
          </div>
        </div>
        <!-- End Environmental Measures -->
        <a href="#environmentModal" data-toggle="modal" class="pull-right">Τα περιβαλλοντικά μέτρα (αριθμημένα) <i class="icon-angle-right"></i></a>
        <!-- Hygiene Measures Modal -->
        <div id="environmentModal" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="environmentModalLabel" aria-hidden="true">
          <div class="modal-header analysis-header text-center">
            <button type="button" class="close analysis-close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 id="environmentModalLabel"><strong>Περιβαλλοντικά Μέτρα</strong></h4>
          </div>
          <div class="modal-body analysis-body">
            <img src="img/modals/modal3.png" alt="Αναλυτικά τα μέτρα υγιεινής.">
          </div>
        </div>
        <!-- End Environmental Measures modal -->
        <!-- divider -->
        <div class="row">
          <div class="span12">
            <div class="solidline">
            </div>
          </div>
        </div>
        <!-- end divider -->
      </div>      
    </section>
		<section class="callaction">
      <div class="container">
        <div class="row">
          <div class="span12 text-left">
            <div class="big-cta">
              <div class="cta-text">
								<h3>Γιατί;</h3>
								<span class="pullquote-left">
									<h6>Δίνοντας την απαιτούμενη βαρύτητα στην <strong>πρόληψη</strong>, αποτρέπουμε δυσάρεστες εξελίξεις.
									Αντιλαμβανόμαστε την σοβαρότητα της κατάστασης και την αντιμετωπίζουμε με <strong>υπευθυνότητα</strong>.</h6>
								</span>
								<span class="pullquote-right margintop10">
									<h6><strong>Προστατεύουμε</strong> την υγεία τον εργαζομένων και δεν τους εκθέτουμε σε κίνδυνο.
									Τα παρακάτω <a href="#charts">γραφήματα</a> δεν αφήνουν περιθώριο αμφιβολίας για την <strong>αναγκαιότητα τήρησης</strong> όλων των παραπάνω μέτρων στο ακέραιο.</h6>
								</span>
              </div>
            </div>
        </div>
      </div>
    </section>  
    <section id="content">
      <div class="container">          
        <div class="row">
          <div class="span4 span-sm-12 text-left">
            <div class="big-cta">
              <div class="cta-text">
                <h5 id="charts">Ημερήσια στοιχεία επιβεβαιωμένων <strong>κρουσμάτων</strong> covid-19 στην <strong>Ελλάδα</strong>.</h5>
              </div>
            </div>
          </div>
          <div class="span8">
            <canvas id="canvas2" width="550" height="250" ></canvas>
            <div class="text-right">Πηγή: <a href="https://www.covid19response.gr/index_en.php" target="_blank"> Covid-19 Response Greece</a></div>
          </div>
        </div>
        <div class="row">
          <div class="span12">
            <div class="solidline">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="span4 span-sm-12 text-left">
            <div class="big-cta">
              <div class="cta-text">
                <h5>Ημερήσια στοιχεία <strong>θανάτων</strong> λόγω covid-19 στην <strong>Ελλάδα</strong>.</h5>
              </div>
            </div>
          </div>
          <div class="span8">
            <canvas id="canvas" width="550" height="250" ></canvas>
            <div class="text-right">Πηγή: <a href="https://www.covid19response.gr/index_en.php" target="_blank"> Covid-19 Response Greece</a></div>
          </div>
        </div>      
      </div>
    </section>
		<footer>
			<div class="container">
				<div class="row">
					<div class="span4">
						<div class="widget">
							<h5 class="widgetheading">Αρμοδιότητες</h5>
							<ul class="link-list">
								<li>Ατομικές και συλλογικές συμβάσεις</li>
								<li>Επιθεώρηση εργασιακών σχέσεων</li>
								<li>Κοινωνική ένταξη και κοινωνική συνοχή</li>
								<li>Κύρια ασφάλιση και εισφορές</li>
								<li>Οικονομική εποπτεία νομικών προσώπων</li>
								<li>Προστασία δικαιωμάτων ατόμων με αναπηρία</li>
								<li>Υγεία και ασφάλεια στην εργασία</li>
								<li>Υποστήριξη ανθρώπινου δυναμικού</li>
							</ul>
						</div>
					</div>
					<div class="span4">
						<div class="widget">
							<h5 class="widgetheading">Συνεργαζόμενα Υπουργεία</h5>
							<ul class="link-list">
								<li><a href="http://www.mindev.gov.gr/" target="_blank">Υπουργείο Ανάπτυξης και Επενδύσεων</a></li>
								<li><a href="https://www.ministryofjustice.gr/" target="_blank">Υπουργείο Δικαιοσύνης</a></li>
								<li><a href="https://www.minfin.gr/" target="_blank">Υπουργείο Οικονομικών</a></li>
								<li><a href="https://www.minedu.gov.gr/" target="_blank">Υπουργείο Παιδείας και Θρησκευμάτων</a></li>
								<li><a href="http://www.mopocp.gov.gr/main.php" target="_blank">Υπουργείο Προστασίας του Πολίτη</a></li>
								<li><a href="https://mintour.gov.gr/" target="_blank">Υπουργείο Τουρισμού</a></li>
								<li><a href="https://www.moh.gov.gr/" target="_blank">Υπουργείο Υγείας</a></li>
							</ul>
						</div>
					</div>
					<div class="span4">
						<div class="widget">
							<h5 class="widgetheading">Στοιχεία Επικοινωνίας</h5>
							<address>
								<strong>Υπουργείο Εργασίας & Κοινωνικών Υποθέσεων</strong><br>
								 Σταδίου 29<br>
								 Αθήνα 105 59, Αττική
							</address>
							<p>
								<i class="icon-phone"></i> 213-1516649 <br>
								<i class="icon-phone"></i> 213-1516651 <br>
								<i class="icon-envelope-alt"></i> pliroforisi_politi@ypakp.gr <br>
								<i class="icon-envelope-alt"></i> apasxolisi@ypakp.gr <br>
								<i class="icon-envelope-alt"></i> asfaleiaygeia@ypakp.gr <br>
								<i class="icon-envelope-alt"></i> amea@yeka.gr
							</p>
						</div>
					</div>
				</div>
			</div>
			<div id="sub-footer">
				<div class="container">
					<div class="row">
						<div class="span6">
							<div class="copyright">
								<p>
									<span>&copy; Υπουργείο Εργασίας & Κοινωνικών Υποθέσεων - All rights reserved.</span>
								</p>
								<div class="credits">
									Designed by <a href="https://www.di.uoa.gr/" target="_blank">Department of Informatics & Telecommunications</a>
								</div>
							</div>
						</div>
						<div class="span6">
							<ul class="social-network">
								<li><a href="https://www.facebook.com/labourgovgr/" target="_blank" data-placement="bottom" title="Facebook"><i class="icon-facebook icon-square"></i></a></li>
								<li><a href="https://twitter.com/labourgovgr" target="_blank" data-placement="bottom" title="Twitter"><i class="icon-twitter icon-square"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
	<a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-32 active"></i></a>
  <!-- javascript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/jcarousel/jquery.jcarousel.min.js"></script>
  <script src="js/jquery.fancybox.pack.js"></script>
  <script src="js/jquery.fancybox-media.js"></script>
  <script src="js/google-code-prettify/prettify.js"></script>
  <script src="js/portfolio/jquery.quicksand.js"></script>
  <script src="js/portfolio/setting.js"></script>
  <script src="js/jquery.flexslider.js"></script>
  <script src="js/jquery.nivo.slider.js"></script>
  <script src="js/modernizr.custom.js"></script>
  <script src="js/jquery.ba-cond.min.js"></script>
  <script src="js/jquery.slitslider.js"></script>
  <script src="js/animate.js"></script>

	<!--  Scripts for charts -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
	<script src="js/covidDeathStats.js"></script>
	<script src="js/covidCasesStats.js"></script>

  <!-- Template Custom JavaScript File -->
  <script src="js/custom.js"></script>

</body>
</html>