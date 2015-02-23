<?php $this->load->view('admin_header',$details); ?>
<div class="row">
    <div class="col-lg-2">
        <?php $this->load->view('sidebar'); ?>
    </div>
    <div class="col-lg-7">
        <div class="panel panel-default content">
            <div class="panel panel-body">
                <div class="row">
                    <!--
                    <div class="col-lg-6">
                        Other
                    </div>
                    -->
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel panel-heading">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <span>Links</span>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="links-dropdown">
                                            <a class="accordion-toggle" data-toggle = "collapse" data-parent="#accordion" href="#panel1"><span class="glyphicon glyphicon-chevron-down"></span></a>
                                        </div> 
                                    </div>
                                </div>
                            </div>

                            <div id="panel1" class="panel-collapse open">
                                <div class="panel panel-body">
                                    <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th class="col-lg-1">
                                                #
                                            </th>
                                            <th class="col-lg-3">
                                                Original URL
                                            </th>
                                            <th class="col-lg-3">
                                                Shotened URL
                                            </th>
                                            <th class="col-lg-1">
                                                Hits
                                            </th>
                                            <th class="col-lg-1">
                                                <span class="glyphicon glyphicon-lock" title="Disabled"></span>
                                            </th>
                                            <th class="col-lg-3">
                                                Actions
                                            </th>
                                        </tr>
                                        <?php
                                            $count = 1;
                                            foreach($table as $row) {
                                        ?>
                                                <tr>
                                                   <td>
                                                    <?php
                                                        echo $count;
                                                    ?>
                                                    </td>
                                                    <td>
                                                    <?php
                                                        if(strlen($row->original_url) > 30) {
                                                            echo "<a href = '$row->original_url' target = '_blank'>".  substr($row->original_url,0, 30)."....</a>";
                                                        }
                                                        else {
                                                            echo auto_link($row->original_url);
                                                        }  
                                                    ?>
                                                    </td>
                                                    <td>
                                                    <?php
                                                        $url = base_url();
                                                        $url.= $row->shortened_url;
                                                        if(strlen($row->shortened_url) > 20) {
                                                            echo "<a href = '$url' target = '_blank'>".  substr($row->shortened_url,0, 20) ."....</a>";
                                                        }
                                                        else {
                                                            echo "<a href='$url' target = '_blank'>$row->shortened_url</a>";
                                                        }  
                                                    ?>
                                                    </td>
                                                    <td>
                                                    <?php
                                                        echo $row->hits;
                                                    ?>
                                                    </td>
                                                    <td>
                                                    <?php
                                                        if($row->disable == 1) {
                                                            echo "Yes";
                                                        }
                                                        else {
                                                            echo "No";
                                                        }
                                                    ?>
                                                    </td>
                                                    <td>
                                                    <?php
                                                        $e_url = base_url()."admin/edit/".$row->shortened_url;
                                                        $s_url = base_url()."admin/view/".$row->shortened_url;
                                                        $d_url = base_url()."admin/delete/".$row->shortened_url;
                                                    ?>
                                                    <a href = "<?php echo $s_url; ?>" title = "stats"><span class = "icon glyphicon glyphicon-list-alt"></span></a>
                                                    <a href = "<?php echo $e_url; ?>" title = "edit"><span class = "icon glyphicon glyphicon-pencil"></span></a> 
                                                    <a href = "<?php echo $d_url; ?>" id = "delete" onclick = "return window.confirm('Are you sure you want to delete?')"  title = "Delete"><span class = "icon glyphicon glyphicon-trash"></span></a>
                                                    </td>
                                                </tr>
                                                <?php $count++; ?>
                                        <?php       
                                            }
                                        ?>
                                    </table>
                                </div>
                                </div>
                                <ul class="pagination align pull-right">
                                    <?php 
                                        $base = base_url();
                                        $base.= "admin/links/";
                                        $end = ($url_count/10);
                                        if($url_count%10 != 0) {
                                            $end++;
                                        }
                                        for($i=1;$i<=$end;$i++) {
                                            $link = $base;
                                            $link.=$i;
                                            if($i == $active) {
                                                echo "<li class = 'active'>";
                                            }
                                            else {
                                                echo "<li>";
                                            }
                                                echo "<a href = '$link'>$i</a>";
                                            echo "</li>";
                                        }
                                    ?>                                               
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin_footer'); ?>