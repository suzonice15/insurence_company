<div class="col-md-offset-0 col-md-12">
    <div class="box box-success ">
        <div class="box-header with-border">
            <h3 class="box-title"><?php if (isset($title)) echo $title ?></h3>


        </div>
        <div class="box-body">


            <form action="<?php echo base_url() ?>setting/SettingController/default_update" method="post"
                  enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group ">
                        <label for="site_title">Site Title </label>
                        <input type="text" class="form-control" name="site_title" id="site_title"
                               value="<?= get_option('site_title') ?>">
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right">Update</button>
                </div>
            </form>

        </div>
    </div>





