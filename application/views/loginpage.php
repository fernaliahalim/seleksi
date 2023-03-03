<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SubbagSelek BagDalpers - Polda Sumsel</title>

	<link rel="shortcut icon" href="<?= base_url(); ?>assets/images/logo_sdm_beranda.png" type="image/x-icon" />

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

	<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">

	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/adminlte.min.css?v=3.2.0">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="<?= base_url(); ?>">Subbag<b>Selek</b></a>
		</div>

		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Silahkan Login terlebih dahulu</p>
				<form action="<?= base_url(); ?>home/auth" method="post">
					<?php $has_error = !empty($this->session->flashdata('error_username')) ? $this->session->flashdata('error_username') : ''; ?>

					<div class="input-group mb-3">
						<?php $username = !empty($username) ? $username : ''; ?>
						<input type="text" class="form-control <?= !empty($has_error) ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= $username; ?>" placeholder="Username" <?= !empty($has_error) ? 'aria-describedby="username-error" aria-invalid="true"' : ''; ?>>
						<div class="input-group-append">
							<div class="input-group-text">
								<i class="nav-icon fas fa-user"></i>
							</div>
						</div>
						<span id="username-error" class="error invalid-feedback"><?= $has_error; ?></span>
					</div>

					<?php $has_error = !empty($this->session->flashdata('error_password')) ? $this->session->flashdata('error_password') : ''; ?>

					<div class="input-group mb-3">
						<input type="password" class="form-control <?= !empty($has_error) ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Password" <?= !empty($has_error) ? 'aria-describedby="password-error" aria-invalid="true"' : ''; ?>>
						<div class="input-group-append">
							<div class="input-group-text">
								<i class="nav-icon fas fa-lock"></i>
							</div>
						</div>
						<span id="password-error" class="error invalid-feedback"><?= $has_error; ?></span>
					</div>

					<div class="row">
						<div class="col-8">

						</div>

						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block">Sign In</button>
						</div>

					</div>
				</form>
			</div>

		</div>
	</div>

	<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>

	<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

	<script src="<?= base_url(); ?>assets/js/adminlte.min.js?v=3.2.0"></script>

	<script>
		$(document).ready(function() {
			$('#username').focus();

			<?php if (!empty($this->session->flashdata('error_password'))) { ?>
				$('#password').focus();
			<?php } ?>
		});
	</script>
</body>

</html>