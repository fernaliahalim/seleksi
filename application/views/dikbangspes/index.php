<div class="content-wrapper">

	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">List Dikbangspes</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url(); ?>home/sign_out">Home</a></li>
						<li class="breadcrumb-item active">List Dikbangspes</li>
					</ol>
				</div>
			</div>
		</div>
	</div>


	<section class="content">
		<div class="container-fluid">

			<div class="row">
				<section class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-8">
									<button type="button" class="btn btn-success" id="btn-add" data-toggle="modal" data-target="#modal-lg">
										<i class="nav-icon fas fa-plus"></i> &nbsp; Tambah Data
									</button>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text">Tahun</span>
										</div>
										<select class="form-control" id="y" name="y">
											<option id="All" <?= $tahun == 'All' ? 'selected' : ''; ?>>All</option>
											<?php foreach ($rs_year->result_array() as $row) { ?>
												<option id="<?= $row['tahun']; ?>" <?= $row['tahun'] == $tahun ? 'selected' : ''; ?>><?= $row['tahun']; ?></option>
											<?php } ?>
										</select>
										<span class="input-group-append">
											<button type="button" class="btn btn-info btn-flat" id="btn-search">
												<i class="nav-icon fas fa-search"></i>
											</button>
										</span>
									</div>
								</div>
							</div>
							<br />
							<table id="tabel_data" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th width="30px;">No.</th>
										<th>Nama</th>
										<th>Pangkat</th>
										<th>NRP</th>
										<th>Jabatan</th>
										<th>Kesatuan</th>
										<th>Fungsi Dikbangspes</th>
										<th>Jenis Dikbangspes</th>
										<th>Lama Pendidikan</th>
										<th>Tgl Buka</th>
										<th>Tgl Tutup</th>
										<th>#</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
				</section>
			</div>

		</div>
	</section>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-lg">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form id="form-dikbangspes">
				<div class="modal-header">
					<h4 class="modal-title"></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="mb-3">
						<label class="form-label">Nama</label>
						<input type="text" id="id-modal" name="id" value="" hidden />
						<input type="text" class="form-control" id="nama-modal" name="nama" placeholder="Nama">
					</div>
					<div class="mb-3">
						<label class="form-label">Pangkat</label>
						<select class="form-control select2bs4" id="pangkat-modal" name="pangkat">
							<option value="0">--- Pilih Pangkat ---</option>
							<option value="KOMBES POL">KOMBES POL</option>
							<option value="AKBP">AKBP</option>
							<option value="KOMPOL">KOMPOL</option>
							<option value="AKP">AKP</option>
							<option value="IPTU">IPTU</option>
							<option value="IPDA">IPDA</option>
							<option value="AIPTU">AIPTU</option>
							<option value="AIPDA">AIPDA</option>
							<option value="BRIPKA">BRIPKA</option>
							<option value="BRIGPOL">BRIGPOL</option>
							<option value="BRIPTU">BRIPTU</option>
							<option value="BRIPDA">BRIPDA</option>
							<option value="ABRIP">ABRIP</option>
							<option value="ABRIPTU">ABRIPTU</option>
							<option value="ABRIPDA">ABRIPDA</option>
							<option value="BHARAKA">BHARAKA</option>
							<option value="BHARATU">BHARATU</option>

							<option value="PEMBINA TK. I (IV/b)">PEMBINA TK. I (IV/b)</option>
							<option value="PEMBINA (IV/a)">PEMBINA (IV/a)</option>
							<option value="PENATA TK. I (III/d)">PENATA TK. I (III/d)</option>
							<option value="PENATA (III/c)">PENATA (III/c)</option>
							<option value="PENDA TK. I (III/b)">PENDA TK. I (III/b)</option>
							<option value="PENDA (III/a)">PENDA (III/a)</option>
							<option value="PENGATUR TK. I (II/d)">PENGATUR TK. I (II/d)</option>
							<option value="PENGATUR (II/c)">PENGATUR (II/c)</option>
							<option value="PENGDA TK. I (II/b)">PENGDA TK. I (II/b)</option>
							<option value="PENGDA (II/a)">PENGDA (II/a)</option>
							<option value="JURU TK. I (I/d)">JURU TK. I (I/d)</option>
							<option value="JURU (I/c)">JURU (I/c)</option>
							<option value="JURDA TK. I (I/b)">JURDA TK. I (I/b)</option>
							<option value="JURDA (I/a)">JURDA (I/a)</option>
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">NRP</label>
						<input type="text" class="form-control" id="nrp-modal" name="nrp" placeholder="NRP">
					</div>
					<div class="mb-3">
						<label class="form-label">Jabatan</label>
						<input type="text" class="form-control" id="jabatan-modal" name="jabatan" placeholder="Jabatan">
					</div>
					<div class="mb-3">
						<label class="form-label">Kesatuan</label>
						<input type="text" class="form-control" id="kesatuan-modal" name="kesatuan" placeholder="Kesatuan">
					</div>
					<div class="mb-3">
						<label class="form-label">Fungsi Dikbangspes</label>
						<select class="form-control select2bs4" id="id_fungsi_dikbangspes-modal" name="id_fungsi_dikbangspes">
							<option value="0">--- Pilih Fungsi Dikbangspes ---</option>
							<?php foreach ($rs_fungsi->result_array() as $row) { ?>
								<option value="<?= $row['id']; ?>"><?= $row['detail']; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Jenis Dikbangspes</label>
						<select class="form-control select2bs4" id="id_jenis_dikbangspes-modal" name="id_jenis_dikbangspes">
							<option value="0">--- Pilih Jenis Dikbangspes ---</option>
							<?php foreach ($rs_jenis->result_array() as $row) { ?>
								<option value="<?= $row['id']; ?>"><?= $row['nama_dikbangspes']; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Lama Pendidikan</label>
						<input type="text" class="form-control" id="lama_pendidikan-modal" name="lama_pendidikan" placeholder="Lama Pendidikan">
					</div>
					<div class="mb-3">
						<label class="form-label">Tanggal Buka</label>
						<input type="date" class="form-control" id="tgl_open-modal" name="tgl_open" placeholder="Tanggal Buka">
					</div>
					<div class="mb-3">
						<label class="form-label">Tanggal Tutup</label>
						<input type="date" class="form-control" id="tgl_close-modal" name="tgl_close" placeholder="Tanggal Tutup">
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary btn-save-add-data">Simpan</button>
					<button type="button" class="btn btn-primary btn-save-change-data">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade modal-delete-action">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="form-dikbangspes-delete">
				<div class="modal-header">
					<h4 class="modal-title">Peringatan!</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="text" id="id-delete-modal" name="id" value="" hidden />
					Apakah Anda yakin untuk menghapus data ini?
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
					<button type="button" class="btn btn-primary btn-save-delete-data">Ya</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		<?php if (!empty($this->session->flashdata('success'))) { ?>
			toastr.success("<?= $this->session->flashdata('success'); ?>")
		<?php } ?>

		$('.select2bs4').select2({
			theme: 'bootstrap4'
		});

		var table = $("#tabel_data").DataTable({
			"initComplete": function(settings, json) {
				table.buttons().container()
					.appendTo('#tabel_data_wrapper .col-md-6:eq(0)');
			},
			"buttons": ["copy", 'excelHtml5', "print", "colvis"],
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
			"serverSide": true,
			"lengthChange": false,
			"autoWidth": false,
			"order": [],
			"ajax": {
				url: "<?= base_url(); ?>/dikbangspes/fetch_dikbangspes?y=<?= $tahun; ?>",
				type: "POST"
			}
		});

		$('#id_fungsi_dikbangspes-modal').change(function() {
			$.ajax({
				url: "<?= base_url() ?>dikbangspes/get_jenis_dikbangspes",
				delay: 250,
				method: 'GET',
				data: {
					q: $('#id_fungsi_dikbangspes-modal').val()
				},
				success: function(response) {
					$('#id_jenis_dikbangspes-modal').html(response);
				},
				error: function() {
					toastr.error('Oops! Silahkan coba lagi!')
				}
			});
		});

		$('#btn-search').click(function() {
			var y = $('#y').val();
			location.href = "<?= base_url(); ?>dikbangspes?y=" + y;
		});

		$('#btn-add').click(function() {
			$('.modal-title').html('Form Tambah List Dikbangspes');
			$('#id-modal').val("");
			$('#nama-modal').val("");
			$('#pangkat-modal').val(0).trigger('change');
			$('#nrp-modal').val("");
			$('#jabatan-modal').val("");
			$('#kesatuan-modal').val("");
			$('#id_fungsi_dikbangspes-modal').val(0);
			$('#id_jenis_dikbangspes-modal').val(0).trigger('change');
			$('#lama_pendidikan-modal').val("");
			$('#tgl_open-modal').val("");
			$('#tgl_close-modal').val("");

			$('.btn-save-add-data').show();
			$('.btn-save-change-data').hide();

			$('#modal-lg').modal('show');
		});

		$('.btn-save-add-data').click(function() {
			$.ajax({
				url: "<?= base_url(); ?>dikbangspes/add",
				method: "post",
				data: $('#form-dikbangspes').serialize(),
				success: function(data) {
					location.reload();
					$('.modal-lg').modal('toggle');
				},
				error: function(jqXHR, textStatus, errorThrown) {
					$('.modal-lg').modal('toggle');
					toastr.error('Oops! Data yg dimasukkan tidak berhasil. Silahkan coba lagi!')
				}
			});
		});

		$("#tabel_data tbody").on("click", ".btn-update", function() {
			var id = $(this).attr('id');

			$('.modal-title').html('Form Edit List Dikbangspes');
			$('#id-modal').val(id);
			$('#nama-modal').val($('#nama_' + id).val());
			$('#pangkat-modal').val($('#pangkat_' + id).val()).trigger('change');
			$('#nrp-modal').val($('#nrp_' + id).val());
			$('#jabatan-modal').val($('#jabatan_' + id).val());
			$('#kesatuan-modal').val($('#kesatuan_' + id).val());
			$('#id_fungsi_dikbangspes-modal').val($('#id_fungsi_dikbangspes_' + id).val()).trigger('change.select2');
			$('#id_jenis_dikbangspes-modal').val($('#id_jenis_dikbangspes_' + id).val()).trigger('change');
			$('#lama_pendidikan-modal').val($('#lama_pendidikan_' + id).val());
			$('#tgl_open-modal').val($('#tgl_open_' + id).val());
			$('#tgl_close-modal').val($('#tgl_close_' + id).val());

			$('.btn-save-add-data').hide();
			$('.btn-save-change-data').show();
			$('#detail-modal').focus();

			$('#modal-lg').modal('show');
		});

		$('.btn-save-change-data').click(function() {
			$.ajax({
				url: "<?= base_url(); ?>dikbangspes/edit_by_id",
				method: "post",
				data: $('#form-dikbangspes').serialize(),
				success: function(data) {
					location.reload();
					$('.modal-lg').modal('toggle');
				},
				error: function(jqXHR, textStatus, errorThrown) {
					$('.modal-lg').modal('toggle');
					toastr.error('Oops! Perubahan data tidak dapat dilakukan. Silahkan coba lagi!')
				}
			});
		});

		$("#tabel_data tbody").on("click", ".btn-delete", function() {
			var id = $(this).attr('id');

			$('#id-delete-modal').val(id);
			$('.modal-delete-action').modal('show');
		});

		$('.btn-save-delete-data').click(function() {
			$.ajax({
				url: "<?= base_url(); ?>dikbangspes/delete_by_id",
				method: "post",
				data: $('#form-dikbangspes-delete').serialize(),
				success: function(data) {
					location.reload();
					$('.modal-delete-action').modal('toggle');
				},
				error: function(jqXHR, textStatus, errorThrown) {
					$('.modal-delete-action').modal('toggle');
					toastr.error('Oops! Perubahan data tidak dapat dilakukan. Silahkan coba lagi!')
				}
			});
		});
	});
</script>