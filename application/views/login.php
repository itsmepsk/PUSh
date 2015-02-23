<html>
    <head>
        <script src="<?php echo base_url(); ?>static/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>static/js/bootstrap.min.js"></script>
        <link href="<?php echo base_url(); ?>static/css/bootstrap.css" rel = "stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>static/css/login.css" rel="stylesheet" type="text/css">
        <script src="<?php echo base_url(); ?>static/js/respond.js"></script>
        <title>
            <?php echo $title; ?>
        </title>
    </head>
    <body>
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel panel-header">
                    <p class="text-center">Login</p>
                </div>
                <?php
                    $attributes = array(
                        'class'     =>      'form_signin'
                    );
                ?>

                <?php echo form_open(base_url().'login/validate',$attributes); ?>

                <?php
                    $username = array(
                        'name'          =>          'username',
                        'id'            =>          'username',
                        'placeholder'   =>          'Username',
                        'value'         =>          '',
                        'class'         =>          'form-control',
                        'required'      =>          ''
                    );

                    $password = array(
                        'name'          =>          'password',
                        'id'            =>          'password',
                        'placeholder'   =>          'Password',
                        'value'         =>          '',
                        'class'         =>          'form-control',
                        'required'      =>          '',
                        'min_length'    =>          8
                    );

                    $submit = array(
                        'name'      =>      'Login',
                        'class'     =>      'btn btn-primary'
                    )
                ?>
                
                <label>Username</label>    
                <div class="input-group">
                    <span class="input-group-addon glyphicon glyphicon-user"></span>
                    <?php echo form_input($username); ?>
                </div>
                <br>
                <label>Pasword</label> 
                <div class="input-group">
                    <span class="input-group-addon glyphicon glyphicon-lock"></span>
                    <?php echo form_password($password); ?>
                </div>
                

                <?php echo validation_errors(); ?>
                <br>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <p class="text-primary"><a href="<?php echo base_url(); ?>"> <u>&LeftArrow; Back to site</u></a></p>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <p class="text-primary"><a href="<?php echo base_url().'register'; ?>"> &nbsp; &nbsp; &nbsp; <u>Register</u></a></p>
                            </div>
                        </div>   
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <?php echo form_submit($submit, 'Login'); ?>
                        <?php echo form_close(); ?>
                    </div>
                </div>               
            </div>
        </div>
    </body>
</html>