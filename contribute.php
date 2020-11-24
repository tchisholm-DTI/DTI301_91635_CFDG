<?php include "head.php"; 
$artist_name="";
$email="";
$fileToUpload="";
$humanproof="";
$target_file="";

$NameErr = $EmailErr = $ImageErr = $HumanErr = "";

$HasErrors="no";

//Code below executes when the form is submitted...
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    //Get values from form...
    $artist_name = $_POST["artist_name"];
    $email = $_POST["email"];
    $humanproof = $_POST["humanproof"];

    //Error Checking goes below...

    //Check that name is letters/spaces only
    if(!preg_match("/^[A-Za-z\s]{1,50}$/", $artist_name))
    {
        $NameErr = "Name should only contain letters and spaces";
        $HasErrors="yes";
    }
    
    //Check email is valid (works more reliably than only html5 email type)
    
    if(!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL))   
    {
        $EmailErr = "Please enter a valid email address";
        $HasErrors = "yes";
    }
    
    if($humanproof!=20)
    {
        $HumanErr = "Please prove you are human. Hint 5 x 4 = 20";
        $HasErrors="yes";
    }
    
    //do the following if the image is not blank...
    if ($_FILES['fileToUpload'] ['name']!=""){
        
    //Assign a unique id so that each file uploaded is unique
    $target_file = uniqid()."_".basename($_FILES["fileToUpload"] ['name']);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    echo "File type".$imageFileType;
    
    //Check that the image is a .jpg
    if($imageFileType !="jpg"){
        $ImageErr = "Sorry, only JPG files are allowed";
        $HasErrors = "yes";
    }
    
    //Check that the file is less than 500 Kb
    if($_FILES["fileToUpload"]["size"] > 500000) {
        $ImageErr= "Sorry, your file is too large.";
        $HasErrors="yes";
    }
    } //end of image checking 'if not blank'
    
    //Else give 'image can't be blank error'
    else{
        $ImageErr="Please choose an image";
        $HasErrors="yes";
    }
    
    //If everything is OK - put image into 'guest' folder (in images)
    if($HasErrors =="no") {
        
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "images/guest".'/'.$target_file);
    
    //Generate email to site owner notifying them that new content has been uploaded.
        
        $to = "tinac343@gmail.com";
        $subject = "CFDG Guest Gallery Upload";
        
        $message = 'Name:'.$artist_name. '<br /><br/>Email:'.$email.'<br /><br />File Uploaded: '.$target_file;
        
        //Always set content-type when sending HTML email
        $headers='MIME-Version: 1.0' . "";
        $headers .='Context-type: text/html;
        charset=iso-8859-1' . "";
        $headers .= "From: $email";
        
        mail($to, $subject, $message, $headers);
        
        header('Location:contribute_success.php');
        
       
        
    }

}

?>

<body>
 
    <?php include "navigation.php"; ?>


    <!-- Main Content -->
    <div class="container">
        <div class="main">
            
            <h1>Contribute</h1>
            <p>
                You are welcome to add your work to the guest gallery / slide show. Please make careful note of the submission guidelines. Material which does not meet the guidelines will be removed.
            </p>
            
            <h2>The Guidelines!!</h2>
            <ul>
                <li>By pushing the 'submit' button in the form below you confirm that you created the image and want it to appear on the site.
                </li>
                <li>Please only submit images which were made using cfdg. The gallery is for 'pure' CFDG images (no post processing please).    
                </li>
                <li>We don't require high resolution images for the gallery, files should be less than 500 kb in size.
                </li>
                <li>Please choose your best work. Ideally images should be signed so that users can see who the artist is.
                </li>
                <li>Images which are too wide will not display correctly in the slideshow. To show your images as intended, please make sure that the width divided by the height is less than 1.5
                </li>
            </ul>
            
            <h2>Submit an image</h2>
            
            <p>Fields marked with an <sup class="required">*</sup>are required.</p>
            
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                
            <p>
                <b>Name<sup class="required">*</sup></b>:
                &nbsp;&nbsp;<span class="error"><?php echo $NameErr; ?></span><br/>
                <input type="text" name="artist_name" size="25" value="<?php echo $artist_name; ?>"required />
            </p>
                
            <p>
                <b>Email<sup class="error">*</sup>:</b>
                &nbsp;&nbsp;<span class="error"><?php echo $EmailErr; ?></span><br/>
                <input type="email" name="email" size="25" value="<?php echo $email; ?>"required />
            </p>
                
            <p>
                <b>Artwork</b>
                <input type="file" name="fileToUpload" id="fileToUpload" /> &nbsp;&nbsp;<span class="error"><?php echo $ImageErr;?></span>
            </p>
                
            <p>
                <b>Prove you are Human<sup class="required">*</sup></b>: What is four times five? &nbsp;&nbsp;<span class="error"><?php echo $HumanErr; ?> </span><br />
                <input type="text" name="humanproof" size="25" value="<?php echo $humanproof; ?>" required />
            </p>
                
            <p>
                <input type="submit" value="Submit" />
            </p>
                
            </form>
                    
        </div> <!-- end of main div -->
        <p>&nbsp;</p><p>&nbsp;</p>
    </div> <!-- end of main container --> <p>&nbsp;</p>  
    <?php 
        include "footer.php"; 
        include "contact_modal.php"; 
    ?>
    
</body>