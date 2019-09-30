<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">

			</div>
			<div class="pull-left info">
				<p>

				</p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>

		<!-- /.search form -->
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">

			<li class="">
				<a href="<?php echo base_url(); ?>dashboard">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span>

				</a>

			</li>
			<li class="">
				<a href="<?php echo base_url(); ?>users">
					<i class="fa fa-dashboard"></i> <span>Users</span>
				</a>
			</li>


			<li class="treeview ">
				<a href="#"> <i class="fa fa-wrench"></i> <span>Setting Options</span> <span
						class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
				<ul class="treeview-menu">
					<li><a href="<?php echo base_url(); ?>setting-default"> <i class="fa fa-circle-o"></i> <span>Default Settings</span>
						</a></li>
					<li><a href="<?php echo base_url(); ?>setting-home"> <i class="fa fa-home"></i> <span>Home Page Settings</span>
						</a></li>
					<li hidden><a href="<?php echo base_url(); ?>setting-extra"> <i class="fa fa-circle-o"></i> <span>Extra Settings</span>
						</a></li>
					<li><a href="<?php echo base_url(); ?>setting-social"> <i class="fa fa-circle-o"></i>
							<span>Social Settings</span> </a></li>
					<li hidden ><a href="<?php echo base_url(); ?>setting-popup"> <i class="fa fa-circle-o"></i> <span>Popup Settings</span>
						</a></li>
					<li hidden ><a href="<?php echo base_url(); ?>setting-facebook"> <i class="fa fa-facebook-square"></i>
							<span>FaceBook Settings</span> </a></li>
				</ul>
			</li>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>
