<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memes site!</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/panel.css">
    <link rel="stylesheet" href="styles/pageSelector.css">
</head>
<body>
    <div class="header">
        <?php include "elementsGenerator/header.php"?>
    </div>
    <div style="margin-bottom: 50px;"></div>

    <div class="feed">
        <?php include "elementsGenerator/feedGenerator.php"?>
    </div>

    <div class="pageSelector">
        <?php include "elementsGenerator/pageSelector.php"?>
    </div>
</body>
</html>