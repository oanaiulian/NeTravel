<?php
    require_once('res/db/database.php');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Travel Expert System">
        <meta name="keywords" content="Travel, System, Tourism, Romania, Destinations">
        <meta name="author" content="Iulian Oana">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="res/js/scroll.js"></script>
        <script src="res/js/index.js"></script>
        <link rel="stylesheet" href="res/css/style.css" type="text/css">
        <title>Output | NeTravel</title>
    </head>
    
    <body>
        <div class="output-bg">
        
        <?php
            
            $sql = "
                    SELECT *
                    FROM location
                    ORDER BY locationID DESC
            ";
            

            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            while($row = $stmt->fetch()){
                print_r($row['locationName'] . "<br>");
            }
            $pdo=null;
        ?>
        </div>
    </body>
</html>


































