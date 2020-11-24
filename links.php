<?php include "head.php"; ?>

<body>
 
    <?php include "navigation.php"; ?>


    <!-- Main Content -->
    <div class="container">
        <div class="main">
            <h1>Links</h1>
            
            <p>
                This page is highly experimental and users are able to <a href="suggestlink.php">automatically add links</a>. Whilst we will do our best to moderate/check links, if you see something that is just plain wrong, please <a href="#contact" data-toggle="modal">let us know</a>.
            </p>
            
            <?php include "contriblinks.php"; ?>
            
        </div> <!-- end of main div -->
        <p>&nbsp;</p><p>&nbsp;</p>
    </div> <!-- end of main container --> <p>&nbsp;</p>  
    <?php 
        include "footer.php"; 
        include "contact_modal.php"; 
    ?>
    
</body>