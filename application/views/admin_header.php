<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="<?php echo base_url(); ?>static/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>static/js/bootstrap.min.js"></script>
        <link href="<?php echo base_url(); ?>static/css/bootstrap.min.css" rel = "stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>static/css/<?php echo $css; ?>.css" rel = "stylesheet" type="text/css">
        <script src="<?php echo base_url(); ?>static/js/respond.js"></script>
        <script src="<?php echo base_url(); ?>static/js/custom.js"></script>       
        <title>
            <?php echo $title; ?>
        </title>
    </head>
    <body>       
        <div class="container">
            <div class="nav navbar-inverse">
                <div class="navbar-brand">
                   <a href ="<?php echo base_url(); ?>"> <?php echo $site_name; ?></a>
                </div>
                <div class="nav navbar-right">
                    <ul class="nav navbar-nav">
                        <?php 
                            if($this->session->userdata('user'))  {
                        ?>
                                <li class="dropdown">
                                    <a href="javascript:" class="dropdown-toggle" data-toggle = "dropdown"><span class="">Admin</span></a>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="container container-fluid">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="panel panel-success panel-heading">
                                                        <h4>Hi! <a href="<?php echo base_url().'admin/profile'; ?>"><?php echo $first_name; ?></a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                                <div class="panel panel-warning panel-heading">
                                                    <div class="row">
                                                    <div class="col-lg-6">
                                                        <a href="<?php echo base_url().'admin'; ?>">Admin Panel</a>
                                                    </div>
                                                    <div class="col-lg-6 pull-right">                                                   
                                                        <a href="<?php echo base_url().'admin/logout'; ?>"><div class="well well-sm"><span class="glyphicon glyphicon-log-out"></span></div></a>                                                    
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                
                        <?php
                            }
                            else {                                    
                        ?>
                                <a href="<?php echo base_url().'login'; ?>">Login</a>
                        <?php
                            }
                        ?>
                            
                    </ul>
                </div>
            </div>