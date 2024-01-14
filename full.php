<?php

/*******w******** 
    
    Name: Sajanpreet singh
    Date: 20 September 2023
    Description: Using html and php to create a fully functioning blog page.

 ****************/
require('../connect.php');

$query = "SELECT * FROM blog WHERE id = :id";
$statement = $db->prepare($query);
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$statement->bindValue('id', $id, PDO::PARAM_INT);
$statement->execute();

$row = $statement->fetch();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>My Blog - <?= $row['Title'] ?></title>
</head>

<body>
    <!-- Remember that alternative syntax is good and html inside php is bad -->
    <div class="head">
        <a href="index.php"><img class="home" src="images/home.png" alt="home"></a>
        <h1 class="sub-title bold">COFFEE BLOGS</h1>
        <a class="para-1 new-button" href="post.php">New Blog</a>
    </div>
    <div class="container">
        <div class="flex-1">
            <h1 class="title"><a class="title-link" href="full.php?id=<?= $row['id'] ?>"><?= $row['Title'] ?></a></h1>
            <a class="edit" href="edit.php?id=<?= $row['id'] ?>">
                <p>edit</p>
            </a>
        </div>
        <div class="time-1">
            <?php $curdate = $row['Timestamp'];
            $date = date("F d,Y h:i a", strtotime($curdate)); ?>
            <p class="time-para"><?= $date ?></p>
        </div>

        <div class="content-div-3">
            <p class="content-para"><?= $row['Content'] ?></p>
        </div>
    </div>
</body>

</html>