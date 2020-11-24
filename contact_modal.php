<!-- Contact Modal -->

<?php
    include("send_form_email.php")
?>

    <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="contact" aria-hidden="true">
        
        <div class="modal-dialog">
                        
            <div class="modal-content">
                
                <form method="post">
                    
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button> <!-- close cross -->
                </div> <!-- end of modal header -->
                    
                <div class="modal-body">
                    <h1>Contact</h1>
                    
                    <p><span class="error">* required field.</span></p>
                    
                    <p>Either<a href="mailto:tinac343@gmail.com">email me</a>directly or fill in the form below...</p>
                    
                    <p>
                        <b>Name<sup class="error">*</sup>:</b>&nbsp;&nbsp;<span class="error"><?php echo $NameErr; ?></span><br/>
                        <input type="text" name="name" size="25" value="<?php echo $name; ?>" required />
                    </p>
                    
                    <p>
                        <b>Email<sup class="error">*</sup>:<span class="error"><?php echo $EmailErr; ?></span></b><br/>
                        <input type="email" name="email" size="25" value="" required />
                    </p>
                    
                      <p>
                        <b>Comment<sup class="error">*</sup>:</b><br/>
                        <textarea name="comment" required><?php echo $comment; ?></textarea>
                    </p>
                    
                </div> <!-- end of modal body -->
                
                <div class="modal-footer">
                    
                    <button class="btn btn-success" type="submit" name="submit">Send</button>
                    
                    <button class="btn btn-warning" data-dismiss="modal" id="reset">Cancel</button>
                </div> <!-- end of modal footer -->
                    
                </form>
            </div> <!-- end of modal-content div -->
         </div> <!-- end of modal-dialog div -->
        
    </div> <!-- end of modal div -->