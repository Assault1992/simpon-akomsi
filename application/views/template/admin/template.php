<html>
	<head>
		<title><?php echo $site_title; ?></title>
		
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<meta name="viewport" content="width=device-width" />
		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('admin/css/bootstrap.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('shared/css/html5doctor.css'); ?>" media="screen" />
		<link rel="stylesheet" href="<?php echo base_url('shared/css/hartija.css'); ?>" media="print" />
		
		<link rel="stylesheet" href="<?php echo base_url('admin/assets/jquery-timepicker/jquery.timepicker.min.css'); ?>" media="screen" />
		
    <link rel="stylesheet" href="<?php echo base_url('admin/css/jquery-ui.min.css'); ?>" media="screen" />
		<link rel="stylesheet" href="<?php echo base_url('admin/css/font-awesome.css'); ?>" media="screen" />
		<link rel="stylesheet" href="<?php echo base_url('admin/assets/select2/css/select2.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('admin/assets/datatables-bootstrap/dataTables.bootstrap.css'); ?>" />

		<!--FARHAN CSS -->
		
		  <!-- Font Awesome -->
	  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
		  <!-- Ionicons -->
	  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  		<!-- Skin style -->
  		<link rel="stylesheet" type="text/css" href="<?php echo base_url('admin/css/skins/_all-skins.min.css'); ?>" media="screen">
      <!-- Theme style -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('admin/css/AdminLTE.css'); ?>" media="screen">

		<!--//FARHAN CSS -->

		<script type="text/javascript" src="<?php echo base_url('/admin/js/jquery-2.2.3.min.js'); ?>"></script>
		
		<script type="text/javascript" src="<?php echo base_url('admin/assets/data-tables/js/jquery.dataTables.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('admin/assets/jquery-timepicker/jquery.timepicker.min.js'); ?>"></script>
		
		<script type="text/javascript">
			var base_url = '<?php echo base_url(); ?>';

		</script>
		<script type="text/javascript" src="<?php echo base_url('admin/assets/select2/js/select2.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('/admin/js/bootstrap.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('/admin/js/jquery-ui.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('/admin/js/functions.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('admin/assets/datatables-bootstrap/dataTables.bootstrap.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('admin/assets/datatables-bootstrap/jquery.dataTables.js'); ?>"></script>
    <script>
      $(function () {
        $('#maintable').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
        });
        $('#maintable2').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
        });
      });
    </script>
		
		<!--FARHAN JS -->

		<!-- AdminLTE App -->
		<script src="<?php echo base_url('/admin/js/app.min.js'); ?>"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url('/admin/js/jquery.slimscroll.min.js'); ?>"></script>
		<!--//FARHAN JS -->

<?php foreach($css_link as $item): ?>
	<link rel="stylesheet" href="<?php echo $item; ?>" media="screen"/>
<?php endforeach; ?>
<?php foreach($css_script as $item): ?>
	<style>
		<?php echo $item; ?>
	</style>
<?php endforeach; ?>
<?php foreach($js_link as $item): ?>
	<script type="text/javascript" src="<?php echo $item; ?>"></script>
<?php endforeach; ?>
<?php foreach($js_script as $item): ?>
	<script type="text/javascript">
		<?php echo $item; ?>
	</script>
<?php endforeach; ?>
	</head>
	
	<?php if ((get_instance()->sys_user->user_data()->group) == '1'): ?>
  <body class="hold-transition skin-blue-light sidebar-mini">
  <?php elseif ((get_instance()->sys_user->user_data()->group) == '2'): ?>
  <body class="hold-transition skin-green-light sidebar-mini">
<?php elseif ((get_instance()->sys_user->user_data()->group) == '3'): ?>
  <body class="hold-transition skin-red-light sidebar-mini">
<?php endif; ?> 
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo base_url();?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <?php if ((get_instance()->sys_user->user_data()->group) == '1'): ?>
        <span class="logo-mini"><b>D</b>EV</span>
      <?php elseif ((get_instance()->sys_user->user_data()->group) == '2'): ?>  
        <span class="logo-mini"><b>A</b>DM</span>
      <?php elseif ((get_instance()->sys_user->user_data()->group) == '3'): ?>  
        <span class="logo-mini"><b>O</b>PR</span>
      <?php endif; ?>
      <!-- logo for regular state and mobile devices -->
      <div class="profile">
        <div class="info">
          <span class="username"><?php echo ucwords(get_instance()->sys_user->user_data()->name); ?></span><br/>
          <span class="group">as <?php echo get_instance()->sys_user->user_data()->group_name; ?></span>
        </div>
      </div>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo base_url('admin/images/avatar.png'); ?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo ucwords(get_instance()->sys_user->user_data()->name); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <!--<div class="panah">
                <div class="triangle-up">
                </div>
              </div>-->
              <li class="user-header">
                <img src="<?php echo base_url('admin/images/avatar.png'); ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo ucwords(get_instance()->sys_user->user_data()->name); ?>
                  <small>as <?php echo get_instance()->sys_user->user_data()->group_name; ?> <b><?php echo get_instance()->sys_user->user_data()->ledging; ?></b></small>
                </p>
              </li>              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url('index.php/' . get_instance()->sys_user->user_data()->group_name . '/profile'); ?>" class="btn btn-default btn-flat">Profile</a>
                  <a href="<?php echo base_url('index.php/' . get_instance()->sys_user->user_data()->group_name . '/security'); ?>" class="btn btn-default btn-flat">Security</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('index.php/router/logout'); ?>" onClick="javascript:return logout();" class="btn btn-default btn-flat">Sign Out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('admin/images/logoponsj.png'); ?>" alt="Logo Pon">
        </div>
      </div>
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header"></li>
        <!-- Optionally, you can add icons to the links -->
        <?php if($enable_menu): ?>
			<?php foreach($menu as $parent):  
					if($parent->alias == "Home"){
						$icon = "fa-home";
					}elseif($parent->alias == "Kedatangan Partisipan"){
						$icon = "fa-group";
					}elseif($parent->alias == "Check In"){
						$icon = "fa-sign-in";
					}elseif($parent->alias == "Check Out"){
						$icon = "fa-sign-out";
					}elseif($parent->alias == "Order Makanan"){
						$icon = "fa-shopping-basket";
					}elseif($parent->alias == "Tiket Makanan"){
						$icon = "fa-shopping-basket";
					}elseif($parent->alias == "Edit Tiket"){
            $icon = "fa-shopping-basket";
          }elseif($parent->alias == "Operator Management"){
            $icon = "fa-user-plus";
          }elseif($parent->alias == "Arrival Management"){
            $icon = "fa-plane";
          }elseif($parent->alias == "Cabor Management"){
            $icon = "fa-soccer-ball-o";
          }elseif($parent->alias == "Participant Management"){
            $icon = "fa-users";
          }elseif($parent->alias == "Ledging Management"){
						$icon = "fa-hotel";
					}elseif($parent->alias == "Allocation Management"){
            $icon = "fa-sort";
          }elseif($parent->alias == "Room Management"){
            $icon = "fa-bookmark";
          }elseif($parent->alias == "Kitchen Management"){
            $icon = "fa-spoon";
          }elseif($parent->alias == "Catering Management"){
            $icon = "fa-coffee";
          }elseif($parent->alias == "Menus Management"){
            $icon = "fa-plus-square";
          }elseif($parent->alias == "Venue Management"){
            $icon = "fa-globe";
          }elseif($parent->alias == "Group Management"){
            $icon = "fa-group";
          }elseif($parent->alias == "User Management"){
            $icon = "fa-user-plus";
          }elseif($parent->alias == "Controller Management"){
            $icon = "fa-cog";
          }elseif($parent->alias == "Menu Management"){
            $icon = "fa-clone";
          }elseif($parent->alias == "Database"){
            $icon = "fa-database";
          }elseif($parent->alias == "System Setting"){
            $icon = "fa-cogs";
          }

			?>
        		<li><a class="<?php echo strpos(current_url(), $parent->link) !== false ? 'active' : ''; ?>" href="<?php echo $parent->link; ?>"><i class="fa <?php echo $icon; ?>"></i><span><?php echo $parent->alias; ?></span></a></li>
        	<?php endforeach; ?>
		<?php endif; ?>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       	<?php $first = true; foreach($breadcrumb as $item): ?>
			<?php if(!$first): ?><small><?php endif; ?>
				<a href="<?php echo $item[1]; ?>" style="color:black;"><?php echo ucwords($item[0]); ?></a>
				<?php if(!$first): ?></small><?php endif; ?>
		<?php $first = false; endforeach; ?>
      </h1>
      <ol class="breadcrumb">

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php if(strlen(strval($this->input->get('notif'))) > 0): ?>
		<div class="row">
        <div class="col-md-10">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $this->input->get('notif'); ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<div class="row">
                <div class="col-sm-15 col-xs-6">
                <?php foreach($notif as $item): ?>
                  <div class="description-block">
                  	<?php echo $item; ?>
                  </div>
                <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
         </div>
        </div>
	<?php endif; ?>
 	<?php echo count($content) > 0 ? $content[0][1] : '-'; ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="http://diskumkm.jabarprov.go.id/">Dinas KUMKM Provinsi Jawa Barat</a>.</strong> All rights reserved.
  </footer>

  
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
    <script type="text/javascript" src="<?php echo base_url('admin/assets/ckeditor/ckeditor.js'); ?>"></script>
    <script>
      $(document).ready(function() {
        $(".select2_cabor").select2({
          placeholder: "Pilih Cabor",
          allowClear: true
        });
        $(".select2_kontingen").select2({
          placeholder: "Pilih Kontingen",
          allowClear: true
        });
        $(".select2_tempat").select2({
          placeholder: "Pilih Tempat",
          allowClear: true
        });
      });
    </script>
    <!-- /Select2 -->
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>