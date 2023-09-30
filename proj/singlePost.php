<?php include 'app/controllers/users.php' ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&family=Ubuntu:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">

</head>
<body>
<?php include("app/include/header.php"); ?>

<div class="container">
    <div class="content row">
        <div class="main-content ">
            <div class="single-post row">
                <?php if ($photo == ''): ?>
                    <div class="single-post-img">
                        <img src="assets/images/2.png" alt="" class=">
                    </div>
                <?php else: ?>
                    <div class="single-post-img">
                        <img src="assets/images/posts/<?=$photo?>" alt="">
                    </div>
                <?php endif ?>
                <div class="post-text">
                    <h2><?=$name?></h2>
                    <p class="preview-text"><?=$description?></p>
                </div>
            </div>

        </div>
    </div>

</div>
<?php include("app/include/footer.php"); ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>