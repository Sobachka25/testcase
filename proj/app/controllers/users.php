<?php
include ("app/database/db.php");
$posts = selectAll('projects');
$errMsg = '';

/*($_SERVER['REQUEST_METHOD'] === 'POST') &&*/

if( isset($_POST['button-reg'])){
    $login = trim($_POST['login']);
    $passw = trim($_POST['password']);
    if($login ==='' ||$passw === ''){
        $errMsg = "Не все поля заполнены";
    }
    else{
        $existance = selectOne('admins', ['login'=>$login]);
        if($existance && ($existance['password'] === $passw)){
            $_SESSION['login'] = $existance['login'];
            $_SESSION['Id'] = $existance['Id'];

            header('location: /proj/admin/posts/index.php');
        }
        else{
            $errMsg = 'Неверно введенный логин или пароль';
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $post = selectOne('projects', ['Id' => $_GET['id']]);
    $name = $post['projectName'];
    $description = $post['text'];
    $photo = $post['imageName'];
    //echo('r' . $photo . 'r');
}