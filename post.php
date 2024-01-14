<?php

/*******w******** 
    
    Name: Sajanpreet singh
    Date: 20 Sep 2023
    Description: Using html and php to post a new blog.

 ****************/
require('../connect.php');
require('authenticate.php');

$display = "none";
if (isset($_POST['submit'])) {
    if ($_POST && !empty($_POST['title']) && !empty($_POST['content']) && is_int((int)$_POST['id'])) {
        $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $content = filter_input(INPUT_POST, "content", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($title  && $content) {
            $query = "INSERT INTO blog (Title, Content) VALUES (:title, :content)";
            $statement = $db->prepare($query);

            $statement->bindValue(':title', $title);
            $statement->bindValue(':content', $content);

            $GLOBALS['done'] = $statement->execute();
            $id = $db->lastInsertId();

            header("Location:index.php");
            exit();
        }
    } else {
        $GLOBALS['display'] = "block";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title class="animate-character">Coffee Blogs - Post</title>
</head>

<body>
    <!-- Remember that alternative syntax is good and html inside php is bad -->
    <div class="head">
        <a href="index.php"><img class="home" src="images/home.png" alt="home"></a>
        <h1 class="sub-title bold">COFFEE BLOGS</h1>
        <a class="para-1 new-button" href="post.php">New Blog</a>
    </div>

    <div class="container-1">
        <p style="display: <?= $display ?>;" class="error">Validation failed, Please try again</p>
        <form action="post.php" method="POST">
            <div class="title-div">
                <label for="title">TITLE</label><br>
                <textarea id="title" name="title" class="bold txt-1"></textarea>
            </div><br><br>

            <div class="content-div-2">
                <label for="content">CONTENT</label><br>
                <textarea id="content" name="content" class=" bold content-1"></textarea>
            </div><br><br>

            <div>

                <button name="submit" type="submit" class="sub-button bold">Submit Blog</button>
            </div>
        </form>
    </div>
</body>

</html>