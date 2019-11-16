<div class="col-md-offset-0 col-md-12">
    <div class="box  ">


        <form class="form-horizontal" action="<?php echo base_url() ?>customer/CustomerController/customer_save"
              id="user" method="post"
              enctype="multipart/form-data">
            <div class="box-body">

                <div class="row">

                    <div class="col-md-2">
                        <input type="text" name="insurence_data_no" class="form-control" placeholder="No"
                               style="height: 25px;" value="<?php echo $this->session->userdata('no_number');
?>">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="insurence_data_thaird_party" class="form-control"
                               placeholder="Third Party" style="height: 25px;">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="insurence_data_compensive" class="form-control"
                               placeholder="Comprehensive" style="height: 25px;">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="insurence_data_value_taka" class="form-control"
                               placeholder="Value Taka" style="height: 25px;">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="customer_mobile" class="form-control"
                               placeholder="Contact Number" style="height: 25px;">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="customer_refence" class="form-control"
                               placeholder="Reference" style="height: 25px;">
                    </div>

                </div>


            </div>
            <div class="form-group " style="margin-bottom: 1px">
                <label class="control-label col-sm-3" for="email">Certificate No.</label>
                <div class="col-sm-6">
                    <?php
                    $district_name = $this->session->userdata('district_name');
                    $date_m_y = date('m/Y');
                    ?>
                    <input
                        type="text" class="form-control" name="insurence_data_certificate"
                        value="BCI/<?php echo $district_name; ?>/MV(PV)/CERT-0000/<?php echo $date_m_y; ?>"
                        style="height: 25px;">
                </div>
            </div>

            <div class="form-group " style="margin-bottom: 1px">
                <label class="control-label col-sm-3" for="email">1. Name and Address </label>
                <div class="col-sm-6">
                    <input
                        type="text" class="form-control" name="customer_name"
                        value="" placeholder="" style="height: 25px;">


                    <input
                        type="text" class="form-control" name="customer_address"
                        value="" placeholder="" style="height: 25px;">
                </div>
            </div>

            <div class="form-group " style="margin-bottom: 1px">
                <label class="control-label col-sm-3" for="email">(a) Reg Mark and Number :</label>
                <div class="col-sm-6">
                    <input
                        type="text" style="height: 25px;" class="form-control" name="insurence_data_vehicle_mark_number"
                        value="DHAKA METRO-GA-00-0000">
                </div>
            </div>
            <div class="form-group " style="margin-bottom: 1px">
                <label class="control-label col-sm-3" for="email">or Engine Number:</label>
                <div class="col-sm-2">
                    <input
                        type="text" style="height: 25px;" class="form-control" name="insurence_data_engine_number"
                        value="">
                </div>

                <label class="control-label col-sm-2" for="email">Chassis Number:</label>
                <div class="col-sm-2">
                    <input
                        type="text" style="height: 25px;" class="form-control" name="insurence_data_chasis_number"
                        value="">
                </div>
            </div>

            <div class="form-group " style="margin-bottom: 1px">
                <label class="control-label col-sm-3" for="email">(b) Model, capacity & Number of Seat </label>
                <div class="col-sm-6">
                    <input
                        type="text" style="height: 25px;" class="form-control"
                        name="insurence_data_make_model_carrying_number"
                        id="insurence_data_make_model_carrying_number" value="MODEL-0000,C,C-0000, SEAT - 00">
                </div>
            </div>


            <div class="row ">
                <div class="col-md-6 pull-left">

                    <div class="form-group " style="margin-bottom: 1px">
                        <label class="control-label col-sm-6" for="email"> From on :</label>
                        <div class="col-sm-4">
                            <?php

                            $d = strtotime("+365 days");
                            $last_year = date("d-m-Y", $d);
                            $fast_date = date('d-m-Y');
                            ?>
                            <input style="height: 25px;" type="text" name="insurence_data_act_first_date"
                                   class="form-control" value="<?php echo $fast_date; ?>">
                        </div>
                    </div>

                    <div class="form-group " style="margin-bottom: 1px">

                        <label class="control-label col-sm-6" for="email"> to midnight on :</label>
                        <div class="col-sm-4">
                            <input style="height: 25px;" type="text" name="insurence_data_act_last_date"
                                   class="form-control"  value="<?php echo $last_year; ?>">
                        </div>
                    </div>

                    <div class="form-group " style="margin-top: 35px">

                        <label class="control-label col-sm-6" for="email">MR .No.</label>
                        <div class="col-sm-3">
                            <input
                                type="text"  style="height: 25px;" class="form-control" name="insurence_data_mr_number" value="<?php echo $this->session->userdata('mr_number');
?>">
                        </div>


                    </div>

                    <div class="form-group " style="margin-top: 35px">

                        <label class="control-label col-sm-6" for="email">Issue Date</label>
                        <div class="col-sm-3">
                            <input
                                type="text"  style="height: 25px;" class="form-control" name="insurence_data_date" value="<?php echo $fast_date;?>">
                        </div>


                    </div>
<div class="form-group " style="margin-bottom: 1px;

margin-right: 32px;" >

    <input style="width: 220px" type="submit" class="btn btn-success btn-sm pull-right" value="Privew"/>
    </div>


                </div>

                <div class="col-md-6" style="width: 303px;
margin-left: -19px;">
                    <table class="table table-bordered">


                        <tr>
                            <td style="padding: 0px;">Basic Premium:</td>
                            <td style="padding: 0px;">Tk/</td>
                            <td style="padding: 0px;"><input style="height: 20px;

width: 74px;"  type="text" id="premium_price_id"
                                       name="insurence_data_primiam_price"
                                       class="form-control"></td>
                        </tr>
                        <tr>
                            <td style="padding: 0px;">Less: <input style="height: 20px; width: 50px;" type="text" name="insurence_data_less_percent"
                                             id="percent_id"> %:
                            </td>
                            <td style="padding: 0px;">Tk/</td>
                            <td style="padding: 0px;"><input style="height: 20px;

width: 74px;" type="text" name="insurence_data_percent_money"
                                       id="percentage_total"
                                       class="form-control"></td>
                        </tr>
                        <tr>
                            <td style="padding: 0px;"></td>
                            <td style="padding: 0px;">Tk /</td>
                            <td style="padding: 0px;"><input style="height: 20px;

width: 74px;" type="text" name="insurence_data_total_until_passenger"
                                       id="percent_less_total"
                                       class="form-control"></td>
                        </tr>
                        <tr>
                            <td style="padding: 0px;">Passengers <input style="height: 20px; width: 90px;" type="text" name="insurence_data_passenger_plus"
                                                                              id="percent_id">: </td>
                            <td style="padding: 0px;">Tk /</td>
                            <td style="padding: 0px;"><input style="height: 20px;

width: 74px;" type="text" name="insurence_data_passenger_price"
                                       id="passenger_vara"
                                       class="form-control"></td>
                        </tr>
                        <tr>
                            <td style="padding: 0px;">Driver:</td>
                            <td style="padding: 0px;">Tk/</td>
                            <td style="padding: 0px;"><input style="height: 20px;

width: 74px;" type="text" name="insurence_data_driver_price"
                                       id="driver_vara"
                                       class="form-control" value="30.00"></td>
                        </tr>
                        <tr>
                            <td style="padding: 0px;"></td>
                            <td style="padding: 0px;">Tk/</td>
                            <td style="padding: 0px;"><input style="height: 20px;

width: 74px;" id="sub_total" name="insurence_data_sub_total_price"
                                       type="text"
                                       class="form-control"></td>
                        </tr>
                        <tr>
                            <td style="padding: 0px;">Add :15% VAT:</td>
                            <td style="padding: 0px;">Tk/</td>
                            <td style="padding: 0px;"><input style="height: 20px;

width: 74px;" id="vat" name="insurence_data_total_vat" type="text"
                                       class="form-control"></td>
                        </tr>
                        <tr>
                            <td style="padding: 0px;">Total</td>
                            <td style="padding: 0px;">Tk/</td>
                            <td style="padding: 0px;"><input style="height: 20px;

width: 74px;" id="total_taka" name="insurence_data_total_money"
                                       type="text"
                                       class="form-control"></td>
                        </tr>
                    </table>
                </div>

            </div>
    </div>


    </form>
</div>
</div>


<script>

    $(document).on('change input', '#percent_id', function () {
        var premium_price_id = $('#premium_price_id').val();
        var percent_id = $('#percent_id').val();
        var percentage_less = (percent_id * premium_price_id) / 100;
        //  var  percentage_total= premium_price_id;
        var percentage_less = Math.round(percentage_less);
        var less_price = (percentage_less).toFixed(2);
        $('#percentage_total').val(less_price);
        var percentage_price_less = $('#percentage_total').val();
        total_percent_less = parseFloat(premium_price_id) - parseFloat(percentage_price_less);
        // alert(percentage_price_less)
        var total_less = (total_percent_less).toFixed(2);
        var total_percent_less = $('#percent_less_total').val(total_less);
        var percent_less_total = $('#percent_less_total').val();
        var passenger_vara = $('#passenger_vara').val();
        var driver_vara = $('#driver_vara').val();
        var sub_total = parseFloat(percent_less_total) + parseFloat(passenger_vara) + parseFloat(driver_vara);
        // alert(sub_total);
        var total = (sub_total).toFixed(2);
        $('#sub_total').val(total);
        var vat_percent = (total * 15) / 100;
        var total_vat = Math.round(vat_percent);
        var total_vat = (total_vat).toFixed(2);
        $('#vat').val(total_vat);
        var total_taka = parseFloat(total_vat) + parseFloat($('#sub_total').val());
        var total_money = Math.round(total_taka);
        var total_money = (total_money).toFixed(2);
        $('#total_taka').val(total_money);
    });


</script>

<script>

    $(document).on('change input', '#insurence_data_make_model_carrying_number', function () {

        var string = $('#insurence_data_make_model_carrying_number').val();

        var arr = string.split(' ');
        var length = arr.length;
        var set_number = arr[length - 1];
        set_number=set_number-1;
        var result = set_number * 45;
        var total_vara = (result).toFixed(2);

        $('#passenger_vara').val(total_vara);


    });

//    $(document).on('click', '#sub_total', function () {
//
//        // sub total value
//        var percent_less_total = $('#percent_less_total').val();
//        var passenger_vara = $('#passenger_vara').val();
//        var driver_vara = $('#driver_vara').val();
//        var sub_total = parseFloat(percent_less_total) + parseFloat(passenger_vara) + parseFloat(driver_vara);
//        // alert(sub_total);
//        var total = (sub_total).toFixed(2);
//        $('#sub_total').val(total);
//        var vat_percent = (total * 15) / 100;
//        var total_vat = Math.round(vat_percent);
//        var total_vat = (total_vat).toFixed(2);
//        $('#vat').val(total_vat);
//        var total_taka = parseFloat(total_vat) + parseFloat($('#sub_total').val());
//        var total_money = Math.round(total_taka);
//        var total_money = (total_money).toFixed(2);
//        $('#total_taka').val(total_money);
//
//
//    });


</script>
