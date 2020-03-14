<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {

        $sql = "INSERT INTO customers (name,email,subject,message) VALUES (?,?,?,?)";
        if ($stmt = $link->prepare($sql)) {
            $stmt->bind_param("ssss", $_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message']);
            if ($stmt->execute()) {
                // header("location: index.php");
                header("location: /CeylonCashew/ThankYou/index.html");
                exit();
            } else {
                echo "Error! Please try again later.";
            }
            $stmt->close();
        }
    }

    $link->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Page</title>
    <link rel="stylesheet" href="ContactUs.css">
    <!-- <script src="ContactUs.js"></script> -->
</head>

<body>
    <section class="get-in-touch">
        <h1 class="title">Get in touch</h1>
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" class="contact-form row">

            <div class="form-field col x-50">
                <span class="label-input100">Name</span>
                <input id="name" class="input-text js-input" type="text" placeholder="Enter your name" name="name" required>
                <!-- <label class="label" name="name">Name</label> -->
            </div>
            <div class="form-field col x-50">
            <span class="label-input100">Email</span>
                <input id="email" class="input-text js-input" type="email" placeholder="Enter your email" name="email" required>
                <!-- <label class="label" name="email">E-mail</label> -->
            </div>
            <div class="form-field col x-100">
            <span class="label-input100">Subject</span>
                <input id="subject" class="input-text js-input" type="text" placeholder="Enter your subject" name="subject" required>
                <!-- <label class="label" name="subject">Subject</label> -->
            </div>
            <div class="form-field col x-100">
            <span class="label-input100">Message</span>
                <input id="message" class="input-text js-input" type="text" placeholder="Enter your message" name="message" required>
                <!-- <label class="label" name="message">Message</label> -->
            </div>
            <div class="form-field col x-100 align-center">
                <input class="submit-btn" type="submit" value="Submit">
            </div>
        </form>
    </section>
</body>

</html>