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
		<?php 
	date_default_timezone_set('Asia/dhaka');

		$date = date('Y-m-d', strtotime('+11 month'));
		$today_date = date('Y-m-d');

$query="SELECT count(insurence_data_id)as insurence_data_id FROM `insurence_data` WHERE insurence_data_notice_date > CURDATE() and  insurence_data_act_last_date > '$today_date' and insurence_data_notification_active=1";
		$users=$this->MainModel->AllQueryDalta($query);
		foreach ($users as $user);
		$user_count=$user->insurence_data_id;
		
?>

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="">
                <a href="<?php echo base_url(); ?>dashboard">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>

                </a>

            </li>
            <?php $user_type = $this->session->userdata('user_type');
            if ($user_type == 'admin') {

                ?>
                <li class="">
                    <a href="<?php echo base_url(); ?>users">
                        <i class="fa fa-fw fa-male"></i> <span>Users</span>
                    </a>
                </li>
            <?php } ?>

            <li class="treeview ">
                <a href="#"><i class="fa fa-fw fa-male"></i> <span>Customers</span> <span
                        class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>customer/CustomerController/create"> <i class="fa fa-fw fa-arrow-circle-right"></i> <span>New Customer</span>
                        </a>
                    </li>
                    <li><a href="<?php echo base_url(); ?>customer/CustomerController"> <i class="fa fa-fw fa-arrow-circle-right"></i>
                            <span>Customer list</span>
                        </a>
                    </li>
                    <li><a href="<?php echo base_url(); ?>customer_information"> <i class="fa fa-fw fa-arrow-circle-right"></i>
                            <span>Customer Information</span>
                        </a>
                    </li>
                    <li><a href="<?php echo base_url(); ?>customer/CustomerController/notification"> <i class="fa fa-fw fa-arrow-circle-right"></i>
                            <span>Customer Notification list<span class="pull-right-container">
              <small class="label pull-right bg-red"><?php if(isset($user_count)) {
				  echo $user_count;
			  }?></small>
            </span></span>
                        </a>
                    </li>
                </ul>
            </li>
            <?php $user_type = $this->session->userdata('user_type');
            if ($user_type == 'admin') {

                ?>

                <li class="treeview ">
                    <a href="#"> <i class="fa fa-wrench"></i> <span>Setting Options</span> <span
                            class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url(); ?>setting-default"> <i class="fa fa-fw fa-arrow-circle-right"></i> <span>Default Settings</span>
                            </a></li>
                        </li>
                    </ul>
                </li>
            <?php } ?>
    </section>
    <!-- /.sidebar -->
</aside>
