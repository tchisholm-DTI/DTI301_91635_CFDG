<?php include "head.php"; ?>

<body>
 
    <?php include "navigation.php"; ?>


    <!-- Main Content -->
    <div class="container">
        <div class="main">
            
            <h1>Frequently Asked Questions</h1>
            
            <h3>What is a Regular Expression?</h3>
            
            <p>
                A regular experession is a piece of code which can be used to check that data matches an expected pattern. Regular expressions are 'cheap' to use and are a great way for checking that user input is valid. For example, in the form on this site, if users try and enter a name which contains numbers, the problem is identified by a regular expression and and error is generated.
            </p>
            
            <p>
                Having said that, regular expressions are limited, they cannot 'loop' and can't be used to check a full date (dd/mm/yyyy). Whilst a regular expression can check for a date like pattern, it is not able to make sure that the date is valid (eg: 29/02/2017 is invalid - but a regular expression would not be able to detect this).
            </p>
            
            <p>
                Regular expressions cannot be used to ensure that an expression which includes brackets has been well formed (ie: it can't check that all open brackets are closed).
            </p>
            
            <h3>What is a Context Free Grammar?</h3>
            <p><i><b>Source: </b>https//en.wikipedia.org/wiki/Context-free_grammar#Well-formed_parentheses</i></p>
            
            <p>
                A Context Free Grammar is both more expensive and more powerful than a regular expression. Context Free Grammars can be used to describe all possible strings in a formal language, included those which have brackets. Unlike regular expressions, context free grammars cope well with recursion.
            </p>
            
            <p>
                A grammar is 'context free' when the relationship is one to one, one to many or one to none (many to one relationships are not allowed). One interesting thing about context free grammars is that rules can be applied in reverse to check that they are valid.
            </p>
            
            <p>
                Note that not all languages can be described by context free grammars.
            </p>
            
            <h3>What is a Context Sensitive Grammar?</h3>
            
            <p>
                The short version is that context sensistive grammars are more general than context free grammars but less general than an unrestricted grammar. At this stage, we really don't want to go further than this! Unless you are a fan of formal languages and can get your head around the notation associated with them. In that case you can <a href="https://en.wikipedia.org/wiki/Context-sensitive_grammar" target="_blank"> read more </a> at the preceding link.
            </p>
            
            
           
           
        </div> <!-- end of main div -->
        <p>&nbsp;</p><p>&nbsp;</p>
    </div> <!-- end of main container --> <p>&nbsp;</p>  
    <?php 
        include "footer.php"; 
        include "contact_modal.php"; 
    ?>
    
</body>