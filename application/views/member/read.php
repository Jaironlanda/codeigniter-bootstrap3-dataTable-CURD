<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Read</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" />
    
</head>
<body>
    <div class="container">
        <form role="form" class="form-horizontal">
                <div class="form-group">
                    <legend>Read Member</legend>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="member_name">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="member_name" id="member_name" class="form-control" value="<?php echo $userDetail[0]->name; ?>  ">                                          
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="member_gender">Gender</label>
                    <div class="col-sm-10">
                        <input type="text" name="member_name" id="member_name" class="form-control" value="<?php echo $userDetail[0]->gender; ?>  ">                                             
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="member_address">Address</label>
                    <div class="col-sm-10">
                        <input type="text" name="member_name" id="member_name" class="form-control" value="<?php echo $userDetail[0]->address; ?>  ">                                             
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <a class="btn btn-primary" href="<?php echo base_url('member/index') ?>">Index List</a>
                    </div>
                </div>
        </form>    
    </div>
    <script src="<?php echo base_url('assets/jquery/jquery-3.3.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
</body>
</html>