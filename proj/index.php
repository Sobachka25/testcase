<?php include 'app/controllers/users.php' ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&family=Ubuntu:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">

</head>
<body>
<?php include("app/include/header.php"); ?>

<div class="before_slider">
    <h1 class="center">Наши Топ проекты</h1>
</div>

<div class="container">
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/images/1.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5><a href="">slide label</a></h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/images/4.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5><a href="">slide label</a></h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/images/3.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5><a href="">slide label</a></h5>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<div class="container">
    <h1 class="center">Последние проекты</h1>
    <div class="content row">
        <div class="main-content ">
            <?php foreach ($posts as $key => $post): ?>
                <div class="post row">
                    <?php if ($post['imageName'] == ''): ?>
                        <div class="post-img col-12 col-md-4">
                            <img src="assets/images/2.png" alt="" class="img-thumbnail img-thumbnaill">
                        </div>
                    <?php else: ?>
                        <div class="post-img col-12 col-md-4">
                            <img src="assets/images/posts/<?= $post['imageName'] ?>" alt="" class="img-thumbnail img-thumbnaill">
                        </div>
                    <?php endif ?>

                    <div class="post-text col-12 col-md-8"><h2><a class="post-name"
                                                                  href="singlePost.php?id=<?= $post['Id']; ?>"><?= $post['projectName'] ?></a>
                        </h2>
                        <div class="preview-text"><?= substr($post['text'], 0, 400) . '...' ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


    </div>
    <?php include("app/include/footer.php"); ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
</body>
</html>