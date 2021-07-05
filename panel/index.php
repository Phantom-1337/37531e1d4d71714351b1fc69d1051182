<?php
require_once 'app/require.php';
require_once 'app/controllers/CheatController.php';


$user = new UserController;
$err = '';
$cheat = new CheatController;

Session::init();

if (!Session::isLogged()) { Util::redirect('/login.php'); }

$uid = Session::get("uid");
$username = Session::get("username");

$sub = $user->getSubStatus();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	if (isset($_POST["updatePassword"])) {
		$error = $user->updateUserPass($_POST);
	}


	if (isset($_POST["activateSub"])) {
		$error = $user->activateSub($_POST);
	}
}

Util::banCheck();
Util::head($username);

if (isset($_GET['submit_msg']))
{
	echo "<p align=center>";
	echo $_GET['submit_msg'];
	echo "</p>";
}

if (count($_POST))
{
	// validation check
	// if something went wrong
	if ($not_everything_good)
	{
		$err = 'Error in so so';
	}
	if ( $err == '') // no error
	{
		// Database/table insert or update
		// if everything went correctly
		$msg = 'Insert/update successful.';
		header ("Location: index.php");
		exit;
	}
}

?>

<main class="container mt-2">
<!DOCTYPE html>
<html lang="en" style="background: transparent;font-family: Comfortaa;color: rgb(255,255,255);">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa">
    <link rel="stylesheet" href="assets/css/styles.min.css?h=5e50727777cdbfe014eee17e6de604d3">
	<link rel="stylesheet" href="https://icarian-set.000webhostapp.com/main.css">
	<link rel="stylesheet" href="https://icarian-set.000webhostapp.com/fonts.css">
</head>

<style>
	body {
		overflow: hidden;
	}
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
jQuery(document).ready(function(){
jQuery(this).scrollTop(0);
});
</script>

    <style>
      input::-ms-reveal,
      input::-ms-clear {
        display: none;
      }
    </style>
	
<body style="background: #11151D;font-family: Comfortaa;color: rgb(255,255,255);margin-top: 131px;">
    <div class="col fadeIn500ms" >
        <!-- Start: Features Boxed -->
        <section class="features-boxed" style="color: white;background: #171C25;border-radius: 24px;">
            <div class="container ">
                <!-- Start: Intro -->
				

                <div class="intro">
				
					<?php if($username == "admin") : ?>
						<a style="color: transparent; margin-left: 200px;" href="admin/sub.php/">ADMIN PANEL ADMIN PANEL</a>
					<?php endif; ?>
					
                    <h2 class="text-center">Profile</h2>
                    <p class="text-center">Here you can download the loader, see your subscription status etc.</p>
                </div><!-- End: Intro -->
                <!-- Start: Features -->
                <div class="row justify-content-center features">
                    <div class="col-sm-6 col-md-5 col-lg-4 item">
					<?php if($sub >= 1) : ?>
							<div class="box" style="background: #11151D;border-radius: 24px;">
                            <h3 class="name">Download Loader</h3><div style="background: linear-gradient(90deg,#37b1d3,#cc46cd 48.44%,#cce335); height: 1px; margin-top: 20px;"></div>
                            <p class="description"><br><strong>Download the loader by pressing the button below.</strong><br><br></p><a href="download.php"><button class="btn__login" type="button">Download</button></a>
							
                        </div>
					<?php endif; ?>
						<div class="box" style="background: #11151D;border-radius: 24px;">
                            <h3 class="name">Subscription Info</h3><div style="background: linear-gradient(90deg,#37b1d3,#cc46cd 48.44%,#cce335); height: 1px; margin-top: 20px;"></div>
                            <p class="description"><strong>Status:
							<?php
								if ($sub >= 1) {
									util::display($sub . " days");
								}
								else {
									util::display("expired");
								}
							?>
							
							
							<?php if ($sub <= 0) : ?>
							
							<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
								<div class="input_email">
									<input name="subCode" style="text-align: center" type="password"></input>
								</div>
								<br>
								<button name="activateSub" class="btn__login">Activate</button>
							</form
							<?php endif; ?>
							</strong></p>
                        </div>
                    </div>
                </div><!-- End: Features -->
            </div>
        </section><!-- End: Features Boxed -->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
</main>
