<!DOCTYPE html>
<html>
    <head>
        <title>Contact Form</title>
    </head>
<body>
    <h1>Contact Form</h1>

    <?php
    if(isset($_GET['success']) && $_GET['success'] == 'true'){
        echo "<p>Form submitted successfully.";
    }
    ?>
    <form method="post" action="form.php">
        <label for="full_name">Full Name</label><span class="error">*</span><br>
        <input type="text" id="full_name" name="full_name" required><br><br>

         <label for="phone_number">Phone Number</label><span class="error">*</span><br>
        <input type="text" id="phone_number" name="phone_number" required><br><br>

         <label for="email">Email</label><span class="error">*</span><br>
        <input type="email"  id="email" name="email" required><br><br>

         <label for="subject">Subject</label><span class="error">*</span><br>
        <input type="text"  id="subject" name="subject" required><br><br>

         <label for="message">Message</label><span class="error">*</span><br>
        <textarea type="text"  id="message" name="message" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>

<style>
    .error{
        color:red;}
</style>