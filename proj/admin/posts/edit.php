<?php include 'postsController.php';
?>
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
    <link rel="stylesheet" href="../../assets/css/styles.css">

</head>
<body>
<?php include("../../app/include/adminHeader.php"); ?>

<div class="container">
    <div class="row col">
        <form action="edit.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name = 'id' value="<?=$id?>">
            <div class=" bigtext err center-content center">
                <h1><?=$errMsg?></h1>
            </div>
            <div class="col center">
                <label for="name" class="form-label">Название</label>
                <input value="<?=$name?>" name="name" type="text" class="form-control" id="name" placeholder="Введите название проекта">
            </div>
            <div class="w-100"></div>
            <div class="col center">
                <label for="content" class="form-label">Описание проекта</label>
                <input value="<?=$description?>" name="description" class="form-control" id="content" placeholder="Введите описание проекта" rows="6">
            </div>
            <div class="w-100"></div>
            <div class="col center">
                <label for="content" class="form-label">отметьте галочкой, если желаете удалить старое фото и не загружать новое</label>
                <input class="form-check-input center1" type="checkbox" name="deletePhoto" id="checkboxNoLabel"
                       value="<?= true; ?>" aria-label="...">
            </div>
            <div class="input-group center">
                <input name="img" type="file" class="form-control" id="inputGroupFile02">
                <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </div>
            <div class="w-100"></div>
            <div class="button post-name center1 ">
                <button name="edit-post" class="btn btn-primary" type="submit">создать / применить</button>
            </div >
            <div class="button post-name center1 ">
                <a class="btn btn-primary" href="index.php">назад</a>
            </div>

        </form>

    </div>
</div>



<?php include("../../app/include/footer.php"); ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>