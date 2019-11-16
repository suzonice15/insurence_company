<div class="col-md-offset-0 col-md-12">
<div class="box  box-success ">
	<div class="box-header with-border">
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
	
	<div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total users</span>
              <span class="info-box-number"><?php echo $user_count_list;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Insurence Data</span>
              <span class="info-box-number"><?php echo $insurence_data_id;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Unique Customers</span>
              <span class="info-box-number"><?php echo $uniquery_customer;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Notifications</span>
              <span class="info-box-number"><?php echo $user_count;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>

</div>
</div>
