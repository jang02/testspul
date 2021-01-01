<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="libs/lightbox2-dev/dist/css/lightbox.min.css">
    <link rel="stylesheet" href="test.css">
    <script src="test.js"></script>
    <script src="libs/lightbox2-dev/dist/js/lightbox-plus-jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<div id="container">


    <?php

    $dir = scandir('imgs/');

    if (is_array($dir) && count($dir)) {
        foreach ($dir as $subdir) {
            if ($subdir !== '.' && $subdir !== '..') {
                ?>
                <div id="<?php echo $subdir ?>">
                    <?php
                    $imgs = scandir('imgs/' . $subdir . '/');
                    foreach ($imgs as $img) {
                        if ($img !== '.' && $img !== '..') {
                            ?>
                            <a href="<?php echo 'imgs/' . $subdir . '/' . $img ?>"
                               data-lightbox="<?php echo $subdir ?>"><img
                                        src="<?php echo 'imgs/' . $subdir . '/' . $img ?>"></a>
                            <?php
                        }
                    }
                    ?>
                </div>
                <?php
            }
        }
    }

    ?>
</div>
</body>
</html>