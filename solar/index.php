<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Panel de Control</title>
</head>
<body>
    <div id="header">Ultima actualizacion</div>
    <div id="data">
        <div id="temp">Temperatura (C): </div>
        <div id="luz">Luz recivida (W/m2): </div>
        <div id="energia">Energia (W): </div>
        <?php
            // working with sqlite
            $db = new PDO('sqlite:' . 'solar.db');
            $res = $db->query('SELECT * FROM datosSolar');  
            $max_row = $res->fetch(PDO::FETCH_ASSOC);

            echo 'Temperatura: ' . $max_row['temp'] . '<br>';
            echo 'Luz recibida: ' . $max_row['luz'] . '<br>';
            echo 'Energia: ' . $max_row['energia'] . '<br>';
        ?>
    </div>
    <script>
    </script>
    <script src="ajax.js"></script>
</body>
</html>