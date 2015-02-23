<html>
    <head>
        <script src="<?php echo base_url(); ?>static/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>static/js/bootstrap.min.js"></script>
        <link href="<?php echo base_url(); ?>static/css/bootstrap.css" rel = "stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>static/css/custom.css" rel="stylesheet" type="text/css">
        <script src="<?php echo base_url(); ?>static/js/respond.js"></script>
        <title>
            <?php echo $title; ?>
        </title>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-fixed-top navbar-inverse">
                <button type="button" class="navbar-toggle collapseed" data-toggle = "collapse">
                    <span class="sr-only">Toggle</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>">URLSh</a>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo base_url().'login' ; ?>">Login <span class="glyphicon glyphicon-log-in"></span></a></li>
                    </ul>
                </div>
            </nav>
            
             <!--   <div class="row"> -->
                    <div class="panel panel-success">
 
                           <?php
                                echo form_open(base_url().'shorten/process');
                                $placeholder = "Enter URL.";
                                $class = "form-group";
                                $value = NULL;
                                if(validation_errors() != NULL) {
                                    $placeholder = validation_errors();
                                    $placeholder = strip_tags($placeholder);
                                    $class = "form-group has-error has-feedback";
                                    $value = $_POST['url'];
                                }
                                else 
                                if(validation_errors() == NULL && count($_POST) > 0) {
                                    $value = $_POST['url'];
                                    $class = "form-group has-success";
                                }
                                $url = array(
                                    'name'               =>      'url',
                                    'id'                 =>      'url',
                                    'value'              =>      $value,
                                    'class'              =>      'form-control input-lg',
                                    'placeholder'        =>      'Enter URL.',
                                    'required'           =>      ''
                                );

                                $submit = array(
                                    'type'      =>      'submit',
                                    'name'      =>      'shorten',
                                    'class'     =>      'btn btn-primary btn-lg',
                                    'value'     =>      'shorten!'
                                );
                            ?>
                            <div class="<?php echo $class; ?>">
                                <br>
                                <div class="input-group">
                                    <div class="input-group-addon"><b>URL </b><span class="glyphicon glyphicon-link"></span></div>
                                        <?php 
                                            echo form_input($url);
                                        ?>
                                    <div class="input-group-btn">
                                        <?php
                                             echo form_button($submit,'shorten!');
                                        ?>       
                                    </div>
                                </div>

                                <?php
                                    if(validation_errors() != NULL) {
                                       // echo '<span class="glyphicon glyphicon-remove form-control-feedback"></span>';   
                                ?>
                                <br>
                                <span class="alert alert-danger">
                                    <?php
                                        echo $placeholder;   
                                    ?>
                                </span>
                                <br>
                                <?php
                                    }
                                ?>
                            </div> 
                            <!--
                            <div class="form-group">
                                <?php
                                    echo form_submit($submit,'Shorten');
                                    echo form_close();
                                ?>
                            </div>   
                            -->
                          <!--  
                        <ul class="nav nav-pills nav-justified" role="tablist">
                            <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Messages</a></li>
                        </ul>
                          -->
                    </div>
             <!--   </div> -->
             <div class="footer-custom">
                 <span class=" glyphicon glyphicon-copyright-mark"></span> <?php echo date("Y") ." ".$site_name; ?>
             </div>
            
        </div>
    </body>
</html>