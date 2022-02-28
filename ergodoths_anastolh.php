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
										<form method="post" action="ergodoths_anastolh.php">
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
                <form class="form-horizontal" method="post" action="ergodoths_anastolh.php">
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
                <form class="form-horizontal" method="post" action="ergodoths_anastolh.php">
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
                <form class="form-horizontal" method="post" action="ergodoths_anastolh.php">
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
                            <li><a href="ergodoths_metra.php">ΜΕΤΡΑ ΠΡΟΛΗΨΗΣ</a></li>
                            <li><a href="ergodoths_sumptwmata.php">ΕΡΓΑΖΟΜΕΝΟΣ ΜΕ ΣΥΜΠΤΩΜΑΤΑ</a></li>
														<li><a href="ergodoths_thlergasia.php">ΤΗΛΕΡΓΑΣΙΑ</a></li>
														<li class="active"><a href="ergodoths_anastolh.php">ΑΝΑΣΤΟΛΗ ΣΥΜΒΑΣΗΣ ΕΡΓΑΣΙΑΣ</a></li>
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
								<li class="active">Αναστολή Σύμβασης Εργασίας</li>
							</ul>
						</div>
          </div>
					<div class="span12" style="float: left; text-align: center">
						<div class="inner-heading">
							<h2>Αναστολή Σύμβασης Εργασίας</h2>
						</div>
					</div>
        </div>
      </div>
    </section>
		<section class="content" id="dhlwsh">
			<div class="row">
				<div class="span3">
					<div class="text-center">
						<br><br><br><br><br><br><br>
						<a class="btn btn-large btn-theme btn-rounded" href="#anastolh" data-toggle="modal">ΔΗΛΩΣΗ ΑΝΑΣΤΟΛΗΣ</a>
						<div id="anastolh" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="mycompcreationLabel" aria-hidden="true">
							<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4><strong>Αναστολή</strong> Σύμβασης Εργαζομένου</h4>
							</div>
							<div class="modal-body">
							<form class="form-horizontal" method="post" action="ergodoths_anastolh.php#dhlwsh">
								<div class="control-group">
								<label class="control-label" for="owamka">AMKA Εργοδότη</label>
								<div class="controls">
								<input type="text" name="owamka" class="form-control" id="owamka" placeholder="πχ. 25018202618" pattern="[0-9]{11}" title="Εισάγετε τα 11 ψηφία του ΑΜΚΑ σας" required />
								</div>
								</div>
								<div class="control-group">
								<label class="control-label" for="NAME">Όνομα Επιχείρησης</label>
								<div class="controls">
								<input type="text" id="NAME" name="name" class="form-control" placeholder="πχ. Coca-Cola" required />
								</div>
								</div>
								<div class="control-group">
								<label class="control-label" for="amka">AMKA Εργαζομένου</label>
								<div class="controls">
								<input type="text" name="amka" class="form-control" id="amka" placeholder="πχ. 13059718529" pattern="[0-9]{11}" title="Εισάγετε τα 11 ψηφία του ΑΜΚΑ του εργαζόμενου" required />
								</div>
								</div>
								<div class="control-group">
								<label class="control-label" for="sdate">Έναρξη</label>
								<div class="controls">
								<input type="date" id="sdate" name="st" class="form-control" required />
								</div>
								</div>
								<div class="control-group">
								<label class="control-label" for="fdate">Λήξη</label>
								<div class="controls">
								<input type="date" id="fdate" name="fn" class="form-control" required />
								</div>
								</div>
								<div class="control-group">
								<div class="controls">
								</div>
								</div>
								<button type="submit" name="action_type" value="enter_an" class="btn">ΥΠΟΒΟΛΗ</button>
							</form>
							</div>
						</div>
						<br><br><br>
						<div class="solidline">
						</div>
						<br>
						<a class="btn btn-large btn-dark btn-rounded" href="#an" data-toggle="modal">ΑΡΣΗ ΑΝΑΣΤΟΛΗΣ</a>
						<?php
							include 'php/modals_unsigned.php';

							if(isset($_POST['action_type'])){

								if($_POST['action_type'] == 'enter_an'){
									$usramka = $_POST['amka'];
									$ucompname = $_POST['name'];
									$usdate = $_POST['st'];
									$ufdate = $_POST['fn'];
									if(isset($_POST['owamka'])){
										$usroamka = $_POST['owamka'];
										enter_an_uns($usroamka,$ucompname,$usramka,$usdate,$ufdate);
									}
								}

								if($_POST['action_type'] == 'arsh_an'){
									$usramka = $_POST['amka'];
									$ucompname = $_POST['name'];
									if(isset($_POST['owamka'])){
										$usroamka = $_POST['owamka'];
										arsh_anastolhs_uns($usroamka,$ucompname,$usramka);
									}
								}

							}
						?>
						<div id="an" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="mycompcreationLabel" aria-hidden="true">
							<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4><strong>Άρση Αναστολής</strong> Σύμβασης</h4>
							</div>
							<div class="modal-body">
							<form class="form-horizontal" method="post" action="ergodoths_anastolh.php#dhlwsh">
								<div class="control-group">
								<label class="control-label" for="owamka">AMKA Εργοδότη</label>
								<div class="controls">
								<input type="text" name="owamka" class="form-control" id="owamka" placeholder="πχ. 25018202618" pattern="[0-9]{11}" title="Εισάγετε τα 11 ψηφία του ΑΜΚΑ σας" required />
								</div>
								</div>
								<div class="control-group">
								<label class="control-label" for="NAME">Όνομα Επιχείρησης</label>
								<div class="controls">
								<input type="text" id="NAME" name="name" class="form-control" placeholder="πχ. Coca-Cola" required />
								</div>
								</div>
								<div class="control-group">
								<label class="control-label" for="amka">AMKA Εργαζομένου</label>
								<div class="controls">
								<input type="text" name="amka" class="form-control" id="amka" placeholder="πχ. 13059718529" pattern="[0-9]{11}" title="Εισάγετε τα 11 ψηφία του ΑΜΚΑ του εργαζόμενου" required />
								</div>
								</div>
								<button type="submit" name="action_type" value="arsh_an" class="btn">ΥΠΟΒΟΛΗ</button>
							</form>
							</div>
						</div>
					</div>
				</div>
				<div class="span9">
					<img width="80%" height="40%" src="img/symptoms/anastolh.jpg" title="Αναστολή σύμβασης εργασίας" alt="Εικόνα εργοδότη που αναστέλει την σύμβαση εργασίας.">
				</div>
			</div>
		</section>
		<section class="callaction">
      <div class="container">
				<div class="row">
          <div class="span12">
            <div class="big-cta">
              <div class="cta-text">
								<span class="pullquote-left">
									<h6>Η αναστολή σύμβασης εργασίας είναι ένα <strong>μέτρο</strong> που θα πρέπει χρησιμοποιείται <strong>συνετά</strong> και μόνο όταν δεν υπάρχει εναλλακτική λύση.
									Ο εργαζόμενος <strong>διακόπτει προσωρινά</strong> την εργασία του στην εκάστοτε επιχείρηση, λόγω κάποιας <strong>δύσκολης συγκυρίας</strong>.
									Οι όροι της τρέχουσας σύμβασης εργασίας τίθενται σε <strong>παύση</strong> για το διάστημα που η αναστολή είναι σε ισχύ.</h6>
								</span>
							</div>
            </div>
          </div>
        </div>
      </div>
    </section>
		<div class="text-center">
			<img width="100%" height="30%" src="img/symptoms/anastolh2.png" title="Εξετάζουμε όλες τις εναλλακτικές" alt="Εικόνα εργοδότη που εξετάζει όλες τις πιθανές εναλλακτικές.">
		</div>
		<section class="callaction">
      <div class="container">
				<div class="row">
          <div class="span12">
            <div class="big-cta">
              <div class="cta-text">
								<span class="pullquote-left margintop10">
									<h6>Εν μέσω της πανδημίας του <strong>κορωνοϊού</strong>, οι αιτήσεις για αναστολή φαίνεται όλο ένα και αυξάνονται.
									Το γεγονός αυτό οφείλεται κυρίως στην αδυναμία πολλών επιχειρήσεων να διατηρήσουν το ίδιο πλήθος προσωπικού έχοντας σαφώς <strong>λιγότερους πελάτες</strong>.
									Πολλοί όμως είναι και οι εργαζόμενοι που ανήκουν σε <strong>ευπαθείς ομάδες</strong> και δεν είναι διατιθεμένοι να ρισκάρουν την υγεία τους στον χώρο εργασίας.</h6>
								</span>
								<span class="pullquote-right">
									<h6>Ωστόσο, η τελική απόφαση είναι πάντα στα χέρια του <strong>εργοδότη</strong> και η <strong>ευθύνη</strong> είναι μεγάλη.
									Καταλαβαίνουμε λοιπόν πως η αναστολή σύμβασης εργασίας μπορεί να φανεί ένα πολύ χρήσιμο <strong>εργαλείο</strong>, αλλά δεν θα πρέπει να γίνεται κατάχρηση της.</h6>
								</span>
							</div>
            </div>
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

  <!-- Template Custom JavaScript File -->
  <script src="js/custom.js"></script>

</body>
</html>