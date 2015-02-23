<html>
    <head>
        <title>
            URL Shortener
        </title>
    </head>
    <body>
        <h1>
            URL Shortener
        </h1>
        <?php
            echo validation_errors();
            echo form_open('/shorten/process');
            $url = array(
                'name'      =>      'url',
                'id'        =>      'id',
                'value'     =>      ''
            );
            
            $submit = array(
                'name'      =>      'shorten'
            );
        ?>
        <?php 
            if($state == 0) {
        ?>
        <label>Enter URL</label>
        <?php
                echo form_input($url);
                echo validation_errors();
                echo form_submit($submit,'Shorten');
                echo form_close();
            }
        ?>
        <?php
            if($state == 1) {
                echo validation_errors();
                echo "Shortened URL for <br/>";
                echo auto_link($original_url);
                echo "<br/>is ";
                echo auto_link(base_url()."/".$shortened_url);
            }
         ?>
        <br>
        <br>
        <?php
            echo "Shorten another URL";
        ?>
        <a href = '<?php base_url(); ?>'>
            <button type="button" name="shorten" value="Shorten Another">
                Shorten
            </button>
        </a>
    </body>
</html>