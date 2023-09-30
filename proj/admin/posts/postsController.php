<?php
include("../../app/database/db.php");
$errMsg = '';
$posts = selectAll('projects');

//echo '<pre>'; print_r($posts); echo '</pre>';
//exit();

if (!$_SESSION) {
    header('location: ../../reg.php');
}

//добавление
$withphoto = 0;
$name = '';
$description = '';
if (isset($_POST['create-post'])) {
    if (!empty($_FILES['img']['name'])) {
        $imgName = time() . '_' . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $destination = "..\..\assets\images\posts\\" . $imgName;
        $filetype = $_FILES['img']['type'];
        if (strpos($filetype, 'image') === false) {
            $errMsg = 'это не изображение';
            //вс1 плохо
        } else {//всё хорошо
            $result = move_uploaded_file($fileTmpName, $destination);
            if ($result) { //всё хорошо
                $_POST['img'] = $imgName;
                $withphoto = 1;
            } else { //всё плохо
                $errMsg = "Ошибка загрузки изображения на сервер";
            }
        }
    }


    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    if ($withphoto == 1) {
        $photo = $_POST['img'];
    }
    if ($name === '' || $description === '') {
        $errMsg = "Не все поля заполнены";
    } else {
        if ($errMsg == '') {

            $post = [
                'projectName' => $name,
                'text' => $description,
                'imageName' => $photo
            ];

            insert('projects', $post);
            header('location: /proj/admin/posts/index.php');
            $name == '';
            $description == '';
            $photo = '';
            $withphoto = 0;
        }
    }


}


//удаление
if (isset($_POST['delete']) && isset($_POST['deleteID'])) {

    $str = '';

    $deletPhoto = selectAllByOneParamAndMassivValues('projects', 'imageName', $_POST['deleteID']);
    foreach ($deletPhoto as $key => $val) {
        unlink('../../assets/images/posts/' . trim($val['imageName']));
    }

    foreach ($_POST['deleteID'] as $key => $val) {

        delete('projects', $val);
    }
    header('location: /proj/admin/posts/index.php');
}

//редактирование
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $post = selectOne('projects', ['Id' => $_GET['id']]);
    $name = $post['projectName'];
    $description = $post['text'];
    $photo = $post['imageName'];
    //echo('r' . $photo . 'r');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit-post'])) {

    $post = selectOne('projects', ['Id' => $_POST['id']]);
    if (!empty($_FILES['img']['name'])) {
        $imgName = time() . '_' . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $destination = "..\..\assets\images\posts\\" . $imgName;
        $filetype = $_FILES['img']['type'];
        if (strpos($filetype, 'image') === false) {
            $errMsg = 'это не изображение';
            //всё плохо
        } else {//всё хорошо
            $result = move_uploaded_file($fileTmpName, $destination);
            if ($result) { //всё хорошо
                $_POST['img'] = $imgName;
                unlink('../../assets/images/posts/' . trim($post['imageName']));
            } else { //всё плохо
                $errMsg = "Ошибка загрузки изображения на сервер";
            }
        }
    }
    else{
        $_POST['img'] = $post['imageName'];
    }

    $id = $_POST['id'];
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);


    $photo = $_POST['img'];
    if ($name === '' || $description === '') {
        $errMsg = "Не все поля заполнены";
    } else {
        if ($errMsg == '') {
            if($_POST['deletePhoto']){
                unlink('../../assets/images/posts/' . trim($post['imageName']));
                $post = [
                    'projectName' => $name,
                    'text' => $description,
                    'imageName' => ''
                ];
            }
            else{
                $post = [
                    'projectName' => $name,
                    'text' => $description,
                    'imageName' => $photo
                ];
            }

            update('projects', $id, $post);
            header('location: /proj/admin/posts/index.php');
            $name == '';
            $description == '';
            $photo = '';
            $withphoto = 0;
        }
    }
}