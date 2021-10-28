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
            width: 300px;
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
    if (isset($_GET['agenda'])) //Comprobamos si la variable $agenda
        $agenda = $_GET['agenda'];
    else
        $agenda = array(); // Creamos la variable $agenda como un array vacio si no esta creada 


    if (isset($_GET['submit'])) { //Validamos los datos 
        $nuevo_nombre = filter_input(INPUT_GET, 'nombre');
        $nuevo_telefono = filter_input(INPUT_GET, 'telefono');
        if (empty($nuevo_nombre)) { //si no se envia nombre mandara un error
            echo " <p class='error'>Debes introducir un nombre primero</p><br />";
        } elseif (empty($nuevo_telefono)) {
            unset($agenda[$nuevo_nombre]);
        } else {
            $agenda[$nuevo_nombre] = $nuevo_telefono;
        }
    }
    ?>
    <!--Creamos el formulario de la agenda-->
    <div class="contactos">


        <h2>Contactos</h2>

        <form>
            <!--Como no tenemos una base de datos almacenamos todos los contactos con inputs ocultos que se van a generar a medida que que enviemos el formulario-->
            <div>
                <?php
                foreach ($agenda as $nombre => $telefono) {
                    echo '<input type="hidden" name="agenda[' . $nombre . ']" ';
                    echo 'value="' . $telefono . '"/>';
                }
                ?>
                <label style="padding-left: 3px">Nombre:<input type="text" name="nombre" /></label><br /><br />
                <label>Teléfono:<input type="number" name="telefono" /></label><br /><br />
                <input type="submit" name='submit' value="Ejecutar" /><br />
            </div>
        </form>
        <br />
    </div>


    <!--Aqui pintamos los contactos almacenados en $agenda si no hay contactos generara un mensaje para avisar de que esta vacio-->
    <div class="agenda">
        <h2 style="padding-left: 21px">Agenda</h2>
        <?php
        if (count($agenda) == 0) {
            echo "<p>No hay contactos en la agenda.</p>";
        } else {
            echo "<ul>";
            foreach ($agenda as $nombre => $telefono) {
                echo "<li>" . $nombre . ': ' . $telefono . "</li>";
            }
            echo "</ul>";
        }
        ?>
    </div>


</body>

</html>