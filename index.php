<?php

$error="";$success="";

if($_POST)
{
    if($_POST['email']=='')
    $error=$error."> Please Enter  E-Mail Address.<br>";
    
    if($_POST['password']=='')
    $error=$error."> Please Enter password.<br>";
    
    if($_POST['checkbox']!='on')
    $error=$error."> Please confirm the details. <br>";
    
    if ((!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))&&$_POST['email']) 
    $error=$error. "> Invalid Email Address<br>"; 
    
    if($error!='')
    {
        $error='<div class="alert alert-danger" role="alert"><b>There were following error(s):</b><p></p>'.$error.'</div>';
    }
    else
    {
        
        //Connecting to data base
        $link =mysqli_connect("localhost","dhairyaj_djp2803","Sonu2803#","dhairyaj_MyfirstDB");

        if(mysqli_connect_error())
        {
            $error='<div class="alert alert-danger" role="alert"><b>Failed To connect to Database. Try again later :(</b><p></p> </div>';
        }
        else
        {
            $query="INSERT INTO table2 (email,password) VALUES ('".mysqli_real_escape_string($link,$_POST['email'])."','".mysqli_real_escape_string($link,$_POST['password'])."')";
            
            mysqli_query($link,$query);
            // $headers = "MIME-Version: 1.0" . "\r\n";
            // More headers
            
            
            
            
        $to = $_POST['email'];
        $subject = "Confirmation Email";
        $message = "This mail is to verify your account being opened :)";
        
        if (mail($to,$subject,$message))
        {
            $success='<div class="alert alert-success" role="alert"><p><b> Your Account is being successfully created!<br> A confirmation email is sent to you :)</b></p></div>';
        }
       else
        {
            $error='<div class="alert alert-danger" role="alert"><b>Failed Some Internal error occured. Try again later :(</b><p></p> </div>';

        }
        
            
            
            
            
            
            // $headers .= 'From: Dhairya Patel' . "\r\n";
            // $to=$_POST['email'];
            // $subject="Confirmation Email";
            // $message="This mail is to verify your account being opened :)";
                
            //     if(mail($to,$subject,$message,$headers))
            //     {
            //         $success='<div class="alert alert-success" role="alert"><p><b> Your Account is being successfully created!<br> A confirmation email is sent to you :)</b></p></div>';
            //     }
            //     else
            //     {
            //         $error='<div class="alert alert-danger" role="alert"><b>Failed Some Internal error occured. Try again later :(</b><p></p> </div>';
       
            //     }
        }
        
    }
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <title>SIGN UP | FORM</title>

    <style>
    
    form
    {
        font-family: 'Montserrat', sans-serif;
        margin:3vw auto;
        width:50vw;
        /* background-color:red; */
        font-size:1.5vw;
    }

    input
    {
        font-size:1.2vw !important;
        height: 2.5vw !important;
    }

    small
    {
        font-size:1vw !important;
        letter-spacing: -0.04vw;
    }

    h1{
        font-weight:bold;
    }

    #checkbox
    {
        margin-top:0.1vw;
    }

    .form-check-label
    {
        font-weight:bold;
        font-size:1.2vw;
    }
    #status
    {
        font-size:1vw !important;
        letter-spacing: -0.04vw;
    }
    </style>

  </head>
  <body>


        <form method="post">
                <h1>Lets Sign Up!</h1>
                <p></p><br>

                <div id="status"> <?php echo $error; ?><?php echo $success; ?></div>

                <p></p>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <p></p><br>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                <p></p><br>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="checkbox" name="checkbox">
                  <label class="form-check-label" for="exampleCheck1">I ensure the above details.</label>
                </div>
                <p></p>
                <button type="submit" class="btn btn-primary">Submit !</button>
        </form>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/JavaScript">
    
    $("form").submit(function()
    {
            var error="";
    
            if($("#email").val()=="")
            {
                error+="> Please Enter a E-Mail Address.<br>";
            }
    
            if($("#password").val()=="")
            {
                error+="> Please Enter password.<br>";
            }
    
            if(!$("#checkbox").is(':checked'))
            {
                error+="> Please confirm the details. <br>";
            }
    
            if(error=="")
            {
                return true;
            }
            else
            {
                $("#status").html('<div class="alert alert-danger" role="alert"><b>There were following error(s):</b><p></p>'+error+'</div>');
                return false;
            }
           
    });     

    </script>
  </body>
</html>