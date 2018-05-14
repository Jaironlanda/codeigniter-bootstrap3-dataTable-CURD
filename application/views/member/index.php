<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/DataTables/datatables.min.css'); ?>" />
    
</head>
<body>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">jaironlanda.com</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo base_url('Member/index'); ?>">Index <span class="sr-only">(current)</span></a></li>
            <li><a href="<?php echo base_url('Member/create'); ?>">Create</a></li>
        </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
    </nav>
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
        <a class="btn btn-success" href="<?php echo base_url('Member/create') ?>"> 
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            Create Member
        </a>
        <!-- DataTable -->
        <table id="user-table" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no = 1;
                    if ($userList != false) {
                        foreach ($userList as $userData) {
                            echo '<tr>';
                            echo '<td>'.$no++.'</td>';
                            echo '<td>'.$userData->name.'</td>';
                            echo '<td>'.$userData->gender.'</td>';
                            echo '<td>'.$userData->address.'</td>';
                            echo '<td><a class="btn btn-primary" href="'.base_url('Member/read/'.$userData->person_id).'"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Read</a> <a class="btn btn-default" href="'.base_url('Member/update/'.$userData->person_id).'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a> <a class="btn btn-danger" href="'.base_url('Member/delete/'.$userData->person_id).'"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a></td>';
                            echo '</tr>';
                        }
                    }
                ?>
            </tbody>
        </table>
    <!-- /.DataTable -->
    </div>
    <!-- script -->
    <script src="<?php echo base_url('assets/jquery/jquery-3.3.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/DataTables/datatables.min.js'); ?>"></script>
    <script>
       $(document).ready(function() {
            $('#user-table').DataTable();
        });
    </script>
</body>
</html>