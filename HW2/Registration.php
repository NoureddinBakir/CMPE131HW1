<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
</head>
    <body>
        <?php
            if (isset($_POST["username"]) && (isset($_POST["password"]))) {
                if ($_POST["username"] && $_POST["password"]) {
                    $username = $_POST["username"];
                    $password = $_POST["password"];

                    // establish connection
                    $conn = mysqli_connect("localhost", "root", "", "users");

                    // check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // register user
                    $sql = "SELECT * FROM `users_table` WHERE `username` LIKE '$username'";
                    $results = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result1) > 0) {
                            echo "<h1>This username is taken already!</h1>";
                            echo "<br>";
                            echo "<a href='../registration.html'>Please try again.</a>";
                  } else {
                        $sql = "INSERT INTO `users_table` (`username`, `password`) VALUES ('$username', '$password')";
                        $results = mysqli_query($conn, $sql);
                        if (!$results) {
                            die("Query failed: " . mysqli_error($conn));
                        }else {
                        echo "<h1>Success</h1>";
                        echo "The user has been added.";
                        echo "<br>";
                        echo "Username: " .$username;
                        echo "<br>";
                        echo "Password: " .$password;
                        }
                    }

                    // close connection
                    mysqli_close($conn);

                } else {
                    echo "<h1>Failed</h1>";
                    echo "Username or password is empty";
                }
            } else {
                echo "<h1>Failed</h1>";
                echo "Form was not submitted";
            }
        ?>
    </body>
</html>