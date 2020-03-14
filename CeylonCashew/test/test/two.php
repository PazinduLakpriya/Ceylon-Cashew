<?php
$total = $_POST['text'];
echo $total;
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


            <div class="form-field col x-100 align-center">
                <span class="label-input100">Total</span>

                <input id="total" class="input-text js-input" type="hidden" name="total"> <?php $total = $_POST['text']; echo $total;?>
                <label class="label" name="total"></label>

            </div>


            <div class="form-field col x-100 align-center">
                <input class="submit-btn" type="submit" value="Submit">
            </div>
        </form>
    </section>
</body>

</html>