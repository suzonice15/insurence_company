<div class="col-md-offset-0 col-md-12">
    <div class="box box-success ">
        <div class="box-header with-border">
            <h3 class="box-title"><?php if (isset($title)) echo $title ?></h3>
        </div>

        <form class="form-horizontal" action="<?php echo base_url() ?>customer-update" id="user" method="post"
              enctype="multipart/form-data">

            <div class="box-body">

                <div class="row">

                    <div class="col-md-2">
                        <?php echo $user->insurence_data_no; ?>

                    </div>
                    <div class="col-md-2">
                        <?php echo $user->insurence_data_thaird_party; ?>
                    </div>
                    <div class="col-md-2">
                       <?php echo $user->insurence_data_compensive; ?>
                    </div>
                    <div class="col-md-2">
                       <?php echo $user->insurence_data_value_taka; ?>
                    </div>
                    <div class="col-md-2">
                     <?php echo $user->customer_mobile; ?>
                    </div>
                    <div class="col-md-2">
                      <?php echo $user->customer_refence; ?>
                    </div>

                </div>


            </div>
            <div class="form-group " style="margin-bottom: 1px">
                <label class="control-label col-sm-3" for="email">Certificate No.</label>
                <div class="col-sm-6">

                   <?php echo $user->insurence_data_certificate; ?>
                </div>
            </div>

            <div class="form-group " style="margin-bottom: 1px">
                <label class="control-label col-sm-3" for="email">1. Name and Address </label>
                <div class="col-sm-6">
                   <?php echo $user->customer_name; ?><?php echo $user->customer_address; ?>
                </div>
            </div>

            <div class="form-group " style="margin-bottom: 1px">
                <label class="control-label col-sm-3" for="email">(a) Reg Mark and Number :</label>
                <div class="col-sm-6">
                    <?php echo $user->insurence_data_vehicle_mark_number; ?>
                </div>
            </div>
            <div class="form-group " style="margin-bottom: 1px">
                <label class="control-label col-sm-3" for="email">or Engine Number:</label>
                <div class="col-sm-2">
                    <?php echo $user->insurence_data_engine_number; ?>
                </div>

                <label class="control-label col-sm-2" for="email">Chassis Number:</label>
                <div class="col-sm-2">
                   <?php echo $user->insurence_data_chasis_number; ?>
                </div>
            </div>

            <div class="form-group " style="margin-bottom: 1px">
                <label class="control-label col-sm-3" for="email">(b) Model ,Carrying / capacity & Number </label>
                <div class="col-sm-6">
                  <?php echo $user->insurence_data_make_model_carrying_number; ?>
                </div>
            </div>


            <div class="row ">
                <div class="col-md-6 pull-left">

                    <div class="form-group " style="margin-bottom: 1px">
                        <label class="control-label col-sm-6" for="email"> From on :</label>
                        <div class="col-sm-4">

                           <?php echo date('d/m/Y', strtotime($user->insurence_data_act_first_date)); ?>
                        </div>
                    </div>

                    <div class="form-group " style="margin-bottom: 1px">

                        <label class="control-label col-sm-6" for="email"> to midnight on :</label>
                        <div class="col-sm-4">
                           <?php echo date('d/m/Y', strtotime($user->insurence_data_act_last_date)); ?>
                        </div>
                    </div>

                    <div class="form-group " style="margin-top: 35px">

                        <label class="control-label col-sm-6" for="email">MR .No.</label>
                        <div class="col-sm-3">
                           <?php echo $user->insurence_data_mr_number; ?>
                        </div>


                    </div>

                    <div class="form-group " style="margin-top: 35px">

                        <label class="control-label col-sm-6" for="email">Issue Date</label>
                        <div class="col-sm-3">
                           <?php echo date('d/m/Y', strtotime($user->insurence_data_date)); ?>
                        </div>


                    </div>
                    <div class="form-group pull-right" style="margin-right: -274px;" >

                       <a href="<?php echo base_url()?>customer/CustomerController" class="btn btn-success ">Back</a>
                    </div>


                </div>

                <div class="col-md-6" style="width: 303px;
margin-left: -19px;">
                    <table class="table table-bordered">


                        <tr>
                            <td style="padding: 0px;">Basic Premium:</td>
                            <td style="padding: 0px;">Tk/</td>
                            <td style="padding: 0px;"><?php echo $user->insurence_data_primiam_price; ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 0px;">Less: <?php echo $user->insurence_data_less_percent; ?> %:
                            </td>
                            <td style="padding: 0px;">Tk/</td>
                            <td style="padding: 0px;"><?php echo $user->insurence_data_percent_money; ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 0px;"></td>
                            <td style="padding: 0px;">Tk /</td>
                            <td style="padding: 0px;"><?php echo $user->insurence_data_total_until_passenger; ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 0px;">Passengers <?php echo $user->insurence_data_passenger_plus; ?>:
                            </td>
                            <td style="padding: 0px;">Tk /</td>
                            <td style="padding: 0px;"><?php echo $user->insurence_data_passenger_price; ?>
</td>
                        </tr>
                        <tr>
                            <td style="padding: 0px;">Driver:</td>
                            <td style="padding: 0px;">Tk/</td>
                            <td style="padding: 0px;"><?php echo $user->insurence_data_driver_price; ?>30.00</td>
                        </tr>
                        <tr>
                            <td style="padding: 0px;"></td>
                            <td style="padding: 0px;">Tk/</td>
                            <td style="padding: 0px;"><?php echo $user->insurence_data_sub_total_price; ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 0px;">Add :15% VAT:</td>
                            <td style="padding: 0px;">Tk/</td>
                            <td style="padding: 0px;"><?php echo $user->insurence_data_total_vat; ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 0px;">Total</td>
                            <td style="padding: 0px;">Tk/</td>
                            <td style="padding: 0px;"><?php echo $user->insurence_data_total_money; ?></td>
                        </tr>
                    </table>
                </div>

            </div>
    </div>


    </form>

</div>
</div>

