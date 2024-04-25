<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <!-- Title of the page -->
    <title>About Us - Football Scouting Agency</title>
    <!-- Styling for the page -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #333;
            color: #fff;
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

        div #header h1 a {
            position: absolute;
            top: 30px;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #fff;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        h1,
        h2 {
            color: #fff;
        }

        p {
            line-height: 1.6;
            color: #fff;
        }

        div #header h1 a {
            position: absolute;
            top: 30px;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #fff;
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
            background-color: #444;
        }
    </style>
</head>

<body>
    <!-- Main container for the page -->
    <div class="container">
        <!-- Box for the header and navigation -->
        <div class="box">
            <!-- Wrapper for the header -->
            <div id="wrapper">
                <!-- Header of the page -->
                <h1 class="header">
                    <!-- Link to the homepage -->
                    <a href="index.php">FootBall Scouting Agency</a>
                </h1>
            </div>

            <!-- Navigation menu -->
            <ul id="menu">
                <!-- Link to the homepage -->
                <li>
                    <a href="index.php">Home</a>
                </li>
                <!-- Link to create a new post, only visible if the user is logged in -->
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
                    <li>
                        <a href="create.php">New Post</a>
                    </li>
                <?php endif; ?>
                <!-- Link to the about page -->
                <li>
                    <a href="about.php">About</a>
                </li>
                <!-- Link to the contact page -->
                <li>
                    <a href="contact.php">Contact Us</a>
                </li>
            </ul>

            <!-- About Us section -->
            <h1>About Us</h1>
            <p>
                <!-- Brief introduction about the agency -->
                Welcome to our Football Scouting Agency. We are dedicated to finding and
                nurturing the next generation of football talents.
            </p>

            <!-- Box for the mission statement -->
            <div class="box">
                <h2>Our Mission</h2>
                <p>
                    <!-- The agency's mission statement -->
                    Our mission is to identify young talented footballers and provide them
                    with the platform to showcase their skills to the world. We believe that
                    every young player should have the opportunity to pursue their dreams,
                    and we are here to make that happen.
                </p>
            </div>

            <!-- Box for the team introduction -->
            <div class="box">
                <h2>Our Team</h2>
                <p>
                    <!-- Brief introduction about the team -->
                    Our team consists of experienced scouts, coaches, and former
                    professional footballers who have a deep understanding of the game. We
                    are passionate about football and dedicated to discovering and
                    developing young talents.
                </p>
            </div>

            <!-- Box for the contact information -->
            <div class="box">
                <h2>Contact Us</h2>
                <p>
                    <!-- Prompt for users to contact the agency -->
                    If you are a young footballer looking for an opportunity, or if you know
                    someone who is, please get in touch with us. We would love to hear from
                    you.
                </p>
            </div>

            <!-- Navigation menu for logging in and registering -->
            <ul id="menu">
                <!-- Link to the login page -->
                <li>
                    <a href="Login.php">Log In</a>
                </li>
                <!-- Link to the registration page -->
                <li>
                    <a href="Register.php">Register</a>
                </li>
            </ul>
        </div>
    </div>
</body>

</html>