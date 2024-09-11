<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>BMI</title>
</head>
<body>
    </form>
    <?php
        session_start();
        $_SESSION['name'] = 'Taka';
        $_SESSION['email'] = 'user@gmail.com';
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
    ?>
</body>
</html>