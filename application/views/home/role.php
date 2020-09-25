<div class="main-content container-fluid">
	<div class="page-title">
		<h3><?= $title; ?></h3>
	</div>
	<div class="row">
		<div class="col-sm">
			<?= $this->session->flashdata('message');  ?>
			<div class="card">
				<div class="card-header py-3 " style="background-color: 	#1E90FF; color: black; font-weight: bolder;">
					<a data-toggle="modal" data-target="#role" class="btn btn-secondary px-2">Tambah role</a>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Role</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1;
								foreach ($role as $r) : ?>
									<tr>
										<th scope="row"><?= $i++ ?></th>
										<td><?= $r['role'];  ?></td>
										<td>
											<a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="btn btn-warning icon">
												<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
													<path fill-rule="evenodd" d="M12 1H4a1 1 0 0 0-1 1v10.755S4 11 8 11s5 1.755 5 1.755V2a1 1 0 0 0-1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z" />
													<path fill-rule="evenodd" d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
												</svg>
											</a>
											<a href="" class="btn btn-primary icon">
												<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
													<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
													<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
												</svg>
											</a>
											<a href="<?= base_url('Menu/hapusMenu/' . $r['id']) ?>" class="btn btn-danger icon">
												<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
													<path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
												</svg>
											</a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<!--primary theme Modal -->
<div class="modal fade text-left" id="role" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h5 class="modal-title white" id="myModalLabel160">Tambah role</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i data-feather="x"></i>
				</button>
			</div>
			<div class="modal-body">
				<form class="form form-vertical" method="POST" action="<?= base_url('admin/role') ?>">
					<div class="form-body">
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label for="first-name-vertical">Menu</label>
									<input type="text" id="first-name-vertical" class="form-control required" name="role" placeholder="Menu" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
								</div>
							</div>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light-secondary" data-dismiss="modal">
					<i class="bx bx-x d-block d-sm-none"></i>
					<span class="d-none d-sm-block">Close</span>
				</button>
				<button class="btn btn-primary ml-1" type="submit">
					<i class="bx bx-check d-block d-sm-none"></i>
					<span class="d-none d-sm-block">Tambahkan</span>
				</button>
			</div>
			</form>
		</div>
	</div>
</div>
