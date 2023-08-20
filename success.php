<!DOCTYPE html>
<html>
    <head>
        <title>Form Submission Success</title>
    </head>
    <body>
    <h1>Form Submitted Successfully!</h1>
    <?php
    if (!empty($success_message)) {
        echo "<p>$success_message</p>";
    }
    ?>
    <p><a href="index.php">Go back to form</a></p>
    </body>
</html>