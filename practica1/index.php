<!-- 
    Exemple of calling function on php.
    Note: the echoes or prints goes throught jquery
-->

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
    function abc($name){
        echo "<p>Hello $name</p>";
    }

    function xyz($name){
        echo "<p>Hello $name, this is the final message!</p>";
    }
    function jaja($name){
        echo "<p>jajajaj</p>";
    }

    $name = $_POST['name'];
    $action = $_POST['action'];

    if ($action === 'insert') {
        abc($name);
    } elseif ($action === 'select') {
        xyz($name);
    } elseif ($action === 'jaja') {
        jaja($name);
    }

    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <form action="index.php" method="post">
        <input type="text" name="txt" />
        <input type="submit" class="button" name="insert" value="insert" />
        <input type="submit" class="button" name="select" value="select" />
        <input type="submit" class="button" name="jaja" value="jaja" />

    </form>

    <script src="index.js"></script>
</body>
</html>