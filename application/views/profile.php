<?php $this->load->view('admin_header',$details); ?>
<div class="row">
    <div class="col-lg-2">
        <?php $this->load->view('sidebar'); ?>
    </div>
    <div class="col-lg-8">
        <div class="panel panel-default content">
            <div class="panel panel-header">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url().'admin'; ?>">Admin</a></li>
                    <li class="active"><b>Profile</b></li>
                </ol>
            </div>
            <?php
                if(isset($success)) {
                    if($success == TRUE) {
                        echo "<p class = 'bg-success message'><b>{$message}</b></p>";
                    }
                    else {
                        echo "<p class = 'bg-danger message'><b>{$message}</b></p>";
                    }
                }
            ?>
            <div class="panel panel-body">
                <div class="col-lg-12">
                    
                    <?php 
                    
                        foreach ($result as $key=>$value) {
                            $f_data[$key] = $value;
                        }
                        
                    ?>
                    
                    <?php
                        $f_id           =       array(
                            'id'			=>		$f_data['id']
                        );      
                        $f_username     =       array(
                            'type'          =>      'text',
                            'name'          =>      'username',
                            'class'         =>      'form-control input',
                            'value'         =>      $f_data['username'],
                            'min_length'    =>      '8',
                            'max_length'    =>      '15',
                            'pattern'       =>      '[a-z]+',
                            'aria-required' =>      'true',
                            'required'      =>      'required',
                            'title'         =>      'AlphaNumeric less than 15 characters',
                            'id'            =>      'us'
                        );
                        $f_newPassword  =       array(
                            'type'          =>       'password',
                            'name'          =>       'new_password',
                            'class'         =>       'form-control input',
                            'value'         =>       '',
                            'id'            =>       'newP'
                        );
                        $f_firstName        =   array(
                            'type'          =>      'text',
                            'name'          =>      'first_name',
                            'class'         =>      'form-control input',
                            'value'         =>      $f_data['first_name'],
                            'required'      =>      'required',
                            'id'            =>      'fn'
                        );
                        $f_lastName        =   array(
                            'type'          =>      'text',
                            'name'          =>      'last_name',
                            'class'         =>      'form-control input',
                            'value'         =>      $f_data['last_name'],
                            'required'      =>      'required',
                            'id'            =>      'ln'
                        );
                        $f_confirmPassword  =   array(
                            'type'          =>       'password',
                            'name'          =>       'confirm_password',
                            'class'         =>       'form-control input',
                            'value'         =>       '',
                            'id'            =>       'confP'
                        );
                        $f_oldPassword  =       array(
                            'type'          =>       'password',
                            'name'          =>       'old_password',
                            'class'         =>       'form-control input input-lg',
                            'value'         =>       '',
                            'required'      =>       'required',
                            //'aria-required' =>       'true',
                            //'title'         =>       'Required to save changes'
                        );
                        $f_submit      =        array(
                             'type'         =>      'submit',
                             'name'         =>      'update',
                             'value'        =>      'update',
                             'class'        =>      'btn btn-success btn-lg',
                             'id'           =>      'ch',
                             'onClick'      =>      "return check('newP','confP')"
                         );
                        $f_cancel      =        array(
                            'name'          =>      'back',
                            'type'          =>      'button',
                            'value'         =>      'Back',
                            'class'         =>      'btn btn-danger btn-lg',
                            'content'       =>      'Cancel'
                        );
                    ?>
                    <script type="text/javascript">
                        function check(newP,confP) {
                            var x = document.getElementById(newP).value;
                            //alert(x);
                            var y = document.getElementById(confP).value;
                            if (x.trim() !== "") {
                                //alert(x);
                                if(x !== y) {
                                    alert("Both password fields do not match!");
                                    return false;
                                }
                                else {
                                    //alert("Yo");
                                    return true;
                                }
                            }
                        }
                    </script>
                    <?php echo validation_errors(); ?>
                    <?php echo form_open(base_url()."admin/profile"); ?>
                    
                    <div class="form-group">
                        <div class="row">
                            <?php echo form_hidden($f_id); ?>
                            <div class="col-lg-6">
                                <label>Username : </label>
                                <div class="input-group user">
                                    <?php echo form_input($f_username); ?>
                                    <div class="input-group-addon">
                                        <a data-toggle = "popover" data-container = "body" title ="Username help." data-placcement = "bottom"
                                          data-content = "Admin Username.">
                                           <span class="glyphicon glyphicon-question-sign"></span></a>
                                    </div>
                                </div>
                                <br>
                                <label>First Name : </label>
                                <div class="input-group">
                                    <?php echo form_input($f_firstName); ?>
                                    <div class="input-group-addon">
                                        <a data-toggle = "popover" data-container = "body" title ="First Name help." data-placcement = "bottom"
                                          data-content = "Your Name.">
                                           <span class="glyphicon glyphicon-question-sign"></span></a>
                                    </div>
                                </div>
                                <br>
                                <label>Last Name : </label>
                                <div class="input-group">
                                    <?php echo form_input($f_lastName); ?>
                                    <div class="input-group-addon">
                                        <a data-toggle = "popover" data-container = "body" title ="Last Name help." data-placcement = "bottom"
                                          data-content = "Your Surname.">
                                           <span class="glyphicon glyphicon-question-sign"></span></a>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="col-lg-6">
                                <label>New Password : </label>
                                <div class="input-group">
                                    <?php echo form_input($f_newPassword); ?>
                                    <div class="input-group-addon">
                                        <a data-toggle = "popover" data-container = "body" title ="New Password help." data-placcement = "bottom"
                                          data-content = "Enter a new password if you want to the change previous one.">
                                           <span class="glyphicon glyphicon-question-sign"></span></a>
                                    </div>
                                </div>
                                <br>
                                <label>Confirm Password : </label>
                                <div class="input-group">
                                    <?php echo form_input($f_confirmPassword); ?>
                                    <div class="input-group-addon">
                                        <a data-toggle = "popover" data-container = "body" title ="New Password help." data-placcement = "bottom"
                                          data-content = "Enter the new password once again.">
                                           <span class="glyphicon glyphicon-question-sign"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Enter Old Password to save changes: </label>
                                <div class="input-group">
                                    <?php echo form_input($f_oldPassword); ?>
                                    <div class="input-group-btn">
                                        <?php echo form_submit($f_submit,"onclick=check(us)"); ?>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <a href="<?php echo base_url().'admin'; ?>"><?php echo form_button($f_cancel); ?></a> 
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin_footer'); ?>