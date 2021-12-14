<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CONTACTOS</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <?php

    include_once 'Database.php';
    include_once 'Agenda.php';
    // get database connection
    $database = new Database();
    $db = $database->getConnection();

    // initialize objects
    $user = new Agenda($db);

    $stmt = $user->readAll();
    if ($_POST) {


        // set user email to detect if it already exists
        $agenda->email = $_POST['email'];
        $agenda->nom = $_POST['nom'];
        $agenda->telefono = $_POST['telefono'];

        $agenda->createContact();
    }

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);



        echo "<p>{$nom} {$telefono} {$email}</p>";
    }

    ?>

    <div class="contactos">


        <h2>Contactos</h2>

        <form method="post">

            <div>

                <label style="padding-left: 3px">Nombre:<input type="text" name="nom" /></label><br /><br />
                <label>Teléfono:<input type="text" name="telefono" /></label><br /><br />
                <label>Email:<input type="text" name="email" /></label><br /><br />
                <input type="submit" name='submit' value="Enviar" /><br />
            </div>
        </form>
        <br />
    </div>
    <div class="agenda">
        <h2 style="padding-left: 21px">Agenda</h2>
        <?php
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);



            echo "<p>{$nom} {$telefono} {$email}</p>";
        }

        ?>

    </div>

</body>

</html>