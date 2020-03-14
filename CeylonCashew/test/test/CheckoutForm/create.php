<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['total']) && isset($_POST['subject']) && isset($_POST['message']) && isset($_POST['address']) && isset($_POST['zip']) && isset($_POST['telephone']) && isset($_POST['country'])) {

        $sql = "INSERT INTO checkout (name,email,total,subject,message,address,zip,telephone,country) VALUES (?,?,?,?,?,?,?,?,?)";
        if ($stmt = $link->prepare($sql)) {
            $stmt->bind_param("ssssssiss", $_POST['name'], $_POST['email'], $_POST['total'], $_POST['subject'], $_POST['message'], $_POST['address'], $_POST['zip'], $_POST['telephone'], $_POST['country']);
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
    <h1>we will send you confirmation mail to this email</h1>
    <section class="get-in-touch">
        <h1 class="title">Get in touch</h1>
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" class="contact-form row">

            <div class="form-field col x-50">
                <span class="label-input100">Name</span>
                <input id="name" class="input-text js-input" type="text" placeholder="Enter your name" name="name" required>
                <label class="label" name="name"></label>
            </div>

            <div class="form-field col x-50">
                <span class="label-input100">Email</span>
                <input id="email" class="input-text js-input" type="email" placeholder="Enter your email" name="email" required>
                <label class="label" name="email"></label>
            </div>

            <div class="form-field col x-100 align-center">
                <span class="label-input100">Total</span>
                <?php $total = $_POST['text'];?>
                <input id="total" class="input-text js-input" type="test" name="total"  value="<?php echo $total; ?>" readonly>
                <label class="label" name="total"></label>
 
            </div>

            <div class="form-field col x-100">
                <span class="label-input100">Subject</span>
                <input id="subject" class="input-text js-input" type="text" placeholder="Enter your subject" name="subject" required>
                <label class="label" name="subject"></label>
            </div>

            <div class="form-field col x-100">
                <span class="label-input100">Message</span>
                <input id="message" class="input-text js-input" type="text" placeholder="Enter your message" name="message" required>
                <label class="label" name="message"></label>
            </div>

            <div class="form-field col x-50">
                <span class="label-input100">Address</span>
                <input id="state" class="input-text js-input" type="text" placeholder="Enter your Address" name="address" required>
                <label class="label" name="address"></label>
            </div>

            <div class="form-field col x-50">
                <span class="label-input100">Zip Code</span>
                <input id="zip" class="input-text js-input" type="number" placeholder="Enter your Zip Code" name="zip" required>
                <label class="label" name="zip"></label>
            </div>

            <div class="form-field col x-50">
                <span class="label-input100">Telephone</span>
                <input id="telephone" class="input-text js-input" type="text" placeholder="Enter your Telephone Number" name="telephone" maxlength="12" required>
                <label class="label" name="telephone"></label>
            </div>

            <div class="form-field col x-50">
                <span class="label-input100">Country</span>

                <!-- <input id="country" class="input-text js-input" name="country" required> -->



                <select id="country" class="input-text js-input" name="country" required>
                    <option selected></option>
                    <option>IND</option>
                    <option>USA</option>
                    <option>UK</option>
                    <option>AUS</option>
                </select>
                <!-- <label class="label" name="country">Country</label> -->
                <label class="label" name="country"></label>
            </div>


            <div class="form-field col x-100 align-center">
                <input class="submit-btn" type="submit" value="Submit">
            </div>
        </form>
    </section>
</body>

</html>