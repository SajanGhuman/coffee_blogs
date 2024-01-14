<?php

/*******w******** 
    
    Name: Sajanpreet singh
    Date: 22 Septmember 2023
    Description: Using html and php to edit a blog on the web.

 ****************/
require('../connect.php');
require('authenticate.php');

$display = "none";

if (!empty($_POST['title']) && !empty($_POST['content']) && isset($_POST['id']) && is_int((int)$_POST['id'])) {
    $Title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $Content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

    $query = "UPDATE blog SET Title = :title, Content = :content WHERE id = :id ";
    $statement = $db->prepare($query);

    $statement->bindValue(':title', $Title);
    $statement->bindValue(':content', $Content);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);

    $statement->execute();
    $row = $statement->fetch();

    header("Location:index.php");
    exit;
} else if (isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    if($_POST){
        $GLOBALS['display'] = "block";
    }

    $query = "SELECT * FROM blog WHERE id = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);

    $statement->execute();
    $row = $statement->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>My Blog - Post a New Blog</title>
</head>

<body>
    <!-- Remember that alternative syntax is good and html inside php is bad -->
    <div class="head">
        <a href="index.php"><img class="home" src="images/home.png" alt="home"></a>
        <h1 class="sub-title bold">COFFEE BLOGS</h1>
        <a class="para-1 new-button" href="post.php">New Blog</a>
    </div>
    <div class="container-3">
        <p style="display: <?= $display ?>;" class="error-1">Validation failed, Please try again</p>
        <form method="POST">

            <input type="hidden" name="id" value="<?= $row['id'] ?>">

            <div class="title-div-1">
                <label for="title">TITLE</label><br>
                <textarea id="title" name="title" class="bold txt-1"><?= $row['Title'] ?></textarea>
            </div><br><br>

            <div class="content-div-1">
                <label for="content">CONTENT</label><br>
                <textarea id="content" name="content" class=" bold e-content"><?= $row['Content'] ?></textarea>
            </div><br><br>

            <div class="button-div">
                <button name="submit" type="submit" class="up-button bold">Update Blog</button>

                <a class="del-button" href="delete.php?id=<?= $row['id'] ?>" onClick='alert("Are sure you want to delete?")'>Delete</a>
            </div>
        </form>
    </div>
</body>

</html>