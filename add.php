<!--このクラスは毎回コピペ  意味の理解のみ-->

<?php
// データベースに接続するための文字列（DSN 接続文字列）
$dsn = 'mysql:dbname=php_work;host=localhost;charset=utf8';

// PDOクラスのインスタンスを作る
// 引数は、上記のDSN、データベースのユーザー名、パスワード
// XAMPPの場合はデフォルトでパスワードなし?????????よって空文字('')、MAMPの場合は「root」
// ?????????? ユーザー名XAMPPはデフォルトで、root
$dbh = new PDO($dsn, 'root', '');

// POSTデータをデータベースにインサートする
// ????????(.=)は代入ではなく、
$sql = '';
$sql .= 'insert into todo_items (';
$sql .= 'expiration_date,';
$sql .= 'todo_item';
$sql .= ') values (';
$sql .= ':expiration_date,';
$sql .= ':todo_item';
$sql .= ')';

// SQL文を実行する準備
$stmt = $dbh->prepare($sql);

// SQL文の該当箇所に、変数の値を割り当て（バインド）する
$stmt->bindValue(':expiration_date', $_POST['expiration_date'], PDO::PARAM_STR);
$stmt->bindValue(':todo_item', $_POST['todo_item'], PDO::PARAM_STR);

// SQLを実行する
$stmt->execute();

// 処理が完了したらトップページ（index.php）へ　リダイレクト
// ?????? (./)は（index.php）の略式
header('Location: ./');
exit;