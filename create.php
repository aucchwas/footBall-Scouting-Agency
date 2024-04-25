<?php
require ('connect.php');


if ($_POST && !empty($_POST['name']) && !empty($_POST['comment'])) { {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $query = "INSERT INTO other_info (name, comment) VALUES (:name, :comment)";
        $statement = $db->prepare($query);

        $statement->bindValue(':name', $name);
        $statement->bindValue(':comment', $comment);

        $statement->execute();

        header('Location: index.php');
        exit;
    }
}
if ($_POST && (empty($_POST['name']) || empty($_POST['comment']))) {
    echo "<div class='error'>Please fill in all the fields</div>";
}



?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Create a Post!</title>
    <style>
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

    .error {
        color: white;
        background-color: red;
        padding: 10px;
        margin: 10px 0;
        border-radius: 5px;
    }

    div #header h1 a {
        position: absolute;
        top: 30px;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
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
        margin-bottom: 20px;
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
        margin-bottom: 20px;
    }

    a {
        text-decoration: none;
        color: #fff;
    }

    a:visited {
        color: #bbb;
    }

    * {
        margin-bottom: 20px;
        margin-right: 20px;
    }
    </style>
</head>

<body>
    <!-- Remember that alternative syntax is good and html inside php is bad -->
    <div id="wrapper">
        <div id="header">
            <h1>
                <a href="index.php">Football Scouting Agency</a>
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
        <div class="box">
            <form method="post" action="create.php">
                <label hidden for="search">Search: </label>
                <input type="hidden" id="search" name="search">
                <button hidden type="button" id="searchButton">Search</button><br>

                <label for="name">Name: </label>
                <input id="name" name="name"><br>

                <label for="comment">Comment: </label>
                <input id="comment" name="comment"><br>

                <label for="suggestions">Suggestions: </label>
                <select id="suggestions"></select>

                <input type="submit">
            </form>
        </div>

    </div>

    <script>
    window.onload = function() {
        var searchTerm = document.getElementById('search').value;
        console.log('Search term:', searchTerm); // Debug line

        fetch('https://api.soccersapi.com/v2.2/players/?user=ucchwas175&token=199b349fbb66735cb91eafc1ab470e9e&t=list&country_id=4&search=' +
                encodeURIComponent(searchTerm))
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log('API response:', data); // Debug line
                if (data.data && data.data.length > 0) {
                    document.getElementById('name').value = data.data[0].name;

                    var suggestions = document.getElementById('suggestions');
                    suggestions.innerHTML = '';
                    data.data.forEach(function(item) {
                        console.log(item); // Debug line
                        var option = document.createElement('option');
                        option.value = item.name;
                        option.text = item.name;
                        suggestions.appendChild(option);
                    });
                } else {
                    console.log('No matching results found for search term:', searchTerm);
                }
            })
            .catch(error => {
                console.error('There has been a problem with your fetch operation:', error);
            });

        document.getElementById('searchButton').addEventListener('click', function() {
            var searchTerm = document.getElementById('search').value;
            console.log('Search term:', searchTerm); // Debug line
            // You can add the code to update the suggestions based on the new search term here
        });

        document.getElementById('suggestions').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex].value;
            document.getElementById('name').value = selectedOption;
        });
    }
    </script>
</body>

</html>