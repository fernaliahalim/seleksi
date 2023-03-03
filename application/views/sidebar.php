<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

		<div class="preloader flex-column justify-content-center align-items-center">
			<!-- <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60"> -->
		</div>

		<nav class="main-header navbar navbar-expand navbar-white navbar-light">

			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>

			</ul>

			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" data-widget="fullscreen" href="#" role="button">
						<i class="fas fa-expand-arrows-alt"></i>
					</a>
				</li>
			</ul>
		</nav>

		<aside class="main-sidebar sidebar-dark-primary elevation-4">

			<a href="<?= base_url(); ?>dashboard" class="brand-link">
				<img src="<?= base_url(); ?>assets/images/logo_sdm_beranda.png" alt="SDM Polri Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light">Subbag<b>Selek</b></span>
			</a>

			<div class="sidebar">

				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="<?= base_url(); ?>assets/images/avatar5.png" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="#" class="d-block"><?= $this->session->userdata('maindata_nama'); ?></a>
					</div>
				</div>

				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<li class="nav-item">
							<a href="<?= base_url(); ?>dashboard" class="nav-link <?= $this->session->userdata('mainsetting_active_menu') == "dashboard" ? 'active' : ''; ?>">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url(); ?>fungsi_dikbangspes" class="nav-link <?= $this->session->userdata('mainsetting_active_menu') == "fungsi_dikbangspes" ? 'active' : ''; ?>">
								<i class="nav-icon fas fa-folder"></i>
								<p>
									Fungsi Dikbangspes
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url(); ?>jenis_dikbangspes" class="nav-link <?= $this->session->userdata('mainsetting_active_menu') == "jenis_dikbangspes" ? 'active' : ''; ?>">
								<i class="nav-icon fas fa-folder"></i>
								<p>
									Jenis Dikbangspes
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url(); ?>dikbangspes" class="nav-link <?= $this->session->userdata('mainsetting_active_menu') == "list_dikbangspes" ? 'active' : ''; ?>">
								<i class="nav-icon fas fa-list"></i>
								<p>
									List Dikbangspes
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url(); ?>home/sign_out" class="nav-link">
								<i class="nav-icon fas fa-cog"></i>
								<p>
									Logout
								</p>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</aside>