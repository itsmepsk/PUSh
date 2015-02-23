<?php $this->load->view('header',$details); ?>
    <div class="<?php if($success == 1) { echo "success";} else { echo "fail"; }?> panel panel-primary">
        <h1><p class="text-center"><?php echo $content; ?></p></h1>
        <p><?php echo $message; ?></p>
        <div class="another">
        <a href = '<?php echo $button_url; ?>'>
            <button type="button" name="shorten" value="<?php echo $button; ?>">
                <?php echo $button; ?>
            </button>
        </a>
        </div>                
    </div> 
<?php $this->load->view('footer'); ?>

