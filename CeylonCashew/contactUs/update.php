<?php
require_once "config.php";

if (isset($_GET['id'])) {
    $sql = "SELECT * FROM customers WHERE id = ?";
    if ($stmt = $link->prepare($sql)) {
        $stmt->bind_param("i", $_GET["id"]);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows == 1) {
                $row = $result->fetch_array(MYSQLI_ASSOC);

                $param_name = $row["name"];
                $param_email = $row["email"];
                $param_subject = $row["subject"];
                $param_message = $row["message"];
            } else {
                echo "Error! Data Not Found";
                exit();
            }
        } else {
            echo "Error! Please try again later.";
            exit();
        }
        $stmt->close();
    }
} else {
    header("location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["subject"])&& !empty($_POST["message"])) {

        $sql = "UPDATE customers SET name = ?, email = ?, subject = ?, message = ? WHERE id = ?";
        if ($stmt = $link->prepare($sql)) {

            $stmt->bind_param("ssssi", $_POST["name"], $_POST["email"], $_POST["subject"],$_POST["message"], $_GET["id"]);
            $stmt->execute();
            if ($stmt->error) {
                echo "Error!" . $stmt->error;
                exit();
            } else {
                header("location: index.php");
                exit();
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
    <title>Update Customers Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="margin-top:20px;">
                        <div class="card-body">
                            <div class="page-header">
                                <h2>Update User</h2>
                            </div>
                            <p>Edit the input to update the User.</p>
                            <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" required value="<?php echo $param_name; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <textarea name="email" class="form-control" required><?php echo $param_email; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" name="subject" class="form-control" value="<?php echo $param_subject; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea name="message" class="form-control" required><?php echo $param_message; ?></textarea>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Submit">
                                <a href="index.php" class="btn btn-default">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>