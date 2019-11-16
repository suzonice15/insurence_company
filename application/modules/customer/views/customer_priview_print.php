<div class="col-md-offset-3" style="width:518px">
    <div class="box">

        <form class="form-horizontal" action="<?php echo base_url() ?>customer-update" id="user" method="post"
              enctype="multipart/form-data">
            <div class="box-body" style="margin-top: 56px;
    margin-left: -62px;">
                <div class="form-group " style="margin-top: 18px;">

                    <span style="margin-left:100px"><?php echo $user->insurence_data_thaird_party; ?></span>

                    <span style="margin-left:66px"><?php echo $user->insurence_data_compensive; ?></span>

                    <span style="margin-left:67px"><?php echo $user->insurence_data_value_taka; ?></span>

                </div>



                <div class="form-group ">
                    <p style="margin-left:205px;margin-top:-7px"><b><?php echo $user->insurence_data_certificate; ?></b></p>

                </div>

                <div class="form-group ">


                    <p style="margin-left: 294px;
    margin-top: -20px;
    margin-bottom: -20px"><b><?php echo $user->customer_name; ?></b></p>

                    <p style="margin-left: 200px;margin-top:23px"><?php echo $user->customer_address; ?></p>

                </div>

                <div class="form-group ">

                    <p style="margin-left: 298px;
    margin-top: 19px;">
                        <b><?php echo $user->insurence_data_vehicle_mark_number; ?></b></p>

                </div>
                <div class="form-group " style="margin-top: -28px;margin-left:-24px">

                <span
                    style="margin-left:224px;margin-top:10px"><?php echo $user->insurence_data_engine_number; ?></span>

                <span
                    style="margin-left: 190px;margin-top:10px"><?php echo $user->insurence_data_chasis_number; ?></span>

                </div>

                <div class="form-group " style="margin-top: -8px;">

                <span
                    style="margin-left: 299px;margin-top:12px"><?php echo $user->insurence_data_make_model_carrying_number; ?></span>

                </div>
                <div class="form-group ">
                    <label class="control-label col-sm-6" for="email"> </label>

                </div>
                <div class="form-group" style="margin-left: 27px;
    position: relative;
    top: -28px;
    left: 8px;
">


                <span
                    style="margin-left: 111px;margin-top:38px"><b><?php echo date('d/m/Y', strtotime($user->insurence_data_act_first_date)); ?></b></span>


                <span
                    style="margin-left: 177px;margin-top:38px" ><b><?php echo date('d/m/Y', strtotime($user->insurence_data_act_last_date)); ?></b></span>


                </div>

                <div class="form-group ">
                    <label class="control-label col-sm-3" for="email"> </label>
                    <div hidden class="col-sm-6">
                        <p style="text-align:right;"><?php echo $user->insurence_data_entitle_drive; ?></p>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-6 text-left" style="margin-left: 321px;
    margin-top: 85px;
    font-size: 11px;">
                        <table class="">
                            <tr>
                                <td>Basic Premium :</td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tk/</td>
                                <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $user->insurence_data_primiam_price; ?></b></td>
                            </tr>
                            <tr>
                                <td><span
                                        style="text-align:center;">Less  : <?php echo $user->insurence_data_less_percent; ?>
                                        %:</span>
                                </td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tk/</td>
                                <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $user->insurence_data_percent_money; ?></b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tk/</td>
                                <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $user->insurence_data_total_until_passenger; ?></b></td>
                            </tr>
                            <tr>
                                <td>Passengers <?php
                                    $extra= trim($user->insurence_data_passenger_plus);

                                    if(isset($extra)) { echo '+ '.$user->insurence_data_passenger_plus; }?>:</td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tk/</td>
                                <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $user->insurence_data_passenger_price; ?></b></td>
                            </tr>
                            <tr>
                                <td>Driver :</td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tk/</td>
                                <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $user->insurence_data_driver_price; ?></b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tk/</td>
                                <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $user->insurence_data_sub_total_price; ?></b></td>
                            </tr>
                            <tr>
                                <td>Add :15 % VAT :</td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tk/</td>
                                <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $user->insurence_data_total_vat; ?></b></td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tk/</td>
                                <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $user->insurence_data_total_money; ?></b></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="form-group " style="position: relative;
    top: -33px;
    left: 16px;
">

                    <span style="margin-left:180px;margin-top:10px"><?php echo $user->insurence_data_mr_number; ?></span>

                    <span style="margin-left:11px;margin-top:10px"><?php echo date('d/m/Y', strtotime($user->insurence_data_date)); ?></span>

                </div>

        </form>
    </div>
</div>
<script>
    window.onload = function () {
        window.print();
    }

</script>
