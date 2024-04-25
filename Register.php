<?php

$servername = "localhost";
$username = "ainogomi!";
$password = "ainogomi!";
$dbname = "football";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "INSERT INTO users (username, email, password)
  VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="main.css">

    <title>Register to Football Scouting Agency!</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            padding: 0;
            background-color: #333;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        #wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 10px;
            width: 40%;
            border: 2px solid #fff;
            background-color: #333;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.1);
        }

        #menu {
            display: flex;
            justify-content: space-around;
            padding: 10px;
            margin-top: 40px;
            width: 100%;
            list-style-type: none;
            background-color: #444;
            color: #fff;
            border-radius: 10px;
        }

        #menu li a {
            color: #fff;
        }

        #menu li a:hover {
            color: #bbb;
        }

        .box {
            flex: 1 1 auto;
            margin: 10px;
            padding: 20px;
            border: 1px solid #fff;
            border-radius: 10px;
            background-color: #444;
            box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.1);
        }

        a {
            text-decoration: none;
            color: #fff;
        }

        * {
            margin-top: 20px;
            margin-right: 20px;
        }

        a:visited {
            color: #bbb;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form input,
        form textarea {
            margin-bottom: 10px;
            padding: 10px;
            border: none;
            background-color: #555;
            color: #fff;
        }

        form button {
            padding: 10px;
            border: none;
            background-color: #fff;
            color: #333;
            cursor: pointer;
        }

        form button:hover {
            background-color: #bbb;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <h1>
                <a href="index.php">FootBall Scouting Agency</a>
            </h1>
        </div>

        <ul id="menu">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="create.php">New Post</a>
            </li>
            <li>
                <a href="about.php">About</a>
            </li>
            <li>
                <a href="contact.php">Contact Us</a>
            </li>
        </ul>
        <div class="box">
            <h2>Registration Form</h2>

            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <input type="text" name="name" placeholder="username">
                <br>
                <input type="text" name="email" placeholder="E-mail">
                <br>
                <input type="password" name="password" placeholder="Password">
                <br>
                <input type="submit">
            </form>
        </div>

        <ul id="menu">
            <li>
                <a href="Login.php">Log In</a>
            </li>
            <li>
                <a href="Register.php">Register</a>
            </li>
        </ul>
    </div>
</body>

</html>