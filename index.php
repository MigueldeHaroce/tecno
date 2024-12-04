<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>
    <form action="functioncalling.php">
        <input type="text" name="txt" />
        <input type="submit" class="button" name="insert" value="insert" />
        <input type="submit" class="button" name="select" value="select" />
    </form>

    <?php
        function abc($name){
            // Your code here
        }
    ?>
    <script src="index.js"></script>
    <script>
        document.get("myAnchor").addEventListener("click", function(event){
            event.preventDefault()
        });
    </script>
</body>
</html>