<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ( !empty($query) ) {
            $host = 'localhost';
            $user = 'root';
            $password = 'password';
            $db = 'injection';
            
            try {
                $pdo = new PDO('mysql:charset=UTF8;dbname='.$db. ';host='.$host, $user, $password);
                $prepare = $pdo->prepare('SELECT * FROM users WHERE user = '. $username. ' AND pass = '. $password. ';');
                $prepare->execute();
                $res = $prepare->fetchAll(PDO::FETCH_ASSOC);
                echo $res
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

        }
    ?>

    <form action="#" method="post">
        <input type="text" name="username" value="1">
        <input type="text" name="password" value="2">
        <input type="submit" value="ログイン">
    </form>
</body>
</html>