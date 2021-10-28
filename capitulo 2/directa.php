<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <?php
    $array = array(30, 20, 10, 5);
    $pepito = array(5);


    function ordenar(&$arr)
    {
        $pepito = array();
        $tamaño = count($arr);

        for ($i = 0; $i < $tamaño; $i++) {

            $valor_pequeño = min(array_diff($arr, $pepito));
            $pepito[$i] = $valor_pequeño;
            $posicion = array_search($valor_pequeño, $arr);



            $antiguo = $arr[$i];
            $arr[$i] = $arr[$posicion];
            $arr[$posicion] = $antiguo;
        }
    }

    ordenar($array);

    print_r($array);



    ?>


</body>

</html>