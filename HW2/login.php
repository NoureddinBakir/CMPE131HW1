<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log In Page</title>
</head>
    <body>
        <?php
            $logged_in = false;

            if (isset($_POST["username"]) && isset($_POST["password"])) {
                if ($_POST["username"] && $_POST["password"]) {
                    $username = $_POST["username"];
                    $password = $_POST["password"];

                    // establish connection
                    $conn = mysqli_connect("localhost", "root", "", "users");

                    // check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // query user existence
                    $sql = "SELECT * FROM `users_table` WHERE `username` LIKE '$username'";
                    $results = mysqli_query($conn, $sql);
                    if ($results) {
                        $row = mysqli_fetch_assoc($results);
                        if ($row["password"] === $password) {
                            $logged_in = true;
                            $sql = "SELECT * FROM students";
                            $results = mysqli_query($conn, $sql);
                            echo "<h1>Success! Logged in</h1>";
                        } else {
                            echo "<h1>Failed! Not log in</h1>";
                            echo "Password incorrect or user has not been registered yet";
                        }
                    } else {
                        echo mysqli_error($conn);
                    }
                    mysqli_close($conn);
                } else {
                    echo "<h1>Failed! Not log in</h1>";
                    echo "Error! Nothing submitted, please try again";
                }
            }
        ?>
    </body>
</html>