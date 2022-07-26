<?php
function dbConnect() {
    define( 'DB_HOST', 'localhost');
    define( 'DB_USER', 'blog');
    define( 'DB_PASS', 'password');
    define( 'DB_NAME', 'blog');

    try {

        $option = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_MULTI_STATEMENTS => false
        );
        $dbh = new PDO('mysql:charset=UTF8;dbname='.DB_NAME.';host='.DB_HOST , DB_USER, DB_PASS, $option);
        //echo "接続成功";

    } catch(PDOException $e) {

        // 接続エラーのときエラー内容を取得する
        $error_message[] = $e->getMessage();
        echo "接続失敗";
        exit();
    }
    return $dbh;
}

function getAllBlog() {
    $dbh = dbConnect();
    $sql = 'SELECT * FROM blog';
    $stmt = $dbh->query($sql);
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $result;
    $dbh = null;
}

$blogData = getAllBlog();

function setCategoryName($category) {
    if ($category == '1') {
        return 'システム';
    } elseif ($category == '2') {
        return 'Minecraft';
    } else {
        return 'その他';
    }
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブログ一覧</title>
</head>
<body>
    <h2>ブログ一覧</h2>
    <table>
        <tr>
            <th>No.</th>
            <th>タイトル</th>
            <th>カテゴリ</th>
        </tr>
        <?php foreach($blogData as $column): ?>
        <tr>
            <td><?php echo $column['id'] ?></td>
            <td><?php echo $column['title'] ?></td>
            <td><?php echo setCategoryName($column['category']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>