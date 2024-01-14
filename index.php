<?php

/*******w******** 
    
    Name: Sajanpreet singh
    Date: 20 September 2023
    Description: Using html and php to create a fully functioning blog page.

 ****************/
require('../connect.php');

$query = "SELECT * FROM blog ORDER BY Timestamp DESC LIMIT 5";
$statement = $db->prepare($query);
$statement->execute();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya:ital,wght@0,400;0,500;0,600;1,400;1,500&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js" defer></script>
    <script src="https://www.greensock.com/js/src/utils/SplitText.min.js" defer></script>
    <script src="script.js" defer></script>
    <title>My Blog - Home Page</title>
</head>

<body>
    <!-- Remember that alternative syntax is good and html inside php is bad -->

    <div class="div">
        <div class="div-1">
            <img class="flower f1 " src="images/tl.png" alt="tl">
            <img class="flower f2 " src="images/tr.png" alt="tr">
            <img class="flower f3 " src="images/bl.png" alt="bl">
            <img class="flower f4 " src="images/br.png" alt="br">
            <header>
                <div class="header-div">
                    <div class="steam posi "></div>
                    <a href="index.php"><img src="images/coffe.png" alt="coffew" class="coffee-img"></a>
                    <a href="index.php">
                        <h1 class="animate-character">COFFEE BLOGS</h1>
                    </a>
                </div>
            </header>
        </div>
    </div>
    <div class="div div-2 main">
        <main class="main">
            <div class="head">
                <a href="index.php"><img class="home" src="images/home.png" alt="home"></a>
                <h1 class="sub-title bold">Recently Posted Blog Enteries</h1>
                <a class="para-1 new-button" href="post.php">New Blog</a>
            </div>

            <?php while ($row = $statement->fetch()) : ?>
                <div class="flex">
                    <h1 class="title"><a class="title-link" href="full.php?id=<?= $row['id'] ?>"><?= $row['Title'] ?></a></h1>
                    <a class="edit" href="edit.php?id=<?= $row['id'] ?>">
                        <p>edit</p>
                    </a>
                </div>

                <div class="time">
                    <?php $curdate = $row['Timestamp'];
                    $date = date("F d,Y h:i a", strtotime($curdate)); ?>
                    <p class="time-para"><?= $date ?></p>
                </div>

                <?php
                $str = $row['Content'];
                $lim = 200;
                if (strlen($str) > $lim) :
                    $trim_str = substr($str, 0, $lim); ?>
                    <div class="content-div">
                        <p class="content-para"><?= $trim_str ?> . <a href="full.php?id=<?= $row['id'] ?>">...Read Full Post</a></p>
                    </div>
                <?php else : ?>
                    <div class="content-div">
                        <p class="content-para"><?= $str ?></p>
                    </div>
                <?php endif ?>
            <?php endwhile ?>
        </main>
    </div>
    <script src="main.js"></script>
</body>

</html>