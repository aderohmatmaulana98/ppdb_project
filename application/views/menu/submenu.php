<body>
	<div class="main-content container-fluid">
		<div class="page-title">
			<h3><?= $title; ?></h3>
		</div>
		<div class="row">
			<div class="col-sm">

				<?php if (validation_errors()) : ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<?= validation_errors();  ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif; ?>

				<?= $this->session->flashdata('message');  ?>
				<div class="card">
					<div class="card-header py-3 " style="background-color: 	#1E90FF; color: black; font-weight: bolder;">
						<a data-toggle="modal" data-target="#submenu" class="btn btn-secondary px-2">Tambah submenu</a>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Title</th>
										<th scope="col">Menu</th>
										<th scope="col">URL</th>
										<th scope="col">Icon</th>
										<th scope="col">Active</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
									foreach ($subMenu as $sm) : ?>
										<tr>
											<th scope="row"><?= $i++ ?></th>
											<td><?= $sm['title'];  ?></td>
											<td><?= $sm['menu'];  ?></td>
											<td><?= $sm['url'];  ?></td>
											<td><?= $sm['icon'];  ?></td>
											<td><?= $sm['is_active'];  ?></td>
											<td>
												<a href="" class="btn btn-primary icon">
													<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
														<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
														<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
													</svg>
												</a>
												<a href="<?= base_url('Menu/hapusSubMenu/'.$sm['id'])?>" type="button" class="btn btn-danger icon">
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
	<div class="modal fade text-left" id="submenu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<h5 class="modal-title white" id="myModalLabel160">Tambah submenu</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					<form class="form form-vertical" method="POST" action="<?= base_url('menu/submenu') ?>">
						<div class="form-body">
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="first-name-vertical">Title</label>
										<input type="text" id="first-name-vertical" class="form-control required" name="title" placeholder="Title" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="first-name-vertical">Menu</label>
										<select class="form-select" name="menu_id" id="basicSelect" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
											<option selected>Pilih menu</option>
											<?php foreach ($menu as $m) : ?>
												<option value="<?= $m['id'];  ?>"><?= $m['menu'];  ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="first-name-vertical">URL</label>
										<input type="text" id="first-name-vertical" class="form-control required" name="url" placeholder="URL" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="first-name-vertical">Icon</label>
										<input type="text" id="first-name-vertical" class="form-control required" name="icon" placeholder="Icon" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="first-name-vertical">Active</label>
										<div class='form-check'>
											<div class="checkbox">
												<input type="checkbox" value="1" id="checkbox1" name="is_active" class='form-check-input' checked>
												<label class="form-check-label" for="checkbox1">Active?</label>
											</div>
										</div>
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
