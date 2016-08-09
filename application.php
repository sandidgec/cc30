<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("lib/headUtils.php"); ?>
    <title>ABQ 30 in 30</title>
</head>
<body>

  <div class="container">
  <?php

    if (!empty($_POST['email'])) {

      $from = new SendGrid\Email(null, "info@cultivatingcoders.com");
      $to = new SendGrid\Email(null, "sandidgec@gmail.com");
      $subject = "Someone just applied to be part of Abq 30 in 30";
      $message = $_POST['name'] . " just applied to be part of Abq 30 in 30." .
        "Their business is called: " . $_POST['business'] . ", their email is " .
        $_POST['email'] . " and they think they should be picked because: " .
        $_POST['reason'];
      $content = new SendGrid\Content("text/plain", $message);
      $mail = new SendGrid\Mail($from, $subject, $to, $content);

      $sendgrid = new SendGrid("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");

      $response = $sendgrid->client->mail()->send()->post($mail);

      if ($response->statusCode() >= 200 && $response->statusCode() < 400) {

        ?>

        <div class="page-header text-center">
          <h1>Application sent.  You'll hear from us soon.</h1>
        </div>

        <?php

      } else {

        ?>

        <div class="page-header text-center">
          <h1>We couldn't send your application.  Please try again soon.</h1>
        </div>

        <?php
      }

    } else {

  ?>

    <div class="page-header text-center">
      <h1>ABQ Business?  Apply Now.</h1>
    </div>

    <div class="centered-form-wrapper">

      <form method="POST" action="application.php">

        <h4>Tell Us About Yourself</h4>

        <div class="form-group">
          <label for="inputName">Your Name</label>
          <input type="text" id="inputName" class="form-control" name="name"
            placeholder="Ex: John Smith">
        </div>

        <div class="form-group">
          <label for="inputBusiness">Your Business</label>
          <input type="text" id="inputBusiness" class="form-control"
            name="business" placeholder="Ex: Tom's Taquito Shack">
        </div>

        <hr />

        <h4>Why Are You Applying?</h4>

        <div class="form-group">
          <textarea class="form-control" name="reason" rows="4"></textarea>
        </div>

        <hr />

        <h4>What's Your Email?</h4>

        <div class="form-group">
          <label for="inputEmail">Email</label>
          <input type="email" id="inputEmail" class="form-control" name="email"
            placeholder="sample@gmail.com">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Send</button>
        </div>

      </form>

    </div>

  <?php
    }
  ?>
  </div>

</body>
</html>
