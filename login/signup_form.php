<?php

session_start();
require_once 'functions.php';
require_once '../classes/UserLogic.php';

if (!$result) {
    $_SESSION['login_err'] = 'ログインしてください';
    header('Location: index.php');
    return; 
}
$login_user = $_SESSION['login_user'];

$login_err = isset($_SESSION['login_err']) ? $_SESSION['login_err'] :null;
unset($_SESSION['login_err']);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録</title>
</head>
<body>
<h2>ユーザー登録</h2>
<?php if (isset($login_err)) : ?>
            <p><?php echo $login_err; ?></p>
        <?php endif; ?> 
<form action="register.php" method="POST">
    <p>
        <label for="username">ユーザー名:</label>
        <input type="text" name="username">
    </p>
    <p>
        <label for="email">メールアドレス:</label>
        <input type="email" name="email">
    </p>
    <p>
        <label for="password">パスワード:</label>
        <input type="password" name="password">
    </p>
    <p>
        <label for="password_conf">パスワード確認:</label>
        <input type="password" name="password_conf">
    </p>
    <input type="hidden" name="csrf_token" value="<?php echo h(setToken()); ?>">
        <input type="submit" value="登録">
    </p>
</form>
</body>
</html>