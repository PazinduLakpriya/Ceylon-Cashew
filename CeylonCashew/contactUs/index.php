<?php
require_once "config.php";
$sql = "SELECT * FROM customers";
$result = $link->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PHP CRUD : All Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .btn {
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="margin-top: 20px;margin-bottom: 20px;">
                        <div class="card-body">
                            <h2 class="pull-left">User Details <a href="create.php" class="btn btn-success pull-right">Add New User</a></h2>
                            <h6>Find more interesting tutorials at <a href="https://bishrulhaq.com/">bishrulhaq.com</a></h6>
                        </div>
                    </div>
                    <?php
                    if ($result->num_rows > 0) {
                        echo "<table class='table table-bordered table-striped'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>#</th>";
                        echo "<th>Name</th>";
                        echo "<th>Email</th>";
                        echo "<th>Subject</th>";
                        echo "<th>Message</th>";
                        echo "<th>Action</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['subject'] . "</td>";
                            echo "<td>" . $row['message'] . "</td>";
                            echo "<td>";
                            echo "<a href='read.php?id=" . $row['id'] . "' class='btn btn-primary'>Read</a>";
                            echo "<a href='update.php?id=" . $row['id'] . "' class='btn btn-info'>Update</a>";
                            echo "<a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                        // Free result set
                        $result->free();
                    } else {
                        echo "<p class='lead'><em>No records were found.</em></p>";
                    }
                    $link->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>