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
										<form method="post" action="index.php">
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
                <form class="form-horizontal" method="post" action="index.php">
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
                <form class="form-horizontal" method="post" action="index.php">
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
                <form class="form-horizontal" method="post" action="index.php">
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
                    <li class="dropdown active">
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
                    <li class="dropdown">
                      <a href="#">ΕΡΓΟΔΟΤΗΣ <i class="icon-angle-down"></i></a>
                      <ul class="dropdown-menu">
                        <li class="dropdown"><a href="#">ΚΟΡΩΝΟΪΟΣ <i class="icon-angle-right"></i></a>
                          <ul class="dropdown-menu sub-menu-level1">
                            <li><a href="ergodoths_metra.php">ΜΕΤΡΑ ΠΡΟΛΗΨΗΣ</a></li>
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
    <section id="featured">
      <!-- start slider -->
      <!-- Slider -->
      <div id="nivo-slider">
        <div class="nivo-slider">
          <!-- Slide #1 image -->
          <img src="img/slides/nivo/bg-1.jpg" alt="" title="#caption-1" />
          <!-- Slide #2 image -->
          <img src="img/slides/nivo/bg-2.jpg" alt="" title="#caption-2" />
          <!-- Slide #3 image -->
          <img src="img/slides/nivo/bg-3.jpg" alt="" title="#caption-3" />
		  <!-- Slide #4 image -->
          <img src="img/slides/nivo/bg-4.jpg" alt="" title="#caption-4" />
        </div>
        <div class="container">
          <div class="row">
            <div class="span12">
              <!-- Slide #1 caption -->
              <div class="nivo-caption" id="caption-1">
                <div>
                  <h2><strong>Εργασία από απόσταση</strong></h2>
                  <p>
										Περιορίζοντας όσο το δυνατόν περισσότερο τις μετακινήσεις μας, συμβάλουμε στην καταπολέμηση της διασποράς του κορωνοϊού. Εργαζόμαστε απ'το σπίτι!
                  </p>
                  <a href="ergazomenos_thlergasia.php" class="btn btn-theme">ΤΗΛΕΡΓΑΣΙΑ</a>
                </div>
              </div>
              <!-- Slide #2 caption -->
              <div class="nivo-caption" id="caption-2">
                <div>
                  <h2><strong>Μέτρα πρόληψης</strong></h2>
                  <p>
                    Αν το επάγγελμα απαιτεί φυσική παρουσία του προσωπικού στον χώρο εργασίας, ενημερωνόμαστε για τα απαραίτητα μέτρα πρόληψης και τα εφαρμόζουμε με υπευθυνότητα.
                  </p>
                  <a href="ergodoths_metra.php" class="btn btn-theme">ΜΕΤΡΑ ΠΡΟΛΗΨΗΣ</a>
                </div>
              </div>
              <!-- Slide #3 caption -->
              <div class="nivo-caption" id="caption-3">
                <div>
                  <h2><strong>Συνάδελφος με συμπτώματα</strong></h2>
                  <p>
                    Αν κάποιος συνάδελφος εμφανίσει συμπτώματα ενδεικτικά του ιού, διατηρούμε την ψυχραιμία μας και ακολουθούμε τις οδηγίες.
                  </p>
                  <a href="ergazomenos_sumptwmata.php" class="btn btn-theme">ΟΔΗΓΙΕΣ</a>
                </div>
              </div>
			  <!-- Slide #4 caption -->
              <div class="nivo-caption" id="caption-4">
                <div>
                  <h2><strong>Ηλεκτρονική εξυπηρέτηση</strong></h2>
                  <p>
										Στις δύσκολες αυτές συνθήκες, είναι σημαντικό να δρούμε με αίσθημα ευθύνης. Αποφεύγουμε τις μετακινήσεις, εξυπηρετούμαστε ηλεκτρονικά!
                  </p>
                  <a href="eksuphrethsh_hlektronika.php" class="btn btn-theme">ΗΛΕΚΤΡΟΝΙΚΗ ΕΞΥΠΗΡΕΤΗΣΗ</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end slider -->
    </section>
		<div class="container">
			<div class="row">
			</div>
			<div class="row">
			</div>
			<div class="row">
				<div class="span12">
					<div class="big-cta">
						<div class="cta-text">
							<h3><a href="#trends">Συχνές αναζητήσεις <i class="icon-arrow-down"></i></a></h3>
						</div>
					</div>
				</div>
			</div>
		</div>
    <section class="callaction">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="big-cta">
              <div class="cta-text">
                <h3 id="trends" class="heading">Eργαζόμενος:</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="row">
              <div class="span3">
                <div class="box aligncenter">
                  <div class="aligncenter icon">
                    <a href="ergazomenos_arxeio.php"><i class="icon-folder-open icon-circled icon-64 active"></i></a>
                  </div>
                  <div class="text">
                    <h6>Προσωπικό Αρχείο</h6>
                    <p>
                      Εδώ θα βρείτε όλες τις πληροφορίες για την τρέχουσα εργασιακή σας κατάσταση (ημέρες αναστολής, τηλεργασίας, άδειας).
                    </p>
                    <a href="ergazomenos_arxeio.php">Προσωπικό Αρχείο</a>
                  </div>
                </div>
              </div>
							<div class="span3">
                <div class="box aligncenter">
                  <div class="aligncenter icon">
                    <a href="ergazomenos_thlergasia.php"><i class="icon-desktop icon-circled icon-64 active"></i></a>
                  </div>
                  <div class="text">
                    <h6>Τηλεργασία</h6>
                    <p>
                      Προτεραιότητα όλων μας είναι η υγεία. Εργαζόμαστε απ' το σπίτι, αξιοποιώντας τις δυνατότητες της τεχνολογίας.
                    </p>
                    <a href="ergazomenos_thlergasia.php">Τηλεργασία</a>
                  </div>
                </div>
              </div>
              <div class="span3">
                <div class="box aligncenter">
                  <div class="aligncenter icon">
                    <a href="ergazomenos_metra.php"><i class="icon-medkit icon-circled icon-64 active"></i></a>
                  </div>
                  <div class="text">
                    <h6>Μέτρα Πρόληψης</h6>
                    <p>
                      Τα απαραίτητα μέτρα πρόληψης που θα πρέπει να τηρούμε για να είμαστε ασφαλείς στον χώρο εργασίας.
                    </p>
                    <a href="ergazomenos_metra.php">Μέτρα Πρόληψης</a>
                  </div>
                </div>
              </div>
              <div class="span3">
                <div class="box aligncenter">
                  <div class="aligncenter icon">
                    <a href="ergazomenos_adeiaEidikouSkopou.php"><i class="icon-group icon-circled icon-64 active"></i></a>
                  </div>
                  <div class="text">
                    <h6>Άδεια Ειδικού Σκοπού</h6>
                    <p>
                      Για εμάς τους γονείς που θα μείνουμε σπίτι για την φροντίδα των παιδιών όσο τα σχολεία είναι κλειστά.
                    </p>
                    <a href="ergazomenos_adeiaEidikouSkopou.php">Άδεια Ειδικού Σκοπού</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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
          <div class="span12">
            <div class="big-cta">
              <div class="cta-text">
                <h3>Eργοδότης:</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
		<section id="content">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="row">
              <div class="span3">
                <div class="box aligncenter">
                  <div class="aligncenter icon">
                    <a href="ergodoths_arxeio.php"><i class="icon-folder-open icon-circled icon-64 active"></i></a>
                  </div>
                  <div class="text">
                    <h6>Αρχείο Επιχείρησης</h6>
                    <p>
                      Από εδώ μπορείτε να διαχειρίζεστε το προσωπικό της επιχείρησης σας (πρόσληψη, απόλυση, αναστολή, τηλεργασία, επισκόπηση αδειών).
                    </p>
                    <a href="ergodoths_arxeio.php">Αρχείο Επιχείρησης</a>
                  </div>
                </div>
              </div>
							<div class="span3">
                <div class="box aligncenter">
                  <div class="aligncenter icon">
                    <a href="ergodoths_thlergasia.php"><i class="icon-desktop icon-circled icon-64 active"></i></a>
                  </div>
                  <div class="text">
                    <h6>Τηλεργασία</h6>
                    <p>
                      Ως εργοδότες διασφαλίζουμε το καλό της επιχείρησης προστατεύοντας την υγεία των εργαζομένων.
                    </p>
                    <a href="ergodoths_thlergasia.php">Τηλεργασία</a>
                  </div>
                </div>
              </div>
              <div class="span3">
                <div class="box aligncenter">
                  <div class="aligncenter icon">
                    <a href="ergodoths_metra.php"><i class="icon-medkit icon-circled icon-64 active"></i></a>
                  </div>
                  <div class="text">
                    <h6>Μέτρα Πρόληψης</h6>
                    <p>
                      Τα απαραίτητα μέτρα πρόληψης που φροντίζουμε να τηρούνται για να είναι η επιχείρηση μας ένα ασφαλές περιβάλλον.
                    </p>
                    <a href="ergodoths_metra.php">Μέτρα Πρόληψης</a>
                  </div>
                </div>
              </div>
              <div class="span3">
                <div class="box aligncenter">
                  <div class="aligncenter icon">
                    <a href="ergodoths_sumptwmata.php"><i class="icon-ambulance icon-circled icon-64 active"></i></a>
                  </div>
                  <div class="text">
                    <h6>Υπάλληλος με Συμπτώματα</h6>
                    <p>
                      Σε στιγμές κρίσης φαίνεται ο ικανός ηγέτης. Εξοπλίζουμε τον εαυτό μας με γνώση για την σωστή διαχείριση τους.
                    </p>
                    <a href="ergodoths_sumptwmata.php">Οδηγίες</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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
          <div class="span12">
            <div class="big-cta">
              <div class="cta-text">
                <h3>Εξυπηρέτηση Πολιτών:</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
		<section id="content">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="row">
              <div class="span6">
                <div class="box aligncenter">
                  <div class="aligncenter icon">
                    <a href="eksuphrethsh_hlektronika.php"><i class="icon-desktop icon-circled icon-64 active"></i></a>
                  </div>
                  <div class="text">
                    <h6>Ηλεκτρονική Εξυπηρέτηση</h6>
                    <p>
                      Αποφεύγουμε το συνωστισμό, δεν διακινδυνεύουμε να εκτεθούμε στον ιό. Εξυπηρετούμαστε ηλεκτρονικά από την άνεση και ασφάλεια του σπιτιού μας.
                    </p>
                    <a href="eksuphrethsh_hlektronika.php">Ηλεκτρονική Εξυπηρέτηση</a>
                  </div>
                </div>
              </div>
							<div class="span6">
                <div class="box aligncenter">
                  <div class="aligncenter icon">
                    <a href="eksuphrethsh_fusikhParousia.php"><i class="icon-briefcase icon-circled icon-64 active"></i></a>
                  </div>
                  <div class="text">
                    <h6>Εξυπηρέτηση με Φυσική Παρουσία</h6>
                    <p>
                      Όταν η ηλεκτρονική εξυπηρέτηση δεν είναι εφικτή, τότε προχωρούμε σε κλείσιμο ραντεβού για εξυπηρέτηση με φυσική παρουσία στον χώρο του Υπουργείου.
                    </p>
                    <a href="eksuphrethsh_fusikhParousia.php#rantevou">Ραντεβού</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- divider -->
        <div class="row">
          <div class="span12">
            <div class="solidline">
            </div>
          </div>
        </div>
        <!-- end divider -->
        <!-- Portfolio Projects -->
        <div class="row">
          <div class="span12">
            <h3 class="heading">Πρόσφατες <strong>δράσεις</strong></h4>
						<div class="row">
						</div>
            <div class="row">
              <section id="projects">
                <ul id="thumbs" class="portfolio">
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 design" data-id="id-0" data-type="web">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Click Away" href="img/works/full/image-01-full.jpg">
											<span class="overlay-img"></span>
											<span class="overlay-img-thumb font-icon-plus"></span>
										</a>
                    <!-- Thumb Image and Description -->
                    <img src="img/works/thumbs/image-01.jpg" alt="Η νέα μέθοδος αγορών click away επιβλήθηκε στις επιχειρήσεις λιανικού εμπορίου για να αποφευχθεί η διασπορά της πανδημίας κατά την διάρκεια της εορταστικής περιόδου των Χριστουγέννων. Πρόκειται για ένα νέο τρόπο ηλεκτρονικής παραγγελίας και παραλαβής που φαίνεται να έχει πολύ θετικά αποτελέσματα.">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 design" data-id="id-1" data-type="icon">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Διαδικτυακή Ημερίδα COVID19" href="img/works/full/image-02-full.jpg">
											<span class="overlay-img"></span>
											<span class="overlay-img-thumb font-icon-plus"></span>
										</a>
                    <!-- Thumb Image and Description -->
                    <img src="img/works/thumbs/image-02.jpg" alt="Οι κοινωνικές και οικονομικές επιπτώσεις της πανδημίας Covid-19 στην Ελλάδα και διεθνώς θα βρεθούν στο επίκεντρο διαδικτυακής της Ημερίδας που θα πραγματοποιηθεί το Σάββατο 12 Δεκεμβρίου 2020 και ώρες 10:00 έως 19:00. Η Ημερίδα διοργανώνεται από το Κέντρο Έρευνας και Εκπαίδευσης στη Δημόσια Υγεία, το Υπουργείο Εργασίας και Κοινωνικών Υποθέσεων, σε συνεργασία με Πρόγραμμα Μεταπτυχιακών Σπουδών του ΑΠΘ.">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 photography" data-id="id-2" data-type="illustrator">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Virtual Μαραθώνιος Αθήνας" href="img/works/full/image-03-full.jpg">
											<span class="overlay-img"></span>
											<span class="overlay-img-thumb font-icon-plus"></span>
										</a>
                    <!-- Thumb Image and Description -->
                    <img src="img/works/thumbs/image-03.jpg" alt="Μετά την ματαίωση του Μαραθωνίου Αθήνας για το 2020, με την συμβολή του ΣΕΓΑΣ καθώς και πολλών Υπουργείων, διοργανώθηκε ένα νέο virtual αθλητικό γεγονός. Οι συμμετέχοντες στον «Μαραθώνιο Αθήνας-Virtual Edition 2020» όπως ονομάστηκε, καλούνται να τρέξουν ο καθένας ξεχωριστά και με αίσθημα ευθύνης και απόλυτης τήρησης των υγειονομικών κανόνων την απόσταση της επιλογής τους καταγράφοντας την προσπάθεια τους.">
                  </li>
                  <!-- End Item Project -->
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 photography" data-id="id-2" data-type="illustrator">
                    <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                    <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="Πλατφόρμα Κοινωνικής Ένταξης των Ρομά" href="img/works/full/image-04-full.jpg">
											<span class="overlay-img"></span>
											<span class="overlay-img-thumb font-icon-plus"></span>
										</a>
                    <!-- Thumb Image and Description -->
                    <img src="img/works/thumbs/image-04.jpg" alt="Δημιουργήθηκε πλατφόρμα ενημέρωσης και διαβούλευσης για θέματα Ρομά, της Γενικής Γραμματείας Κοινωνικής Αλληλεγγύης και Καταπολέμησης της Φτώχειας, του Υπουργείου Εργασίας και Κοινωνικών Υποθέσεων με σκοπό την άρση των όρων του κοινωνικού αποκλεισμού και τη δημιουργία των προϋποθέσεων για την υπέρβαση των εμποδίων προς τη σταδιακή πορεία της πλήρους κοινωνικής ένταξης. ">
                  </li>
                  <!-- End Item Project -->
                </ul>
              </section>
            </div>
          </div>
        </div>
        <!-- End Portfolio Projects -->
        <!-- divider -->
        <div class="row">
          <div class="span12">
            <div class="solidline">
            </div>
          </div>
        </div>
        <!-- end divider -->
				<div class="row">
          <div class="span12">
            <h3>Συνεργαζόμενοι <strong>φορείς</strong></h4>
						<div class="row">
						</div>
            <ul id="mycarousel" class="jcarousel-skin-tango recent-jcarousel clients">
              <li>
                <a href="https://ypen.gov.gr/" target="_blank" title="Υπουργείο Περιβάλλοντος και Ενέργειας">
									<img src="img/dummies/clients/client1.png" class="client-logo" alt="Υπουργείο Περιβάλλοντος και Ενέργειας" />
								</a>
              </li>
              <li>
                <a href="https://www.efka.gov.gr/el" target="_blank" title="Εθνικός Φορέας Κοινωνικής Ασφάλισης">
									<img src="img/dummies/clients/client2.png" class="client-logo" alt="Εθνικός Φορέας Κοινωνικής Ασφάλισης" />
								</a>
              </li>
              <li>
                <a href="https://eservices.yeka.gr/(S(odncqh1v21d2ol4cdukjdpea))/login.aspx?ReturnUrl=%2f" target="_blank" title="Πληροφριακό Σύστημα Εξυπηρέτησης Επιχειρήσεων ΕΡΓΑΝΗ">
									<img src="img/dummies/clients/client3.png" class="client-logo" alt="Πληροφριακό Σύστημα Εξυπηρέτησης Επιχειρήσεων ΕΡΓΑΝΗ" />
								</a>
              </li>
              <li>
                <a href="https://www.ilo.org/global/topics/safety-and-health-at-work/events-training/events-meetings/world-day-safety-health-at-work/lang--en/index.htm" target="_blank" title="Παγκόσμια Ημέρα Ασφάλειας και Υγείας στην Εργασία">
									<img src="img/dummies/clients/client4.png" class="client-logo" alt="Παγκόσμια Ημέρα Ασφάλειας και Υγείας στην Εργασία" />
								</a>
              </li>
              <li>
                <a href="https://keaprogram.gr/" target="_blank" title="Κοινωνικό Εισόδημα Αλληλεγγύης">
									<img src="img/dummies/clients/client5.png" class="client-logo" alt="Κοινωνικό Εισόδημα Αλληλεγγύης" />
								</a>
              </li>
              <li>
                <a href="http://www.idika.gr/eseps-mhniaies-ek8eseis" target="_blank" title="Εννιαίο Σύστημα Ελέγχου Πληρωμής Συντάξεων ΗΛΙΟΣ">
									<img src="img/dummies/clients/client6.png" class="client-logo" alt="Εννιαίο Σύστημα Ελέγχου Πληρωμής Συντάξεων ΗΛΙΟΣ" />
								</a>
              </li>
              <li>
                <a href="http://teba.eiead.gr/" target="_blank" title="Επιχειρησιακό Πρόγραμμμα Επισιτιστικής και Βασικής Υλικής Συνδρομής">
									<img src="img/dummies/clients/client7.png" class="client-logo" alt="Επιχειρησιακό Πρόγραμμμα Επισιτιστικής και Βασικής Υλικής Συνδρομής" />
								</a>
              </li>
              <li>
                <a href="https://foreis-kalo.gr/" target="_blank" title="Πλατφόρμα Δικτύωσης Κοινωνικών Συνεταιριστικών Επιχειρήσεων">
									<img src="img/dummies/clients/client8.png" class="client-logo" alt="Πλατφόρμα Δικτύωσης Κοινωνικών Συνεταιριστικών Επιχειρήσεων" />
								</a>
              </li>
              <li>
                <a href="https://kalo.yeka.gr/(S(awjpwuw03hefx02zf4dk1mm1))/login.aspx?ReturnUrl=%2f" target="_blank" title="Γενικό Μητρώο Φορέων Κοινωνικής και Αλληλέγγυας Οικονομίας">
									<img src="img/dummies/clients/client9.png" class="client-logo" alt="Γενικό Μητρώο Φορέων Κοινωνικής και Αλληλέγγυας Οικονομίας" />
								</a>
              </li>
              <li>
                <a href="https://kalo.gov.gr/" target="_blank" title="Μητρώο Κοινωνικής Οικονομίας">
									<img src="img/dummies/clients/client10.png" class="client-logo" alt="Μητρώο Κοινωνικής Οικονομίας" />
								</a>
              </li>
              <li>
                <a href="https://kentrakoinotitas.gr/" target="_blank" title="Εθνικός Μηχανισμός Κέντρο Κοινότητας">
									<img src="img/dummies/clients/client11.png" class="client-logo" alt="Εθνικός Μηχανισμός Κέντρο Κοινότητας" />
								</a>
              </li>
              <li>
                <a href="http://www.mlsi.gov.cy/mlsi/dl/dl.nsf/page1k_gr/page1k_gr?OpenDocument" target="_blank" title="Απόσπαση Εργαζομένων">
									<img src="img/dummies/clients/client12.png" class="client-logo" alt="Απόσπαση Εργαζομένων" />
								</a>
              </li>
							<li>
                <a href="http://www.mlsi.gov.cy/mlsi/dlr/dlr.nsf/faq_gr/faq_gr?OpenDocument" target="_blank" title="Κατώτατος Μισθός">
									<img src="img/dummies/clients/client13.png" class="client-logo" alt="Κατώτατος Μισθός" />
								</a>
              </li>
							<li>
                <a href="https://ec.europa.eu/social/main.jsp?catId=326&langId=el" target="_blank" title="Ευρωπαϊκό Ταμείο Προσαρμογής στην Παγκοσμιοποίηση">
									<img src="img/dummies/clients/client14.png" class="client-logo" alt="Ευρωπαϊκό Ταμείο Προσαρμογής στην Παγκοσμιοποίηση" />
								</a>
              </li>
							<li>
                <a href="http://195.167.92.192:8880/" target="_blank" title="Κατάλογος Επιλεκτικής Δομής ΕΣΠΑ">
									<img src="img/dummies/clients/client15.png" class="client-logo" alt="Κατάλογος Επιλεκτικής Δομής ΕΣΠΑ" />
								</a>
              </li>
							<li>
                <a href="https://www.ivisa.com/visa-blog/history-of-koinoniasos.gr-domain" target="_blank" title="Εθνικό Δίκτυο Άμεσης Κοινωνικής Παρέμβασης">
									<img src="img/dummies/clients/client16.png" class="client-logo" alt="Εθνικό Δίκτυο Άμεσης Κοινωνικής Παρέμβασης" />
								</a>
              </li>
							<li>
                <a href="https://www.voucher.gov.gr/" target="_blank" title="Επιταγή Επαγγελματικής Κατάρτισης">
									<img src="img/dummies/clients/client17.png" class="client-logo" alt="Επιταγή Επαγγελματικής Κατάρτισης" />
								</a>
              </li>
							<li>
                <a href="https://ec.europa.eu/social/main.jsp?catId=1246&langId=en" target="_blank" title="Ευρωπαϊκή Πλατφόρμα για την Επένδυση στα Παιδιά">
									<img src="img/dummies/clients/client18.png" class="client-logo" alt="Ευρωπαϊκή Πλατφόρμα για την Επένδυση στα Παιδιά" />
								</a>
              </li>
							<li>
                <a href="https://government.gov.gr/eidos/infogov/" target="_blank" title="Ενημερωτική Εφαρμογή για Κινητά Infogov">
									<img src="img/dummies/clients/client19.png" class="client-logo" alt="Ενημερωτική Εφαρμογή για Κινητά Infogov" />
								</a>
              </li>
							<li>
                <a href="https://ec.europa.eu/social/main.jsp?catId=1082&langId=el" target="_blank" title="Κοινοτικό Πρόγραμμα PROGRESS">
									<img src="img/dummies/clients/client20.png" class="client-logo" alt="Κοινοτικό Πρόγραμμα PROGRESS" />
								</a>
              </li>
							<li>
                <a href="https://opeka.gr/oikogeneies/" target="_blank" title="Οργανισμός Προνοιακών Επιδομάτων και Κοινωνικής Αλληλεγγύης">
									<img src="img/dummies/clients/client21.png" class="client-logo" alt="Οργανισμός Προνοιακών Επιδομάτων και Κοινωνικής Αλληλεγγύης" />
								</a>
              </li>
							<li>
                <a href="https://www.eeagrants.gr/" target="_blank" title="Χρηματοδοτικός Μηχανισμός Ευρωπαϊκού Οικονομικού Χώρου">
									<img src="img/dummies/clients/client22.png" class="client-logo" alt="Χρηματοδοτικός Μηχανισμός Ευρωπαϊκού Οικονομικού Χώρου" />
								</a>
              </li>
							<li>
                <a href="http://www.ekka.org.gr/" target="_blank" title="Εθνικό Κέντρο Κοινωνικής Αλληλεγγύης">
									<img src="img/dummies/clients/client23.png" class="client-logo" alt="Εθνικό Κέντρο Κοινωνικής Αλληλεγγύης" />
								</a>
              </li>
							<li>
                <a href="https://osha.europa.eu/el/healthy-workplaces-campaigns" target="_blank" title="Ευρωπαϊκή Εκστρατεία Ασφαλείς και Υγιείς Χώροι Εργασίας">
									<img src="img/dummies/clients/client24.png" class="client-logo" alt="Ευρωπαϊκή Εκστρατεία Ασφαλείς και Υγιείς Χώροι Εργασίας" />
								</a>
              </li>
							<li>
                <a href="https://www.irida.gov.gr/" target="_blank" title="Κεντρική Υπηρεσία Ενημέρωσης ΙΡΙΔΑ">
									<img src="img/dummies/clients/client25.png" class="client-logo" alt="Κεντρική Υπηρεσία Ενημέρωσης ΙΡΙΔΑ" />
								</a>
              </li>
							<li>
                <a href="https://osha.europa.eu/el/themes/covid-19-resources-workplace" target="_blank" title="Ασφαλείς και Υγιείς Χώροι Εργασίας - Αντιμετώπιση της Πανδημίας">
									<img src="img/dummies/clients/client26.png" class="client-logo" alt="Ασφαλείς και Υγιείς Χώροι Εργασίας - Αντιμετώπιση της Πανδημίας" />
								</a>
              </li>
							<li>
                <a href="http://www.idika.org.gr/estia/" target="_blank" title="Ενιαία Ηλεκτρονική Βάση Ακίνητης Περιουσίας ΕΣΤΙΑ">
									<img src="img/dummies/clients/client27.png" class="client-logo" alt="Ενιαία Ηλεκτρονική Βάση Ακίνητης Περιουσίας ΕΣΤΙΑ" />
								</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
		<div class="row">
		</div>
		<div class="row">
		</div>
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

  <!-- Template Custom JavaScript File -->
  <script src="js/custom.js"></script>

</body>
</html>