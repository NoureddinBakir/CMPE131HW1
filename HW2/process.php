<html>
    <head>
        <title>Processing File</title>
    </head>
    <body>
        <!-- <h1>Processing</h1> -->
        
        <?php
            if (isset($_POST["username"]) && (isset($_POST["password"]))) {
                if ($_POST["username"] && $_POST["password"]) {
                    
                    $username = $_POST["username"];
                    $password = $_POST["password"];

                    // create connection
                    $conn = mysqli_connect("localhost", "root", "", "users");

                    // check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // register user
                    $sql = "INSERT INTO students (username, password) VALUES ('$username', '$password')";
                    $results = mysqli_query($conn, $sql);

                    if ($results) {
                        echo "<h1>Success</h1>";
                        echo "The user has been added.";
                        echo "<br>";
                        echo "Username: " .$username;
                        echo "<br>";
                        echo "Password: " .$password;
                    } else {
                        echo "<h1>Failed</h1>";
                        echo mysqli_error($conn);
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
        </form>
    </body>
</html>