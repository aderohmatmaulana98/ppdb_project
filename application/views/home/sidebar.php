<div id="app">
	<div id="sidebar" class='active'>
		<div class="sidebar-wrapper active">
			<div class="sidebar-header">
				<img src="<?= base_url() ?>assets/assets/images/logo.svg" alt="" srcset="">
			</div>
			<div class="sidebar-menu">
				<ul class="menu">

					<!-- query menu -->
					<?php
					$role_id = $this->session->userdata('role_id');

					$queryMenu = "SELECT user_menu.id, menu
									FROM user_menu
									JOIN user_access_menu
									ON user_menu.id = user_access_menu.menu_id
									WHERE user_access_menu.role_id = $role_id
									ORDER BY user_access_menu.menu_id ASC
									";
					$menu = $this->db->query($queryMenu)->result_array();

					?>
					<!-- Looping Menu -->
					<?php foreach ($menu as $m) : ?>
						<li class='sidebar-title'><?= $m['menu'];  ?></li>


						<!-- Siapkan submenu sesuai Menu -->
						<?php
						$menuId = $m['id'];
						$querySubMenu = "SELECT *
						FROM user_sub_menu JOIN user_menu
						ON user_sub_menu.`menu_id` = user_menu.`id`
						WHERE user_sub_menu.`menu_id` = $menuId 
						AND user_sub_menu.`is_active` = 1 ";

						$subMenu = $this->db->query($querySubMenu)->result_array();
						?>
						<?php foreach ($subMenu as $sm) : ?>
							<?php if ($title == $sm['title']) : ?>
								<li class="sidebar-item active">
								<?php else : ?>
								<li class="sidebar-item">
								<?php endif; ?>
								<a href="<?= base_url($sm['url']); ?>" class='sidebar-link'>
									<i data-feather="<?= $sm['icon'];  ?>" width="20"></i>
									<span><?= $sm['title']; ?></span>
								</a>
								</li>
							<?php endforeach; ?>
						<?php endforeach ?>


						<li class='sidebar-title'>Pengaturan</li>
						<li class="sidebar-item  has-sub">
							<a href="#" class='sidebar-link'>
								<i data-feather="user" width="20"></i>
								<span>Akun</span>
							</a>

							<ul class="submenu ">
								<li>
									<a href="#">Profile</a>
								</li>
								<li>
									<a href="#">Data diri</a>
								</li>
							</ul>

						</li>
						<li class="sidebar-item">
							<a href="<?= base_url('auth/logout') ?>" class='sidebar-link'>
								<i data-feather="log-out" width="20"></i>
								<span>Logout</span>
							</a>
						</li>




				</ul>
			</div>
			<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
		</div>
	</div>
