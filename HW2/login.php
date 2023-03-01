<html>
    <head>
        <title>Processing File</title>
    </head>
    <body>
        <!-- <h1>Processing</h1> -->
        
        <?php
            $logged_in = false;

            if (isset($_POST["username"]) && isset($_POST["password"])) {
                if ($_POST["username"] && $_POST["password"]) {
                    $username = $_POST["username"];
                    $password = $_POST["password"];

                    // create connection
                    $conn = mysqli_connect("localhost", "root", "", "users");

                    // check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // get user
                    $sql = "SELECT password FROM students WHERE username = '$username'";

                    $results = mysqli_query($conn, $sql);

                    if ($results) {
                        $row = mysqli_fetch_assoc($results);
                        if ($row["password"] === $password) {
                            $logged_in = true;
                            $sql = "SELECT * FROM students";
                            $results = mysqli_query($conn, $sql);
                            echo "<h1>Successfully logged in</h1>";
                            echo "<br>";
                            echo "Username: " . $username;
                            echo "<br>";
                            echo "Password: " . $password;
                        } else {
                            echo "<h1>Failed to log in</h1>";
                            echo "Password incorrect or user has not been registered yet";
                        }
                    } else {
                        echo mysqli_error($conn);
                    }
                    mysqli_close($conn);

                } else {
                    echo "<h1>Failed to log in</h1>";
                    echo "Nothing was submitted or one of the fields were not filled in";
                }
            }
        ?>
        </form>
    </body>
</html>