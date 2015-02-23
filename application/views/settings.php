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
                    <li class="active"><b>Site Settings</b></li>
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
                <div class="col-lg-12"> 
                    <?php
                        //var_dump($result);
                        foreach($result as $key) {
                            $f_data[$key->field]   =  $key->value; 
                        }
                    ?>
                    <?php
                         $f_siteTitle   =   array(
                             'type'         =>      'text',
                             'name'         =>      'site_title',
                             'class'        =>      'form-control input',
                             'value'        =>      $f_data['site_title']    
                         );
                         $f_siteName    =   array(
                             'type'         =>      'text',
                             'name'         =>      'site_name',
                             'class'        =>      'form-control input',
                             'value'        =>      $f_data['site_name']    
                         );
                         $f_lockAll     =   array(
                             'name'         =>      'lock_all',
                             'value'        =>      1,                             
                             'class'        =>      'checkbox',
                             'checked'      =>      ($f_data['lock_all'] == "true")?'checked':''
                         );
                         $f_deleteAll   =   array(
                             'name'         =>      'delete_all',
                             'value'        =>      1,
                             'class'        =>      'checkbox',
                         );
                         $f_getTitle     =   array(
                             'name'         =>      'get_title',
                             'value'        =>      1,                             
                             'class'        =>      'checkbox',
                             'checked'      =>      ($f_data['get_title'] == "true")?'checked':''
                         );
                         $f_submit      =   array(
                             'type'         =>      'submit',
                             'name'         =>      'update',
                             'value'        =>      'update',
                             'class'        =>      'btn btn-success'
                         );
                         $f_cancel = array(
                             'name'          =>      'back',
                             'type'          =>      'button',
                             'value'         =>      'Back',
                             'class'         =>      'btn btn-danger btn',
                             'content'       =>      'Cancel'
                         );
                    ?>
                    <?php echo form_open(base_url().'admin/settings'); ?>
                     <div class="form-group">
                         <div class="row">
                             <div class="col-lg-6">
                                <label>Site Title : </label>
                                <div class="input-group">
                                    <?php echo form_input($f_siteTitle); ?>
                                    <div class="input-group-addon">
                                       <a href="javascript:" data-toggle = "popover" data-container = "body" title ="Site Title help." data-placcement = "bottom"
                                          data-content = "Title of the home page of your site.">
                                           <span class="glyphicon glyphicon-question-sign"></span></a>
                                   </div>
                                </div>
                                <br>
                                <label>Site Name : </label>
                                <div class="input-group">
                                    <?php echo form_input($f_siteName); ?>
                                    <div class="input-group-addon">
                                       <a href="javascript:" data-toggle = "popover" data-container = "body" title ="Site Name help." data-placcement = "bottom"
                                          data-content = "It is your brand name or company name.">
                                           <span class="glyphicon glyphicon-question-sign"></span></a>
                                   </div>
                                </div>
                                
                             </div>
                             <div class="col-lg-4 pull-right">
                                 <div class="checkbox">
                                     <?php echo form_checkbox($f_lockAll); ?><label><b>Lock all links?</b></label>
                                     <a href="javascript:" data-toggle = "popover" data-container = "body" title ="Lock All" data-placcement = "top"
                                    data-content = "All the links will be locked.">
                                     <span class="glyphicon glyphicon-question-sign"></span></a>
                                 </div>
                                 <div class="checkbox">
                                     <?php echo form_checkbox($f_deleteAll); ?><label><b>Delete all Links?</b></label>
                                     <a href="javascript:" data-toggle = "popover" data-container = "body" title = "Delete All Links?" data-placcement = "bottom"
                                    data-content = "This will delete all the linkd.Be extremely careful">
                                     <span class="glyphicon glyphicon-question-sign"></span></a>
                                 </div>
                                 <div class="checkbox">
                                     <?php echo form_checkbox($f_getTitle); ?><label><b>Display Title of web page?</b></label>
                                     <a href="javascript:" data-toggle = "popover" data-container = "body" title = "Web page title" data-placcement = "bottom"
                                    data-content = "If set true,it will display the title of the web page linked to the URL on stats page.">
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
        </div>
    </div>
</div>
<?php $this->load->view('admin_footer'); ?>