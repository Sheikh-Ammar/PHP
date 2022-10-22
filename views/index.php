<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 8</title>
</head>

<body>

    <!-- FIRST TAG PHP -->
    <?= "Hello World"
    ?>

    <br>

    <!-- CONDITIONS AND BOOLEAN -->
    <?php
    $condition = true;
    $ternoryCondition = false;
    if ($condition) {
        echo "This is if statememnt";
    } else {
        echo "This is else statememnt";
    }
    echo "<br>";
    echo $ternoryCondition ? "Ternary Condition is true" : "Ternary Condition is false";
    ?>
</body>

</html>