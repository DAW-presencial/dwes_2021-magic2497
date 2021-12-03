<!doctype html>

<html>

<head>

    <title>Agenda de contactos</title>
    <!--ponemos css para tener el formulario al lado de la lista de contactos-->
    <style>
        body {
            font-family: Arial;
        }

        .agenda {
            width: 900px;
            float: left;
            height: 300px;

        }

        .contactos {
            width: 300px;
            float: left;
            height: 350px;

        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php







    ?>

    <div class="contactos">


        <h2>formulario</h2>

        <form method="post" enctype="multipart/form-data">
            <div>

                <label style="padding-left: 3px">Nombre:<input type="text" name="nombre" /></label><br /><br />
                <label style="padding-left: 3px">Apellido:<input type="text" name="apellido" /></label><br /><br />
                <label> Fecha:<input type="date" name="fecha" /></label><br /><br />
                <label>Archivo 1:</label>
                <input type="file" name="archivo1" />
                <label>Archivo 2:</label>
                <input type="file" name="archivo2" /><br /><br />

                <input type="submit" name='submit' value="Ejecutar" /><br />
            </div>
        </form>
        <br />
    </div>


    <div class="agenda">
        <h2 style="padding-left: 21px">Resultado</h2>
        <?php
        if (isset($_POST['submit'])) {
            $nombre = filter_input(INPUT_POST, 'nombre');
            $apellido = filter_input(INPUT_POST, 'apellido');
            $fecha = filter_input(INPUT_POST, 'fecha');
            $archivo1_nombre = $_FILES["archivo1"]["name"];
            $archivo2_nombre = $_FILES["archivo2"]["name"];
            $archivo1_tamaño = $_FILES["archivo1"]["size"];
            $archivo2_tamaño = $_FILES["archivo2"]["size"];

            echo "<ul>";

            echo "<li>" . $nombre . " " . $apellido . " " . $fecha .   "</li>";
            echo "<li>" . "nombre archivo 1: " . $archivo1_nombre . " tamaño: " . $archivo1_tamaño . " bytes" .  "</li>";
            echo "<li>" . "nombre archivo 2: " . $archivo2_nombre . " tamaño: " . $archivo2_tamaño . " bytes" .  "</li>";

            echo "</ul>";
        }


        ?>
    </div>


</body>

</html>