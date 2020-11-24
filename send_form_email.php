<?php
    //define variables and set to empty values
    $name="";
    $email="";
    $comment="";
    
    $HasErrors="no";

    $NameErr = $EmailErr = "";
    ?>
    <!-- clears form if cancel button pushed -->
    <script>
            
        $(document).ready(function() {
            $("#reset").click(function)(){
                location.href="";
            });
        })
    </script>   
    <?php
    
        if(isset($_POST['submit'])){
            
        function test_input($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
        }
            
        // start PHPmailer
            function smtpmailer($to, $from, $from_name, $subject, $body) { 
	   require_once('/var/www/PHPMailer/PHPMailerAutoload.php');
	   define('GUSER', 'tinac343@gmail.com'); // GMail username
	   define('GPWD', 'npxrcnwfwcdofdke'); //Gmail password. it would be a good idea to use an app specicfic password here

	   $mail = new PHPMailer();  // create a new object
	   $mail->IsSMTP(); // enable SMTP
	   $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
	   $mail->SMTPAuth = true;  // authentication enabled
	   $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
	   $mail->Host = 'smtp.gmail.com';
	   $mail->Port = 465; 
	   $mail->Username = GUSER;  
	   $mail->Password = GPWD;  
	   $mail->AddReplyTo($from, $from_name);
	   $mail->SetFrom($from, $from_name);
	   $mail->Subject = $subject;
	   $mail->isHTML(true);
	   $mail->Body = $body;
	   $mail->AddAddress($to);
	   if(!$mail->Send()) {
		//$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	   } else {
		return true;
	   }
            }
        // end PHPmailer
            
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
        //get input from form and sanitise it
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $comment = test_input($_POST["comment"]);
        
        // Check that name has letters/spaces only
        if(!preg_match("/^[A-Aa-z\s]{1,50}$/", $name))
        {
            $NameErr = "Name should only contain letters and spaces";
            $HasErrors = "yes";
        }
        //Check email is valid (works more reliably than only html5 email type)
        
        if(!filter_var($_REQUEST['email'],FILTER_VALIDATE_EMAIL))
        {
            $EmailErr = "Please enter a valid email address";
            $HasErrors = "yes";
        }
            
        if($HasErrors =="yes")
        {
        // reopen form and show errors
        ?>
        <script>
            $(function() {
            $('#contact') .modal('show');
            });
        </script>
            

        <?php
        }
        else{
            
            
        //Send Email Message
        
        
        $to = "tinac343@gmail.com";
        $subject = "CFDG Feedback";
            
        $message = 'Name:' .$name. '<br/><br/>Email:&nbsp' .$email.
            '<br/><br/>Comment: ' .$comment;
            
        //calls function to send email
        smtpmailer($to, $from, $name, $subject, $message);
            
            
        // reset fields so they are blank the next time the modal is opened
        $name="";
        $email="";
        $comment="";
        
        }
            
        }
            }
?>
