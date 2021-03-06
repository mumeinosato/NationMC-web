<?php

session_start();

require_once '../classes/UserLogic.php';

$result = UserLogic::checkLogin(); 

if (!$result) {
    $_SESSION['login_err'] = 'ログインしてください';
    header('Location: /login/');
    return; 
}
$login_user = $_SESSION['login_user'];

require_once('blog.php');

$blog = new Blog();
$blogData = $blog->getAll();

function h($s) {
    return htmlspecialchars($s, ENT_QUOTES, "utf-8");
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブログ一覧</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/features/">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <link href="../css/dashboard.css" rel="stylesheet">    
</head>
<body>
    <div>
        <header class="p-3 bg-dark text-white sticky-top bg-dark">
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
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <p class="sp"></p>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../admin/index.php">
                            <span data-feather="home"></span>
                            お知らせを送信
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="../blog/admin.php">
                            <span data-feather="file"></span>
                            ブログ
                            </a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <span data-feather="file"></span>
                            掲示板
                            </a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <span data-feather="file"></span>
                            Discordに送信
                            </a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <span data-feather="file"></span>
                            アカウント追加
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <p class="sp2"></p>
                <h2>ブログ一覧</h2>
                <p><a href="form.php">新規作成</a></p>
                <table>
                    <tr>
                        <th>タイトル</th>
                        <th>カテゴリ</th>
                        <th>投稿日時</th>
                    </tr>
                    <?php foreach($blogData as $column): ?>
                    <tr>
                        <td><?php echo h($column['title']) ?></td>
                        <td><?php echo h($blog->setCategoryName($column['category'])) ?></td>
                        <td><?php echo h($column['post_at']) ?></td>
                        <td><a href="/blog/detail.php?id=<?php echo $column['id'] ?>">詳細</a></td>
                        <td><a href="/blog/update_form.php?id=<?php echo $column['id'] ?>">編集</a></td>
                        <td><a href="/blog/blog_delete.php?id=<?php echo $column['id'] ?>">削除</a></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </main>
        </div>    
    </div>          
</body>
</html>