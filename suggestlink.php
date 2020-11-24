<?php include "head.php"; 

$name="";
$email="";
$linkname="";
$linkurl="http://";
$humanproof="";

$NameErr= $EmailErr = $HumanErr = "";

$HasErrors="no";

//Code below executes when the form is submitted...
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    //get input from form and sanitise it
    $name = $_POST["name"];
    $email = $_POST["email"];
    $linkname = $_POST["linkname"];
    $linkurl = $_POST["linkurl"];
    $humanproof = $_POST["humanproof"];
    
    //Check that name has letters/spaces only
    if(!preg_match("/^[A-Za-z\s]{1,50}$/", $name))
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
    
    if($humanproof!=30)
    {
        $HumanErr = "Please prove you are human. Hint 3 x 10 = 30";
        $HasErrors="yes";
    }
    
    //If everything is OK, add link to page and generate email
    
    if($HasErrors =="no") {
        
        $file = 'contriblinks.php';
			$newlink = "<a href='".$linkurl."'>".$linkname."</a><br />";
			file_put_contents($file, $newlink, FILE_APPEND | LOCK_EX);
        
    //Generate email to site owner notifying them that new content has been uploaded.
        
    $to = "tinac343@gmail.com";
    $subject = "CFDG new link added";
        
    $message = 'Name:'.$name. '<br /><br/>Email:'.$email.'<br /><br />Link Added: '.$newlink;
        
     //Always set content-type when sending HTML email
    $headers='MIME-Version: 1.0' . "";
    $headers .='Context-type: text/html;
    charset=iso-8859-1' . "";
    $headers .= "From: $email";
        
    mail($to, $subject, $message, $headers);
        
    header('Location:links.php');
        
    }
    
}
?>

<body>
 
    <?php include "navigation.php"; ?>


    <!-- Main Content -->
    <div class="container">
        <div class="main">
            
            <h1>Add a link</h1>
            
            <p>
                You are invited to add a link to our 'links' page. Please read the link guidelines below.
            </p>
            
            <h2>The Guidelines</h2>
            
            <ul>
                <li>Please only add art related links</li>
                <li>Be careful! If you mess this up you will need to contact us to remove the incorrect/broken link</li>
            </ul>
            
            <h2>Add a link</h2>
            
            <p>
                Fields marked with an <sup class="required">*</sup> are required.
            </p>
            
            <form method="post" action="<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                
            <p>
                <b>Name<sup class="required">*</sup></b>:&nbsp;&nbsp;<span class="error"><?php echo $NameErr; ?></span><br />
                <input type="text" name="name" size="25" value="<?php echo $name; ?>" required />
            </p>
                
            <p>
                <b>Email<sup class="error">*</sup>:</b>&nbsp;&nbsp;<span class="error"><?php echo $EmailErr; ?></span><br />
                <input type="email" name="email" size="25" value="<?php echo $email; ?>" required />
            </p>
                
                
            <p>
                <b>Link Name<sup class="required">*</sup></b>:<br />
                <input type="text" name="linkname" size="25" value="<?php echo $linkname; ?>" required />
            </p>
                
            <p>
               <b>Link URL<sup class="required">*</sup></b>:<br />
                <input type="url" name="linkurl" size="25" value="<?php echo $linkurl; ?>" required />
            </p>
                
            <p>
                <b>Prove you are Human<sup class="required">*</sup></b>: What is three times ten? &nbsp;&nbsp;<span class="error"><?php echo $HumanErr; ?></span><br />
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