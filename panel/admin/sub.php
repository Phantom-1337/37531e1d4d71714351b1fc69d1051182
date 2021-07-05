<?php

require_once '../app/require.php';
require_once '../app/controllers/AdminController.php';

$user = new UserController;
$admin = new AdminController;

Session::init();

$username = Session::get("username");

$subList = $admin->getSubCodeArray();

Util::adminCheck();
Util::head('Admin Panel');

// if post request 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


	if (isset($_POST["genSub"])) {
		$admin->getSubCodeGen($username); 
	}

	header("location: sub.php");

}
?>

<div class="container" style="margin-top: 255px; border: none;">
<link rel="stylesheet" href="https://icarian-set.000webhostapp.com/main.css">
	<div class="row">
<style>
</style>
		<div class="col-12 mt-3 fadeIn500ms" style="background-color: #171C25 !important; border-radius: 24px;">
			<div class=" p-3 mb-3" style="border-top: solid 0px; margin-top: 15px; background-color: transparent !important; border-radius: 24px;">

				<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
								
					<button name="genSub" type="submit" class="btn__login" style="width: 350px; margin-left: 361px; border-radius: 24px;">
						Generate Subscription code
					</button>

				</form>

			<table class="rounded table mt-4" style="border-color: transparent; background-color: #11151D !important; border-radius: 24px;">
				<tbody>

					<?php foreach ($subList as $row) : ?>
						<tr>
							<td style="text-align: left; border: none;"><?php Util::display($row->code); ?></td>
						</tr>
					<?php endforeach; ?>

				</tbody>

			</table>

		</div>
	</div>

</div>

<?php Util::footer(); ?>