<div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <img src="<?= base_url() ?>assets/assets/images/logo.svg" alt="" srcset="">
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            
            
                <li class='sidebar-title'>Main Menu</li>
                <li class="sidebar-item">
                    <a href="<?= base_url('user')?>" class='sidebar-link'>
                        <i data-feather="home" width="20"></i> 
                        <span>Dashboard</span>
                    </a>                    
                </li>  
            
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
                    <a href="#" class='sidebar-link'>
                        <i data-feather="file-text" width="20"></i> 
                        <span>Registrasi</span>
                    </a>                    
                </li>
                <li class="sidebar-item">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="calendar" width="20"></i> 
                        <span>Jadwal</span>
                    </a>                    
                </li>
                <li class="sidebar-item">
                    <a href="<?= base_url('user/jalur_seleksi') ?>" class='sidebar-link'>
                        <i data-feather="corner-up-right" width="20"></i> 
                        <span>Jalur seleksi</span>
                    </a>                    
                </li>      
                <li class="sidebar-item">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="dollar-sign" width="20"></i> 
                        <span>Pembayaran</span>
                    </a>                    
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