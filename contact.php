<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Contact Us - Football Scouting Agency</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #333;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        height: 100vh;
        margin: 0;
        background-color: #333;
        color: #fff;
    }

    .container {
        width: 80%;
        margin: 0 auto;
        text-align: center;
    }

    h1,
    h2 {
        color: #fff;
    }

    p {
        line-height: 1.6;
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

    div #header h1 a {
        position: absolute;
        top: 30px;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: #fff;
    }

    #wrapper h1 a {
        justify-content: center;
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

    <div class="container">
        <div class="box">
            <div id="wrapper">
                <h1 class="header">
                    <a href="index.php">FootBall Scouting Agency</a>
                </h1>
            </div>

            <ul id="menu">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
                <li>
                    <a href="create.php">New Post</a>
                </li>
                <?php endif; ?>
                <li>
                    <a href="about.php">About</a>
                </li>
                <li>
                    <a href="contact.php">Contact Us</a>
                </li>
            </ul>

            <h1>Contact Us</h1>
            <p>
                If you are a young footballer looking for an opportunity, or if you know
                someone who is, please get in touch with us. We would love to hear from
                you.
            </p>

            <form action="submit_contact.php" method="post">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" placeholder="Your Message" required></textarea>
                <button type="submit">Submit</button>
            </form>
            <ul id="menu">
                <li>
                    <a href="Login.php">Log In</a>
                </li>
                <li>
                    <a href="Register.php">Register</a>
                </li>
            </ul>
        </div>

    </div>

</body>

</html>