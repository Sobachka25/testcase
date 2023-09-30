<?php
include 'postsController.php';
?>
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
    <link rel="stylesheet" href="../../assets/css/styles.css">

</head>
<body>
<?php include("../../app/include/adminHeader.php"); ?>

<div class="container">
    <form class="row justify-content-md-center" method="Post" action="index.php">
        <div class="row ">
            <div class="posts ">
                <div class="post sizee row">
                    <div class="Id center1 col-md-8"></div>
                    <div class="button post-name center1 col-md-2">
                        <a class="btn btn-primary" href="create.php">создать</a>
                    </div>
                    <div class="post-name center1 col-md-2">
                        <button type="submit" name="delete" class="btn btn-primary">удалить</button>
                    </div>
                </div>

                <div class="post sizee row">
                    <div class="post-img-s center1 col-md-3"><h3>изображение</h3></div>
                    <div class="Id center1 col-md-2"><h3>ID</h3></div>
                    <div class=" center1 col-md-2"><h3>Название</h3></div>
                    <div class="post-text center1 col-md-3"><h3>описание</h3></div>
                    <div class="col-md-2 center1"><h3>чек бокс</h3></div>
                </div>

                <?php foreach ($posts as $key => $post): ?>
                    <div class="post sizee row">
                        <?php if($post['imageName']==''):?>
                        <div class="post-img-s center1 col-md-3">
                            <img src="../../assets/images/2.png" alt="" class="img-thumbnaill">
                        </div>
                        <?php else:?>
                            <div class="post-img-s center1 col-md-3">
                                <img src="../../assets/images/posts/<?=$post['imageName']?>" alt="" class="img-thumbnaill">
                            </div>
                        <?php endif?>
                        <div class="Id center1 col-md-2"><h3><?= $post['Id']; ?></h3></div>
                        <div class="post-name center1 col-md-2"><a
                                    href="edit.php?id=<?= $post['Id']; ?>"><?= $post['projectName'] ?></a></div>
                        <div class="post-text center1 col-md-3"><?= substr($post['text'], 0, 400) . '...' ?></div>
                        <div class="col-md-2 center1">
                            <input class="form-check-input center1" type="checkbox" name="deleteID[]" id="checkboxNoLabel"
                                   value="<?= $post['Id']; ?>" aria-label="...">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </form>
</div>

<?php include("../../app/include/footer.php"); ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>