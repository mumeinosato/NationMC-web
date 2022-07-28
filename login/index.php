<?php

session_start();

require_once '../classes/UserLogic.php';

$result = UserLogic::checkLogin(); 
if($result){
    header('Location: ../admin/index.php');
    return;
}

$err = $_SESSION;   

$_SESSION = array();
session_destroy();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/signin.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
</head>
<body class="text-center">      
    <?php if (isset($err['msg'])) : ?>
            <p><?php echo $err['msg']; ?></p>
        <?php endif; ?> 
<main class="form-signin">        
<form action="login.php" method="POST">
    <img class="mb-4" src="../image/nmcgif.gif" alt="" width="80" height="80">
    <h1 class="h3 mb-3 fw-normal">ログイン</h1>
    <div class="form-floating">
        <input class="form-control" id="floatingInput" type="email" name="email" placeholder="name@example.com">
        <label for="email">メールアドレス:</label>
        <?php if (isset($err['email'])) : ?>
            <p><?php echo $err['email']; ?></p>
        <?php endif; ?>    
        </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
        <label for="password">パスワード:</label>
        <?php if (isset($err['password'])) : ?>
            <p><?php echo $err['password']; ?></p>
        <?php endif; ?>   
    </div>
        <input class="w-100 btn btn-lg btn-primary" type="submit" value="ログイン">
    </p>
</form>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>