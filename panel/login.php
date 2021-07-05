<?php
include 'app/require.php';

$user = new UserController;
$err = '';

Session::init();

if (Session::isLogged()) { Util::redirect('/'); }
if ($_SERVER['REQUEST_METHOD'] === 'POST') { $error = $user->loginUser($_POST); }

Util::head('Login');

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa">
    <link rel="stylesheet" href="assets/css/styles.min.css?h=5e50727777cdbfe014eee17e6de604d3">
	<link rel="stylesheet" href="https://icarian-set.000webhostapp.com/main.css">
	<link rel="stylesheet" href="https://icarian-set.000webhostapp.com/fonts.css">
	<div class="row justify-content-center">

		<div class="col-12 mt-3 mb-2">



		</div>
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
<style>
	div {
		overflow: hidden;
	}
	body {
		overflow: hidden;
	}
</style>
		<div class="col-xl-3 col-lg-4 col-md-5 col-sm-7 col-xs-12 my-3">
			<div class="card" style="border: none; margin-top: 270px; border-radius: 24px;">
				<div class="card-body" style="background-color: #171C25; border-radius: 24px;">

					<h4 class="card-title text-center" style="color: white;">Login</h4>

					<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

						<div class="form-group input_email">
							<input type="text" style="background: #11151D !important" class="" placeholder="Username" name="username" required>
						</div>

						<div class="form-group input_email">
							<input type="password" class="" style="background: #11151D !important" placeholder="Password" name="password" required>
						</div>
						<button class="btn__login" style="margin-left: 50px;" id="submit" type="submit" value="submit">Login</button>
					</form>	
				</div>
			</div>
		</div>

	</div>

</main>

<?php Util::footer(); ?>