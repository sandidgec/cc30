<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("lib/headUtils.php"); ?>
    <title>ABQ 30 in 30</title>
</head>
<body>

<div class="col-md-12">

    <!-- Main Jumbotron -->
    <div class="container main-content">
        <div class="col-md-12">
            <h1 class="text-center"><span class="text-white">Apply to be one of our ABQ30in30 businesses. </span></h1>
            <?php
            if(isset($_POST["submit"])) {

                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                if(empty($email)) {
                    $errEmail = "Please enter a valid email address.";
                }

                $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
                if(empty($message)) {
                    $errMessage = "Please enter a message.";
                }

                $from = "$email";
                $to = "cashley@cultivatingcoders.com, charles@cultivatingcoders.com";
                $subject = "Message from $email about Cultivating Coders";

                $body = "$message" . PHP_EOL;

                // If there are no errors, send the email
                if(!isset($errName) && !isset($errEmail) && !isset($errMessage)) {
                    if(mail($to, $subject, $body, $from)) {
                        $result = '<br/><div class="alert alert-success" role="alert">Thanks, we\'ll be in touch!</div>';
                    } else {
                        $result = '<div class="alert alert-danger" role="alert">There was an error sending your message. Please try again later.</div>';
                    }
                }
            }
            ?>
            <form method="post" action="index.php" class="col-md-6 col-md-offset-3"
                  id="contactForm" name="contactForm">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    <?php if(isset($errEmail)) {
                        echo "<p class='alert alert-danger' role='alert'>$errEmail</p>";
                    } ?>
                </div>
                <div class="form-group">
                    <label for="message">Why should you be a 30in30 Business?</label>
                    <textarea class="form-control" id="message" name="message" rows="3" placeholder="Message"></textarea>
                    <?php if(isset($errMessage)) {
                        echo "<p class='alert alert-danger' role='alert'>$errMessage</p>";
                    } ?>
                </div>
                <button class="btn btn-success" id="submit" name="submit" type="submit">Send</button>
                <div class="form-group">
                    <?php if(isset($result)) {
                        echo $result;
                    } ?>
                </div>
            </form>

        </div>
    </div>
</div>

</div>

</form>
</body>
</html>