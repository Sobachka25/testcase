
<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4 logo">
                <h1><a href="/proj/">Our company</a> </h1>
            </div>
            <nav class="col-8">
                <ul>
                    <li> <a href="/proj/">Главная</a></li>
                    <li> <a href="#"><?php echo $_SESSION['login'];?></a>
                        <ul>
                            <li> <a href="/proj/admin/posts/index.php">Админ панель</a> </li>
                            <li> <a href="/proj/logOut.php">Выход</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

</header>