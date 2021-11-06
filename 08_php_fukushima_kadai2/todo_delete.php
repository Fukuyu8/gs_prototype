<?php
// var_dump($_GET['id']);
// exit();


include("functions.php");

$id = $_GET['id'];

$pdo = connect_to_db(); //DB接続

//SQLの組み立て
$sql = 'DELETE FROM users_table WHERE id=:id'; //updateとはここが変わるだけ
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);


exec_query($stmt); //クエリ実行

header("Location:todo_read.php");//一覧に戻る
