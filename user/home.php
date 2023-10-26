<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FussballTipps</title>
    <style>
        	:root {
            --background: #1a1a2e;
            --color: #ffffff;
            --primary-color: #0f3460;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            box-sizing: border-box;
            font-family: "poppins";
            background: var(--background);
            color: var(--color);
            letter-spacing: 1px;
            transition: background 0.2s ease;
            -webkit-transition: background 0.2s ease;
            -moz-transition: background 0.2s ease;
            -ms-transition: background 0.2s ease;
            -o-transition: background 0.2s ease;
        }

        a {
            text-decoration: none;
            color: var(--color);
        }

        h1 {
            font-size: 2.5rem;
            text-align: center;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        h1 {
            font-size: 2.5rem;
        }
    </style>
</head>
<body>
    <?php
    // Verbindung zur Datenbank herstellen
    $servername = "176.96.136.51";
    $username = "johbiasd_look";
    $password = "Jojo1234Do?";
    $database = "johbiasd_football";

    $conn = new mysqli($servername, $username, $password, $database);

    // Überprüfen, ob die Verbindung erfolgreich hergestellt wurde
    if ($conn->connect_error) {
        die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
    }

    // Benutzereingaben aus dem Formular
    $user = $_GET['username'];
    $pass = $_GET['password'];

    // SQL-Abfrage vorbereiten
    $sql = "SELECT * FROM login WHERE username = '$user' AND password = '$pass'";
    $result = $conn->query($sql);

    // Überprüfen, ob es einen Treffer gibt
    if ($result->num_rows > 0) {} 
    else {
        header("Location: ../index.html");
        exit; // Hier kannst du Code für eine fehlgeschlagene Anmeldung einfügen.
    }

    // Verbindung zur Datenbank schließen
    $conn->close();
    ?>

    <?php     
    $row = $result->fetch_assoc();
    echo "<h1>Willkommen, " . $row['name'] . "!</h1>";
    ?>
</body>
</html>