<?php

function connect_to_db()
{
    // DB接続情報
    $dbn = 'mysql:dbname=gsacf_d09_06;charset=utf8;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';

    // DB接続
    try {
        return new PDO($dbn, $user, $pwd); //接続設定を渡す
    } catch (PDOException $e) {
        exit('DB Error：' . $e->getMessage());
    }
}

function exec_query($stmt)
{
    try {
        $stmt->execute();
    } catch (PDOException $e) {
        exit('sql Error：' . $e->getMessage());
    }
}
