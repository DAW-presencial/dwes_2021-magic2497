<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contador</title>
</head>

<body>
    <?php



    if (isset($_COOKIE["TestCookie"])) {
        setcookie("TestCookie", ++$_COOKIE["TestCookie"], time() + 3600);
        echo 'has iniciado sesion ' . $_COOKIE["TestCookie"] . ' veces';
    } else {
        setcookie("TestCookie", 1, time() + 3600);
        echo 'has iniciado sesion 1 veces';
    }


    ?>


</body>

</html>