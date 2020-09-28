<?php
$dt = new DateTime('now', new DateTimeZone('Asia/Tokyo'));
$date = $dt->format('Y-m-d');

// データベースに接続するための文字列（DSN 接続文字列）
$dsn = 'mysql:dbname=php_work;host=localhost;charset=utf8';

// PDOクラスのインスタンスを作る
// 引数は、上記のDSN、データベースのユーザー名、パスワード
// XAMPPの場合はデフォルトでパスワードなし、MAMPの場合は「root」
$dbh = new PDO($dsn, 'root', '');

// レコードを全件取得する（期限日の古いものから並び替える）
// expiration 有効期限
// order by
// (*) すべてのカラムを取得
$sql = 'select * from todo_items order by expiration_date';

// SQL文を実行する準備
//丸覚えでよい
// stmt ステートメントの略・ユーザー定義
$stmt = $dbh->prepare($sql);

// SQLを実行する
$stmt->execute();

// 取得したレコードを連想配列として変数に代入する
$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>todoリスト</div>
    <form action = "add5.php" method = "post">
        <label>期限日</label>
        <input type ="text" name = expriration_date >
        <label>todo項目</label>
        <input type = "text" name ="todo_item" placeholder ="todo項目を入力してください" >
        <input type = "submit" value = "追加">
    </form>

    <?php if (count($list) > 0) : ?>
        <table>
            <tr>
                <th>期限日</th>
                <th>todo項目</th>
                <th></th>
            </tr>
            <?php foreach ($list as $v) : ?>
                <tr>
                    <td><?= $v['expiration_date'] ?></td>
                    <td><?= $v['todo_item'] ?></td>
                    <td>
                        <form method = "post" action = "action5.php" border ="1">
                            <input type = "radio" value = "0" >
                            <label  >未完了</label>
                            <input type = "radio" value = "1" >
                            <label>完了</label>
                            <input type = "checkbox" value ="1"> 
                            <label>削除</label>
                            <input type = "submit" value = "実行" >
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    <?php endif ?>
        

</body>
</html>