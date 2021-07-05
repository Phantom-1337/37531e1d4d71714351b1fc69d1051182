<?php
include 'app/require.php';

$user = new UserController;

Session::init();

if (Session::isLogged()) { Util::redirect('/'); }
if ($_SERVER['REQUEST_METHOD'] === 'POST') { $error = $user->registerUser($_POST); }

Util::head('Register');

?>



<main class="container">

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


	<div class="row justify-content-center">

		<div class="col-12 mt-3 mb-2">

		</div>

		<div class="col-xl-3 col-lg-4 col-md-5 col-sm-7 col-xs-12 my-3">
			<div class="card" style="height: 393px; background-color: #171C25 !important; color: white; margin-top: 250px; border-radius: 24px">
				<div class="card-body">

					<h4 class="card-title text-center">Register</h4>

					<form method="POST" class="input_email" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

						<div class="form-group">
							<input type="text" style="background-color: #11151D !important;" class="" placeholder="Username" name="username" minlength="3" required>
						</div>

						<div class="form-group">
							<input type="password" style="background-color: #11151D !important;" class="" placeholder="Password" name="password" minlength="4" required>
						</div>

						<div class="form-group">
							<input type="password" style="background-color: #11151D !important;" class="" placeholder="Confirm password" name="confirmPassword" minlength="4" required>
						</div>

						<div class="form-group">
							<input type="text" style="background-color: #11151D !important;" class="" placeholder="invite Code" name="invCode" required>
						</div>

						<button class="btn__login" id="submit" type="submit" value="submit" style="margin-left: 45px;">Register</button>

					</form>

				</div>
			</div>
		</div>

	</div>

</main>

<script src="<?php SITE_ROOT ?>/assets/js/matchPass.js"></script>
<?php Util::footer(); ?>