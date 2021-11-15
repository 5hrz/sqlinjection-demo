<?php
    if ($_POST) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $host = 'db';
        $dbUser = 'root';
        $dbPass = 'password';
        $db = 'injection';
        
        try {
            $pdo = new PDO('mysql:charset=UTF8;dbname='.$db. ';host='.$host, $dbUser, $dbPass);
            $sql = "SELECT user FROM users WHERE user = '".h($username)."' AND pass = '".h($password)."'";
            $prepare = $pdo->prepare($sql);
            $prepare->execute();
            $res = $prepare->fetchAll();

            if (count($res) > 0) {
                print('<h1>ログイン成功</h1>');
                print('<p>ようこそ'.$username.'さん</p>');
            }else {
                print('<h1>ログイン失敗</h1>');
            }
            
            print('<button type="button" onclick="history.back()">戻る</button>');

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }else {
        print(<<<EOS
        <h1>ログイン</h1>
        <form action="#" method="post">
            ユーザー名：
            <input type="text" name="username"><br>
            パスワード：
            <input type="password" name="password"><br>
            <input type="submit" value="ログイン">
        </form>
        EOS);
    }

    function h($str) {
        return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
    }
?>