<?php include "head.php"; ?>

<body>
 
    <?php include "navigation.php"; ?>


    <!-- Main Content -->
    <div class="container">
        <div class="main">
            
            <h1>Art by Dzeni | <b>Slideshow</b> | <a href="dzeni_light.php">Lightbox</a></h1>
        
        <div class="row">
        <div id='carousel-custom'class='carousel slide' data-ride='carousel' data-interval="3000">
        <div class="col-md-10">
      
            <div class='carousel-outer'>
                
            <!-- Wrapper for slides -->
            <div class='carousel-inner'>
                
            <!-- code pulls .jpgs from folder -->
            <?php
                $dirname = "images/tina/";
                $images = glob($dirname."*.jpg");
                $count=0;
                
                foreach($images as $image)
                //echo $image NOT $images to avoid array error
                {
                    if($count == 0)
                    {
                        echo "<div class='item active'><img class='img-responsive' src='";
                        echo $image;
                        echo "' alt=''/></div>";
                        
                        $count = $count+1;
                    }
                    
                    else{
                         echo "<div class='item'><img class='img-responsive' src='";
                        echo $image;
                        echo "' alt=''/></div>";
                        
                        $count = $count+1;   
                    }
                    
                }
            ?>
            <!-- end folder pulling code -->       
            </div> <!-- end carousel inner -->
                
            <!-- Controls -->
                <a class='left carousel-control' href='#carousel-custom' data-slide='prev'> <span class='glyphicon glyphicon-chevron-left'></span>
                </a>
                
                <a class='right carousel-control' href='#carousel-custom' data-slide='next'> <span class='glyphicon glyphicon-chevron-right'></span>
                </a>
                
            </div> <!-- end carousel-outer -->
            
              </div> <!-- end slide show column -->
            
        <div class="col-md-2">
        
            <div class="indicators">
            <!-- Indicators -->
                
            <ol class="carousel-indicators">
            <?php
                $slide_count=0;
                foreach($images as $image)
                {
                    echo "<li data-target='#carousel-custom' data-slide-to='"; echo $slide_count;
                    echo "' class='active'><img class='little' src='";
                    echo $image;
                    echo "' alt='' /></li>";
                    
                    $slide_count=$slide_count+1;
                }
                
            ?>
             
               
            </ol>
                
            </div> <!-- end indicators div -->
        </div> <!-- end thumbnail indicator column -->    
        </div> <!-- end carousel custom div -->
            
            </div><!--end of row -->              
        </div> <!-- end of main div -->
        <p>&nbsp;</p><p>&nbsp;</p>
    </div> <!-- end of container --> <p>&nbsp;</p>  
    <?php 
        include "footer.php"; 
        include "contact_modal.php"; 
    ?>
    
</body>