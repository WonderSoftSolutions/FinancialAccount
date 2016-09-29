
            <footer class="col-md-12 col-lg-12 col-xs-12 col-sm-12 ">
                <hr>

                <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
              
                <p>© 2016 <a href="<?php echo $this->config->item('websiteurl'); ?>" target="_blank"><?php  echo $this->config->item('website'); ?></a></p>
            </footer>
        </div>
    </div>


    <script src="themes/aircraft/lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  <?php include('_include.php'); ?>
</body></html>