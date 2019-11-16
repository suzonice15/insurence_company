<div class="col-md-offset-0 col-md-12">
    <div class="box  box-success">
        <div class="box-header with-border">
           
        </div>
        <div class="box-body">
            <div class="table-responsive" id="ajaxdata">
                <table id="example1" class="table table-bordered table-striped table-responsive ">
                    <thead>


                    <tr>
                        <th>Sl</th>
                        <th >No</th>
                        <th >Name </th>
                        <th >Mobile </th>
                        <th >Address </th>
                        <th >Reference </th>
                        <th >Certificate </th>
                        <th >Vihicle number </th>
                        <th >Created date </th>
                        <th >Renew date </th>

                        <?php
                        $user_type=$this->session->userdata('user_type');




                        ?>
                        <th >Action </th>


                    </tr>
                    </thead>
                    <tbody>
                    <?php



                    if (isset($users)){
                    $count = 0;
                    foreach ($users as $user) {

                    ?>
                    <tr>


                        <td><?php echo ++$count; ?></td>
                        <td><?php echo $user->insurence_data_no; ?></td>
                        <td><?php echo $user->customer_name; ?></td>
                        <td><?php echo $user->customer_mobile; ?></td>
                        <td><?php echo $user->customer_address; ?></td>
                        <td><?php echo $user->customer_refence ; ?></td>
                        <td><?php echo $user->insurence_data_certificate; ?></td>
                        <td><?php echo $user->insurence_data_vehicle_mark_number; ?></td>
                        <td><?php echo $user->created_date; ?></td>
                        <td><?php echo $user->insurence_data_notice_date; ?></td>



                        <?php
                        $user_type = $this->session->userdata('user_type');

                        if ($user_type == 'admin') {


                            ?>
                            <td>
							
							
                                <a title="Print"
                                   href="<?php echo base_url() ?>customer/CustomerController/print_result/<?php echo $user->insurence_data_id ?>"
                                <span class="glyphicon  glyphicon-print btn btn-instagram"></span>
                                </a>
                                <a title="Show"
                                   href="<?php echo base_url() ?>customer-show/<?php echo $user->insurence_data_id ?>"
                                <span class="glyphicon glyphicon-eye-open btn btn-info"></span>
                                </a>
                               
                               
                            </td>

                        <?php } else { ?>

                            <td>
							
                                <a title="Print"
                                   href="<?php echo base_url() ?>customer/CustomerController/print_result/<?php echo $user->insurence_data_id ?>"
                                <span class="glyphicon  glyphicon-print btn btn-instagram"></span>
                                </a>
								
                                <a title="Show"
                                   href="<?php echo base_url() ?>customer-show/<?php echo $user->insurence_data_id ?>"
                                <span class="glyphicon glyphicon-eye-open btn btn-info"></span>
                                </a>

                            </td>


                        <?php }
                        }
                        } ?>
                    </tr>
                    </tbody>

                </table>

            </div>



        </div>

    </div>
</div>
