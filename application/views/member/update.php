<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Update Member</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" />
    
</head>
<body>
    <!-- alert -->
    
    <?php
        if ($this->session->flashdata('msg_noti') != '') {
            echo 
                '<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>' . $this->session->flashdata('msg_noti') . '</p>
                </div>';
        } 
        if ($this->session->flashdata('msg_error') != '') {
            echo 
                '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>'. $this->session->flashdata('msg_error') . '</p>   
                </div>';
        }
        
    ?>
    
    <!-- /. alert -->
    <div class="container">
        <form action="<?php echo base_url('Member/update/'. $userDetail[0]->person_id ); ?>" method="POST" class="form-horizontal" role="form">
                <div class="form-group">
                    <legend>Update Member</legend>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="member_name">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="member_name" id="member_name" class="form-control" value="<?php echo $userDetail[0]->name; ?>">                                            
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="member_gender">Gender</label>
                    <div class="col-sm-10">
                        <input type="text" name="member_gender" id="member_gender" class="form-control" value="<?php echo $userDetail[0]->gender; ?>">                                            
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="member_address">Address</label>
                    <div class="col-sm-10">
                        <input type="text" name="member_address" id="member_address" class="form-control" value="<?php echo $userDetail[0]->address; ?>">                                            
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-primary" href="<?php echo base_url('member/index') ?>">Index List</a>
                    </div>
                </div>
        </form>    
    </div>
    
    <!-- script -->
    <script src="<?php echo base_url('assets/jquery/jquery-3.3.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
</body>
</html>