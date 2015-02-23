<?php $this->load->view('header',$details); ?>
    <div class="panel panel-primary">
            <?php
                $data = array(
                    'type'      =>      'text',
                    'name'      =>      'shortened_url',
                    'value'     =>     strip_tags($shortened_url),
                    'class'     =>      'form-control'
                );
            ?>
        <h1><p class="text-center">Success!</p></h1>
        <div class="input-group">
            <div class="input-group-addon"><span class="glyphicon glyphicon-link"></span></div>

            <input type = "text" id = "short_url" onclick="selectAll('short_url')" class="form-control" size="200" maxlength="<?php echo strlen($shortened_url); ?>" value="<?php echo $shortened_url; ?>">
        </div>
        <p class="text-warning text-center">Click above box to select and then use<br> <code>Ctrl + C</code> to copy.</p>
        <div class="another">
        <a href = '<?php echo base_url()/*site_url('shorten','index')*/; ?>'>
            <button type="button" name="shorten" value="Shorten Another">
                Shorten Another
            </button>
        </a>
        </div>                
    </div> 
<?php $this->load->view('footer'); ?>
