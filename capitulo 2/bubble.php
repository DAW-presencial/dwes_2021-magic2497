<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <?php
    $array = array(50, 40, 30, 20, 10, 5);



    function ordenar(&$arr)
    {
        $tamaño = count($arr);
        for ($i = 0; $i < $tamaño; $i++) {

            for ($j = 0; $j < $tamaño - 1; $j++) {

                if ($arr[$j] > $arr[$j + 1]) {

                    $antiguo = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $antiguo;
                }
            }
        }
    }

    ordenar($array);

    print_r($array);

    ?>


</body>

</html>