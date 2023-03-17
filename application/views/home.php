<div class="content-wrapper">

	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Dashboard</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url(); ?>home/sign_out">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div>
			</div>
		</div>
	</div>


	<section class="content">
		<div class="container-fluid">
			<h2 class="text-center display-4">Pencarian</h2>
			<div class="row">
				<div class="col-md-8 offset-md-2">
					<form action="<?= base_url(); ?>dashboard" method="get">
						<div class="input-group">
							<input type="search" class="form-control form-control-lg" name="nrp" placeholder="Ketikan NRP/NIP untuk mencari data dikbangspes personil" value="<?= $nrp != '' ? $nrp : ''; ?>">
							<div class="input-group-append">
								<button type="submit" class="btn btn-lg btn-default">
									<i class="fa fa-search"></i>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<br />
			<br />
			<?php if ($nrp != "") { ?>
				<div class="row" id="section-dikbangspes">
					<div class="col-md-2">

						<div class="card card-primary card-outline">
							<div class="card-body box-profile">
								<div class="text-center">
									<img class="profile-user-img img-fluid img-circle" src="<?= base_url(); ?>assets/images/avatar5.png" alt="User profile picture">
								</div>
								<h3 class="profile-username text-center"><?= $nama; ?></h3>
								<p class="text-muted text-center"><?= $nrp; ?></p>
							</div>

						</div>

					</div>

					<div class="col-md-10">
						<div class="card">
							<div class="card-header p-2">
								Riwayat Dikbangspes
							</div>
							<div class="card-body">
								<table id="tabel_data" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th width="30px;">No.</th>
											<th>Pangkat</th>
											<th>Jabatan</th>
											<th>Kesatuan</th>
											<th>Fungsi Dikbangspes</th>
											<th>Jenis Dikbangspes</th>
											<th>Lama Pendidikan</th>
											<th>Tgl Buka</th>
											<th>Tgl Tutup</th>
										</tr>
									</thead>
									<tbody>
										<?php
										for ($i = 0; $i < count($dikbangspes); $i++) { ?>
											<tr>
												<td><?= $i + 1; ?></td>
												<td>
													<?= $pangkat[$i]; ?>
												</td>
												<td>
													<?= $jabatan[$i]; ?>
												</td>
												<td>
													<?= $kesatuan[$i]; ?>
												</td>
												<td>
													<?= $detail[$i]; ?>
												</td>
												<td>
													<?= $dikbangspes[$i]; ?>
												</td>
												<td>
													<?= $lama_pendidikan[$i]; ?>
												</td>
												<td>
													<?= $tgl_open[$i]; ?>
												</td>
												<td>
													<?= $tgl_close[$i]; ?>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>

					</div>

				</div>
			<?php } ?>
		</div>
	</section>

</div>

<script>
	$(document).ready(function() {
		$("#tabel_data").DataTable({
			"language": {
				"sProcessing": "Sedang memproses...",
				"sLengthMenu": "Tampilkan _MENU_ entri",
				"sZeroRecords": "Tidak ditemukan data yang sesuai",
				"sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
				"sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
				"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
				"sInfoPostFix": "",
				"sSearch": "Cari:",
				"sUrl": "",
				"oPaginate": {
					"sFirst": "Pertama",
					"sPrevious": "Sebelumnya",
					"sNext": "Selanjutnya",
					"sLast": "Terakhir"
				}
			},
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			"buttons": ["copy", 'excelHtml5', "print", "colvis"]
		}).buttons().container().appendTo('#tabel_data_wrapper .col-md-6:eq(0)');
	});
</script>