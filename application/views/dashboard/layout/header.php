<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>SGBTEAM BEKASI - <?=$title?> <?=$sub_menu?></title>
      <!-- plugins:css -->
      <link rel="stylesheet" href="<?=base_url('assets/dashboard/')?>vendors/feather/feather.css">
      <link rel="stylesheet" href="<?=base_url('assets/dashboard/')?>vendors/ti-icons/css/themify-icons.css">
      <link rel="stylesheet" href="<?=base_url('assets/dashboard/')?>vendors/css/vendor.bundle.base.css">
      <link rel="stylesheet" href="<?=base_url('assets/dashboard/')?>vendors/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="<?=base_url('assets/dashboard/')?>vendors/lightgallery/css/lightgallery.css">
      <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css" >
      <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
      <!-- endinject -->
      <!-- Plugin css for this page -->
      <!-- End plugin css for this page -->
      <!-- inject:css -->
      <link rel="stylesheet" href="<?=base_url('assets/dashboard/')?>css/vertical-layout-light/style.css">
      <!-- endinject -->
      <link rel="shortcut icon" href="<?=base_url('assets/login/')?>sgb.jpg" />
      <link rel="icon" href="<?=base_url('assets/login/')?>sgb.jpg" sizes="32x32" />
      <link rel="icon" href="<?=base_url('assets/login/')?>sgb.jpg" sizes="192x192" />
      <link rel="apple-touch-icon" href="<?=base_url('assets/login/')?>sgb.jpg" />
      <meta name="msapplication-TileImage" content="<?=base_url('assets/login/')?>sgb.jpg" />
      <script src="<?=base_url('assets/dashboard/')?>vendors/js/vendor.bundle.base.js"></script>
      <script src="<?=base_url('assets/dashboard')?>/vendors/chart.js/chart.umd.js"></script>
       <script src="<?=base_url('assets/dashboard')?>/vendors/datatables.net/jquery.dataTables.js"></script>
       <script src="<?=base_url('assets/dashboard')?>/vendors/datatables.net-bs5/dataTables.bootstrap5.js"></script>
       <script src="<?=base_url('assets/dashboard')?>/js/dataTables.select.min.js"></script>
       <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css" >
       <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
       <link rel="stylesheet" href="<?=base_url('assets/dashboard')?>/vendors/datatables.net-bs5/dataTables.bootstrap5.css">
   </head>
   <body>
      <div class="container-scroller">
         <!-- partial:../../partials/_navbar.html -->
         <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
               <a class="navbar-brand brand-logo me-5" href="<?=site_url()?>"><img src="<?=base_url('assets/dashboard/')?>images/item.png" class="me-2"
                  alt="logo" /></a>
               <a class="navbar-brand brand-logo-mini" href="<?=site_url()?>"><img src="<?=base_url('assets/dashboard/')?>images/minilogo.png"
                  alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
               <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
               <span class="icon-menu"></span>
               </button>

               <ul class="navbar-nav navbar-nav-right">
                  <li class="nav-item nav-profile dropdown">
                     <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                     <img src="https://ui-avatars.com/api/?name=<?=$user->name?>&amp;background=random" alt="profile" />
                     </a>
                     <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a href="<?=site_url('app/setting/profile')?>" class="dropdown-item">
                        <i class="ti-settings text-primary"></i>
                        Settings
                        </a>
                        <a href="<?=site_url('auth/logout')?>" class="dropdown-item">
                        <i class="ti-power-off text-primary"></i>
                        Logout
                        </a>
                     </div>
                  </li>
                  <li class="nav-item nav-settings text-center">
                        <h6 style="padding-top: 1rem;"><?=$user->name?>
                        <br>
                        <p><?php $roles = $this->M_db->Get_user_by_id('t_role','id',$user->role); print_r($roles->name);?></p>
                     </h6>
                        
                  </li>
               </ul>
               <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
         </nav>
         <!-- partial -->
         <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
               <ul class="nav">
                  <li class="nav-item <?php echo ($title == 'Dashboard') ? 'active' : ''; ?>">
                     <a class="nav-link" href="<?=site_url()?>">
                     <i class="lab la-microsoft menu-icon"></i>
                     <span class="menu-title">Dashboard</span>
                     </a>
                  </li>
                  <?php if ($user->role == 9) { ?>
                     <li class="nav-item <?php echo ($title == 'Master') ? 'active' : ''; ?>">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="<?php echo ($title == 'Master') ? 'true' : 'false'; ?>" aria-controls="ui-basic">
                        <i class="las la-table menu-icon"></i>
                        <span class="menu-title">Master Data</span>
                        <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse <?php echo ($title == 'Master') ? 'show' : ''; ?>" id="ui-basic">
                           <ul class="nav flex-column sub-menu">
                              <li class="nav-item <?php echo ($sub_menu == 'User') ? 'active' : ''; ?>"> <a class="nav-link" href="<?=site_url('app/master/user')?>">User</a></li>
                              <li class="nav-item <?php echo ($sub_menu == 'emails') ? 'active' : ''; ?>"> <a class="nav-link" href="<?=site_url('app/email/member')?>">Request Email SGB</a></li>
                              <li class="nav-item <?php echo ($sub_menu == 'Registrasi Form') ? 'active' : ''; ?>"> <a class="nav-link" href="<?=site_url('app/master/register-pamdi')?>">Cashflow KAS</a></li>
                              <!-- <li class="nav-item <?php echo ($sub_menu == 'Member') ? 'active' : ''; ?>"> <a class="nav-link" href="../ui-features/buttons.html">Member</a></li> -->
                           </ul>
                        </div>
                     </li>
                     <li class="nav-item <?php echo ($title == 'Payment') ? 'active' : ''; ?>">
                        <a class="nav-link" href="#charts">
                        <i class="las la-donate menu-icon"></i>
                        <span class="menu-title">Transaksi KAS</span>
                        </a>
                     </li>
                  <?php }?>
                  
                  <li class="nav-item <?php echo ($title == 'Pembayaran Kas') ? 'active' : ''; ?>">
                     <a class="nav-link" href="<?=site_url('app/pembayaran-kas')?>">
                     <i class="lab la-cc-amazon-pay menu-icon"></i>
                     <span class="menu-title">Pembayaran KAS</span>
                     </a>
                  </li>
                  <li class="nav-item <?php echo ($title == 'Report') ? 'active' : ''; ?>">
                     <a class="nav-link" href="#charts">
                     <i class="las la-file-invoice-dollar menu-icon"></i>
                     <span class="menu-title">Report</span>
                     </a>
                  </li>
                  <li class="nav-item <?php echo ($title == 'Setting') ? 'active' : ''; ?>">
                     <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="<?php echo ($title == 'Setting') ? 'true' : 'false'; ?>" aria-controls="tables">
                     <i class="las la-user-alt menu-icon"></i>
                     <span class="menu-title">Account</span>
                     <i class="menu-arrow"></i>
                     </a>
                     <div class="collapse <?php echo ($title == 'Setting') ? 'show' : ''; ?>" id="tables">
                        <ul class="nav flex-column sub-menu">
                           <li class="nav-item <?php echo ($sub_menu == 'Account') ? 'active' : ''; ?>"> <a class="nav-link" href="<?=site_url('app/setting/profile')?>">Setting Profile</a></li>
                        </ul>
                     </div>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="<?=site_url('auth/logout')?>">
                     <i class="las la-sign-out-alt menu-icon"></i>
                     <span class="menu-title">Logout</span>
                     </a>
                  </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">