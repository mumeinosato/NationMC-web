<?php

session_start();
require_once '../classes/UserLogic.php';
require_once '../login/functions.php';

$result = UserLogic::checkLogin(); 

if (!$result) {
    $_SESSION['login_err'] = 'ログインしてください';
    header('Location: ../login/');
    return; 
}
$login_user = $_SESSION['login_user'];

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイページ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/features/">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
</head>
<body>   
    <div>
        <header class="p-3 bg-dark text-white">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
                    </a>  
                    <ui class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="../index.php" class="nav-link px-2 text-white">トップページ</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">お知らせ</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">ルール</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">新規の方へ</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">MAP</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">ツール</a></li>                        
                        <li><a href="#" class="nav-link px-2 text-white">お問い合わせ</a></li>
                        <li><a href="#" class="nav-link px-2 text-white dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">その他</a>
                        <ul class="bg-dark dropdown-menu">
                                <li><a href="../blog/" class="nav-link px-2 text-white dropdown-item">ブログ</a></li>
                                <li><a href="../wiki" class="nav-link px-2 text-white dropdown-item">Wiki</a></li>
                                <li><a href="../board" class="nav-link px-2 text-white dropdown-item">掲示板?</a></li>
                            </ul>
                        </li>
                    </ui> 
                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                        <input type="search" class="form-control form-control-dark" placeholder="検索" aria-label="Search">
                    </form>
                    <div class="text-end">
                        <form action="../login/logout.php" method="POST">
                            <input class="btn btn-outline-light me-2" type="submit" name="logout" value="ログアウト"> 
                        </form>                        
                    </div>                 
                </div>
            </div>
        </header>     
    </div> 
    <div class="container px-4 py-5" id="featured-3">
        <h2 class="pb-2 border-bottom">管理パネル</h2>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="feature col">
                <div class="feature-icon bg-primary bg-gradient">
                <svg class="bi" width="1em" height="1em"><use xlink:href="#collection"/></svg>
                </div>
                <h2>お知らせ</h2>
                <p>このサイト内にお知らせを送信します</p>
                <a href="#" class="icon-link">
                お知らせを送信
                <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"/></svg>
                </a>
            </div>
            <div class="feature col">
                <div class="feature-icon bg-primary bg-gradient">
                <svg class="bi" width="1em" height="1em"><use xlink:href="#people-circle"/></svg>
                </div>
                <h2>ブログ</h2>
                <p>ブログの追加、編集、削除</p>
                <a href="../blog/admin.php" class="icon-link">
                管理パネルへ
                <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"/></svg>
                </a>
            </div>
            <div class="feature col">
                <div class="feature-icon bg-primary bg-gradient">
                <svg class="bi" width="1em" height="1em"><use xlink:href="#toggles2"/></svg>
                </div>
                <h2>掲示板</h2>
                <p>メッセージの編集、削除、ダウンロード</p>
                <a href="#" class="icon-link">
                管理パネルへ
                <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"/></svg>
                </a>
            </div>
            <div class="feature col">
                <div class="feature-icon bg-primary bg-gradient">
                <svg class="bi" width="1em" height="1em"><use xlink:href="#toggles2"/></svg>
                </div>
                <h2>Discordに送信</h2>
                <p>近日公開</p>
                <a href="#" class="icon-link">
                まだ作ってないよ
                <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"/></svg>
                </a>
            </div>
            <div class="feature col">
                <div class="feature-icon bg-primary bg-gradient">
                <svg class="bi" width="1em" height="1em"><use xlink:href="#toggles2"/></svg>
                </div>
                <h2>アカウント追加</h2>
                <p>多分もう使わない</p>
                <a href="../login/signup_form.php" class="icon-link">
                使用禁止
                <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"/></svg>
                </a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>   
</body>
</html>