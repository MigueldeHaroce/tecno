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
                <div class="text">
                    <span id="tempValue" class="header"></span>
                    <span id="unit">ºC</span>
                </div>
                <span class="descriptor">Temperatura</span>
            </div>
            <div id="luz" class="container">
                <div class="text">
                    <span id="luzValue" class="header"></span>
                    <span id="unit">W/m²</span>
                </div>
                <span class="descriptor">Llum solar rebuda</span>
            </div>
            <div id="energia" class="container">
                <div class="text">
                    
                    <span id="energiaValue" class="header"></span>
                    <span id="unit">W</span>
                </div>
                <span class="descriptor">Producció</span>
            </div>
        </div>
        <div id="dataContainer">
            <div id="stats">
                <div id="chart-temp" class="my-chart">
                    <table class="charts-css column data-spacing-15">
                        <tr> <td> <span class="data"></span> </td> </tr>
                        <tr> <td> <span class="data"></span> </td> </tr>
                        <tr> <td> <span class="data"> </span> </td> </tr>
                        <tr> <td> <span class="data"> </span> </td> </tr>
                        <tr> <td> <span class="data"> </span> </td> </tr>
                    </table>
                </div>
                <div id="chart-luz" class="my-chart" style="display: none;">
                    <table class="charts-css column data-spacing-15">
                        <tr> <td> <span class="data"></span> </td> </tr>
                        <tr> <td> <span class="data"></span> </td> </tr>
                        <tr> <td> <span class="data"> </span> </td> </tr>
                        <tr> <td> <span class="data"> </span> </td> </tr>
                        <tr> <td> <span class="data"> </span> </td> </tr>
                    </table>
                </div>
                <div id="chart-energia" class="my-chart" style="display: none;">
                    <table class="charts-css column data-spacing-15">
                        <tr> <td> <span class="data"></span> </td> </tr>
                        <tr> <td> <span class="data"></span> </td> </tr>
                        <tr> <td> <span class="data"> </span> </td> </tr>
                        <tr> <td> <span class="data"> </span> </td> </tr>
                        <tr> <td> <span class="data"> </span> </td> </tr>
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
            <div id="tableContainer">
                <div id="tables">
                    <table class="tables" id="tableTemp">
                        <tr>
                            <th>Data</th>
                            <th>Temperatura</th>
                        </tr>
                        <?php
                            // sqlite connection
                            $db = new PDO('sqlite:' . 'solar.db');
                            $res = $db->query("SELECT * FROM lectures ORDER BY data DESC");
                            $rows = $res->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($rows as $row) {
                                echo "<tr>";
                                echo "<td>" . $row['data']." - ". $row['hora'] . "</td>";
                                echo "<td>" . number_format($row['temperatura'], 5) . " °C" . "</td>";
                                echo "</tr>";
                            }   
                        ?>
                    </table>
                    <table class="tables" id="tableLuz" style="display: none;">
                        <tr>
                            <th>Data</th>
                            <th>Llum solar rebuda</th>
                        </tr>
                        <?php
                            // sqlite connection
                            $db = new PDO('sqlite:' . 'solar.db');
                            $res = $db->query("SELECT * FROM lectures ORDER BY data DESC");
                            $rows = $res->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($rows as $row) {
                                echo "<tr>";
                                echo "<td>" . $row['data']." - ". $row['hora'] . "</td>";
                                echo "<td>" . number_format($row['intensitat'], 3) . " W/m2" . "</td>";
                                echo "</tr>";
                            }   
                        ?>
                    </table>
                    <table class="tables" id="tableEnergia" style="display: none;">
                        <tr>
                            <th>Data</th>
                            <th>Producció</th>
                        </tr>
                        <?php
                            // sqlite connection
                            $db = new PDO('sqlite:' . 'solar.db');
                            $res = $db->query("SELECT * FROM lectures ORDER BY data DESC");
                            $rows = $res->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($rows as $row) {
                                echo "<tr>";
                                echo "<td>" . $row['data']." - ". $row['hora'] . "</td>";
                                echo "<td>" . number_format($row['produccio'], 3) . " W" . "</td>";
                                echo "</tr>";
                            }   
                        ?>
                    </table>
                </div>
                <div class="menuTables">
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
    </div>
    <?php
        // sqlite connection
        $db = new PDO('sqlite:' . 'solar.db');
        $hour = '12:00:00'; // Specify the hour you want to fetch data for
        $hour_start = '11:30:00'; // Start of the range
        $hour_end = '11:35:00'; // End of the range
        $res = $db->query("SELECT * FROM lectures WHERE hora BETWEEN '$hour_start' AND '$hour_end' ORDER BY data DESC LIMIT 120");
        $rows = $res->fetchAll(PDO::FETCH_ASSOC);
        // for js
        $data = json_encode($rows);
    ?>
    <script>
        // inner html with php
        var data = <?php echo $data; ?>;
        
        document.getElementById('tempValue').innerHTML += Math.round(data[0].temperatura);
        document.getElementById('luzValue').innerHTML += Math.round(data[0].intensitat);
        document.getElementById('energiaValue').innerHTML += Math.round(data[0].produccio);
    </script>
    <script src="index.js"></script>
    <script src="ajax.js"></script>
</body>
</html>