<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/charts.css/dist/charts.min.css">

    <title>Panel de Control</title>
</head>
<body>
    <div id="mainContainer">
        <div id="data">
            <div id="temp" class="container">
                <span id="tempValue" class="header"></span>
                <span class="descriptor">Temperatura</span>
            </div>
            <div id="luz" class="container">
                <span id="luzValue" class="header"></span>
                <span class="descriptor">Llum solar rebuda</span>
            </div>
            <div id="energia" class="container">
                <span id="energiaValue" class="header"></span>
                <span class="descriptor">Producció</span>
            </div>
        </div>
        <div id="stats">
            <div id="my-chart">
                <table class="charts-css column data-spacing-10">
                    <tr> <td style="--size: 0.9"> <span class="data"> $ 40K </span> </td> </tr>
                    <tr> <td style="--size: 0.4"> <span class="data"> $ 40K </span> </td> </tr>
                    <tr> <td style="--size: 0.6"> <span class="data"> $ 40K </span> </td> </tr>
                    <tr> <td style="--size: 0.8"> <span class="data"> $ 40K </span> </td> </tr>
                    <tr> <td style="--size: 0.9"> <span class="data"> $ 40K </span> </td> </tr>
                    <tr> <td style="--size: 0.4"> <span class="data"> $ 40K </span> </td> </tr>
                    <tr> <td style="--size: 0.6"> <span class="data"> $ 40K </span> </td> </tr>
                    <tr> <td style="--size: 0.8"> <span class="data"> $ 40K </span> </td> </tr>
                    <tr> <td style="--size: 0.9"> <span class="data"> $ 40K </span> </td> </tr>
                    <tr> <td style="--size: 0.4"> <span class="data"> $ 40K </span> </td> </tr>
                    <tr> <td style="--size: 0.6"> <span class="data"> $ 40K </span> </td> </tr>
                    <tr> <td style="--size: 0.8"> <span class="data"> $ 40K </span> </td> </tr>
                </table>
            </div>

            <div class="menu">
                <button class="arrow" id="prev">&larr;</button>
                <div class="dots">
                    <span class="dot active"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
                <button class="arrow" id="next">&rarr;</button>
            </div>
        </div>
    </div>
    <?php
        // sqlite connection
        $db = new PDO('sqlite:' . 'solar.db');
        $res = $db->query('SELECT * FROM datosSolar');  
        $max_row = $res->fetch(PDO::FETCH_ASSOC);
        // for js
        $data = json_encode($max_row);
    ?>
    <script>
        // inner html with php
        var data = <?php echo $data; ?>;
        
        document.getElementById('tempValue').innerHTML += data.temp += " ºC";
        document.getElementById('luzValue').innerHTML += data.luz += " W/m²";
        document.getElementById('energiaValue').innerHTML += data.energia += " W";
    </script>
    <script src="index.js"></script>
    <script src="ajax.js"></script>
</body>
</html>