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
                    <li class="active"><b>Stats &raquo; <?php echo $shortened_url; ?></b></li>
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
                            'class'         =>          'form-control',
                            'value'         =>          $original_url,
                            'readonly'      =>          'readonly',
                            'id'            =>          'long_url'
                        );

                        $f_shortened_url = array(
                            'name'          =>          'shortened_url',
                            'class'         =>          'form-control',
                            'value'         =>          base_url().$shortened_url,
                            'readonly'      =>          'readonly',
                            'title'         =>          'Shortened Url',
                            'id'            =>          'short_url'
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
                            'class'         =>          'btn btn-danger btn-lg',
                            'content'       =>          'Back'
                        );

                        $pop = array(
                            'title'         =>          'View Link',
                            'content'       =>          $original_url,
                            'id'            =>          'short_url'
                        );

                    ?>
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
                        <div class="input-group">
                            <?php
                                echo form_input($f_shortened_url);
                            ?>
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-success" onclick="selectAll('short_url')">Select</button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <label>Locked : </label>
                    <?php
                        echo $locked ." ";
                    ?>
                    <a href="javascript:" data-toggle = "popover" data-container = "body" title ="Locked" data-placcement = "bottom"
                           data-content = "If a URL is locked,it will not redirect to its respective original URL.It will simply lead to the site's home page.Disabled URL's hits freeze.">
                            <span class="glyphicon glyphicon-question-sign"></span></a>
                    <br>
                    <label>Hits : </label>
                    <?php 
                        echo $hits ." ";
                    ?>
                    <a href="javascript:" data-toggle = "popover" data-container = "body" title ="Hits" data-placcement = "bottom"
                           data-content = "It is the number of times this URL has been accessed.">
                            <span class="glyphicon glyphicon-question-sign"></span></a>
                    <br>                               
                    <div class="pull-left submit-buttons">
                        <a href="<?php echo base_url().'admin'; ?>"><?php echo form_button($f_cancel); ?></a>                                       
                    </div>
                </div>
                <div class="col-lg-6 pull-right">
                    <?php
                        if(isset($page_title)) {
                     ?>                           
                        <p class="text-center"><label>Page Details</label></p>
                        <br>
                        <p class="text-center">
                            <label>URL Title : </label>
                            <b>
                            <?php
                                echo $page_title;
                            ?>
                            </b>
                        </p>
                    <?php
                        }
                    ?>
                </div>
                <div class="row">

                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin_footer'); ?>