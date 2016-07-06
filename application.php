<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("lib/headUtils.php"); ?>
    <title>ABQ 30 in 30</title>
</head>
<body>

  <?php

    if (!empty($_POST['email'])) {

      $subject = "Someone Applied for Abq 30 in 30";
      $message = $_POST['email'] . " just applied to be part of Abq 30 in 30";
      $accepted = mail("someone@gmail.com", $subject, $message);

      if ($accepted) {

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

        <div class="form-group">
          <label for="inputEmail">Email</label>
          <input type="email" id="inputEmail" class="form-control" name="email"
            placeholder="joesmith@gmail.com">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Send</button>
        </div>

      </form>

    </div>

  <?php
    }
  ?>

</body>
</html>
