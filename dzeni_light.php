<?php include "head.php"; ?>

<body>
 
    <?php include "navigation.php"; ?>


    <!-- Main Content -->
    <div class="container">
        <div class="main">
            
            <h1>Art by Dzeni | <a href="dzeni.php">Slideshow</a> | <b>Lightbox</b></h1>
            
            <!-- Light box code adapted from http://bootsnip.com/snippets/featured/bootstrap-lightbox -->
            
            <?php
                $dirname="images/tina/";
                $images = glob($dirname. "*.jpg");
            
                foreach($images as $images){
                  
                ?>
            
                <a href="#" data-toggle="modal" data-target="#lightbox">
                    <img class="gallery" src="<?php echo $images; ?> "alt="" />
                </a>
                <?php
                    } //end of 'for each' loop
            
                ?>
            
                <div id="lightbox" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <button type="button" class="close hidden" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <div class="modal-contact">
                            <div class="modal-body">
                                <img class="lightbox" src="#" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
                        
            
        </div> <!-- end of main div -->
        <p>&nbsp;</p><p>&nbsp;</p>
    </div> <!-- end of container --> <p>&nbsp;</p>  
    <?php 
        include "footer.php"; 
        include "contact_modal.php"; 
    ?>
    
</body>