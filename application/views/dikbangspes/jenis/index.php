<div class="content-wrapper">

	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Jenis Dikbangspes</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url(); ?>home/sign_out">Home</a></li>
						<li class="breadcrumb-item active">Jenis Dikbangspes</li>
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
							<button type="button" class="btn btn-success" id="btn-add" data-toggle="modal" data-target="#modal-lg">
								<i class="nav-icon fas fa-plus"></i> &nbsp; Tambah Data
							</button>
							<br /><br />
							<table id="tabel_data" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th width="20px;">No.</th>
										<th>ID Fungsi</th>
										<th>Fungsi Dikbangspes</th>
										<th>ID Jenis</th>
										<th>Jenis Dikbangspes</th>
										<th>#</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
									foreach ($rs_data->result_array() as $row) { ?>
										<tr>
											<td><?= $i++; ?></td>
											<td><?= $row['id_fungsi_dikbangspes']; ?></td>
											<td>
												<?= $row['detail']; ?>
												<input type="text" id="id_fungsi_dikbangspes_<?= $row['id']; ?>" value="<?= $row['id_fungsi_dikbangspes']; ?>" hidden />
											</td>
											<td><?= $row['id']; ?></td>
											<td>
												<?= $row['nama_dikbangspes']; ?>
												<input type="text" id="nama_dikbangspes_<?= $row['id']; ?>" value="<?= $row['nama_dikbangspes']; ?>" hidden />
											</td>
											<td>
												<button type="button" class="btn btn-sm btn-warning btn-update" id="<?= $row['id']; ?>" data-toggle="tooltip" title="Ubah">
													<i class="nav-icon fas fa-edit"></i>
												</button>
												<button type="button" class="btn btn-sm btn-danger btn-delete" id="<?= $row['id']; ?>" data-toggle="tooltip" title="Hapus">
													<i class="nav-icon fas fa-trash-alt"></i>
												</button>
											</td>
										</tr>
									<?php } ?>
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
						<label class="form-label">Fungsi Dikbangspes</label>
						<input type="text" id="id-modal" name="id" value="" hidden />
						<select class="form-control select2bs4" id="id_fungsi_dikbangspes-modal" name="id_fungsi_dikbangspes">
							<?php foreach ($rs_fungsi->result_array() as $row) { ?>
								<option value="<?= $row['id']; ?>"><?= $row['detail']; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Jenis Dikbangspes</label>
						<input type="text" class="form-control" id="nama_dikbangspes-modal" name="nama_dikbangspes" placeholder="Jenis Dikbangspes">
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


		$('#btn-add').click(function() {
			$('.modal-title').html('Form Tambah Data Jenis Dikbangspes');
			$('.btn-save-add-data').show();
			$('.btn-save-change-data').hide();

			$('#modal-lg').modal('show');
		});

		$('.btn-save-add-data').click(function() {
			$.ajax({
				url: "<?= base_url(); ?>jenis_dikbangspes/add",
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

			$('.modal-title').html('Form Edit Data Fungsi Dikbangspes');
			$('#id-modal').val(id);
			$('#id_fungsi_dikbangspes-modal').val($('#id_fungsi_dikbangspes_' + id).val()).trigger('change');
			$('#nama_dikbangspes-modal').val($('#nama_dikbangspes_' + id).val());

			$('.btn-save-add-data').hide();
			$('.btn-save-change-data').show();
			$('#detail-modal').focus();

			$('#modal-lg').modal('show');
		});

		$('.btn-save-change-data').click(function() {
			$.ajax({
				url: "<?= base_url(); ?>jenis_dikbangspes/edit_by_id",
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
				url: "<?= base_url(); ?>jenis_dikbangspes/delete_by_id",
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