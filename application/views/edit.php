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
                    <li class="active"><b>Edit Link &raquo; <?php echo $shortened_url; ?></b></li>
                </ol>
            </div>
            <?php
                if(isset($success)) {
                    if($success == 1) {
                        echo "<p class = 'bg-success message'><b>{$message}</b></p>";
                    }
                    else {
                        echo "<p class = 'bg-danger message'><b>{$message}</b></p>";
                    }
                }
            ?>
            <div class="panel panel-body">
                <div class="col-lg-6">
                    <input type="hidden" name="hello" value="hello"/>
                    <?php
                        echo form_open(base_url()."admin/edit_update");
                    ?>
                    <?php
                        $f_original_url = array(
                            'name'          =>          'original_url',
                            //'rows'          =>          '1',
                            //'cols'          =>          '100',
                            'class'         =>          'form-control',
                            'value'         =>          $original_url,
                            'readonly'      =>          'readonly',
                            'id'            =>          'long_url'
                        );

                        $f_shortened_url = array(
                            'name'          =>          'shortened_url',
                            'class'         =>          'form-control',
                            'value'         =>          $shortened_url,
                            'minlength'     =>          '5',
                            'maxlength'     =>          '10',
                            'pattern'       =>          '[A-Za-z0-9]+',
                            'aria-required' =>          'true',
                            'id'            =>          'short_url',
                            'required'      =>          'required',
                            'title'         =>          'AlphaNumeric less than 10 characters'
                        );

                        $f_disable = array(
                            'name'          =>          'disable',
                            'value'         =>          1,
                            'class'         =>          'checkbox',
                            'checked'       =>          ($disable == 1)?'checked':''
                        );

                        $f_reset = array(
                            'name'          =>          'reset',
                            'value'         =>          1,
                            'class'         =>          'checkbox',
                            'checked'       =>          ''
                        );

                        $f_submit = array(
                            'name'          =>          'save',
                            'type'          =>          'submit',
                            'value'         =>          'Save',
                            'class'         =>          'btn btn-success btn'
                        );

                        $f_id = array(
                            'name'          =>          'id',
                            'type'          =>          'hidden',
                            'value'         =>          $id
                        );

                        $f_cancel = array(
                            'name'          =>          'back',
                            'type'          =>          'button',
                            'value'         =>          'Back',
                            'class'         =>          'btn btn-danger btn',
                            'content'       =>          'Cancel'
                        );

                        $pop = array(
                            'title'         =>          'View Link',
                            'content'       =>          $original_url,
                            'id'            =>          'short_url'
                        );

                    ?>
                    <?php echo form_hidden("id",$id); ?>
                    <label>Original URL</label>
                    <div class="form-group">
                        <div class="input-group">
                            <?php
                                //echo form_fieldset('disabled');
                                echo form_input($f_original_url);
                            ?>
                            <span id="name-format" class = "help"><p>Press <code>Ctrl + C</code></p></span>
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-success" onclick="selectAll('long_url')">Select</button>
                                <button id = "copy" type="button" class="btn btn-primary" data-toggle ="popover" 
                                    data-container = "body" title = "<?php echo $pop['title']; ?>" 
                                    data-placement = "right" data-content = "<?php echo $pop['content']; ?>">
                                    Show Link
                                </button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <label>Shortened URL</label>
                    <div class="form-group">
                        <div class="input-group short">
                            <?php
                                echo form_input($f_shortened_url);
                            ?>
                            <div class="input-group-addon">
                                <a href="#" data-toggle = "popover" data-container = "body" title ="Short URL help." data-placcement = "bottom"
                                   data-content = "You can assign a custom short URL.Only AlphaNumeric Characters are permitted.Max length can be 10.">
                                    <span class="glyphicon glyphicon-question-sign"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 pull-right">
                    <div class="checkbox">
                        <?php echo form_checkbox($f_disable); ?><label><b>Disable URL?</b></label>
                        <a href="javascript:" data-toggle = "popover" data-container = "body" title ="Disable" data-placcement = "bottom"
                           data-content = "If a URL is disabled,it will not redirect to its respective original URL.It will simply lead to the site's home page.Disabled URL's hits freeze.">
                            <span class="glyphicon glyphicon-question-sign"></span></a>
                    </div>
                    <div class="checkbox">
                        <?php echo form_checkbox($f_reset); ?><label><b>Reset hits Counter?</b></label>
                        <a href="javascript:" data-toggle = "popover" data-container = "body" title = "Reset Counter" data-placcement = "bottom"
                           data-content = "Checking this will reset the hits counter to zero.">
                            <span class="glyphicon glyphicon-question-sign"></span></a>
                    </div>                               
                    <br>
                    <?php echo form_submit($f_submit); ?>
                    <a href="<?php echo base_url().'admin'; ?>"><?php echo form_button($f_cancel); ?></a>  
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin_footer'); ?>
