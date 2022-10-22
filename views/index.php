<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 8</title>
</head>

<body>

    <h1>First Tag</h1>
    <!-- FIRST TAG PHP -->
    <?= "Hello World"
    ?>

    <br>

    <!-- CONDITIONS AND BOOLEAN -->
    <h1>Conditional Statement</h1>
    <?php
    $condition = true;
    $ternoryCondition = false;
    if ($condition) :
        echo "This is if statememnt";
    else :
        echo "This is else statememnt";
    endif;
    echo "<br>";
    echo $ternoryCondition ? "Ternary Condition is true" : "Ternary Condition is false";
    ?>

    <br>

    <!-- ARRAY -->
    <h1>Arrays</h1>
    <?php
    $books = ["Phy", "Chem", "Math"];
    echo "&nbsp;";
    echo "At Index 1 : " . $books[1] . "&nbsp";
    ?>
    <ol>
        <?php
        foreach ($books as $key => $book) {
            echo "<li>" . $book . "</li>";
        }
        ?>
    </ol>

    <br>

    <!-- ASSOCIATIVE ARRAY -->
    <h1>Associative Array</h1>
    <?php
    $GLOBALS['newBooks'] = [
        [
            'name' => 'Phy',
            'author' => 'ammar',
            'link' => 'https://ammardeveloper.000webhostapp.com/',
        ],
        [
            'name' => 'Chem',
            'author' => 'adnan',
            'link' => 'https://ammardeveloper.000webhostapp.com/',
        ],
        [
            'name' => 'Math',
            'author' => 'zain',
            'link' => 'https://ammardeveloper.000webhostapp.com/',
        ]
    ];
    ?>
    <ul>
        <?php foreach (filterNewBookByAuthor($newBooks) as $key => $book) : ?>
            <li>
                <a href="<?= $book['link'] ?>">
                    <?= "Booke name is: " . $book['name'] ?> - <?= " By author: " . $book['author'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <br>

    <!-- FUNCTIONS AND FILTERING -->
    <h1>Functions and Filtering</h1>
    <?php
    function filterNewBookByAuthor($value)
    {
        $filterBooks = [];
        foreach ($value as $item) {
            if ($item['author'] == 'ammar') {
                $filterBooks[] = $item;
            }
        }
        return $filterBooks;
    }
    // call in asso array
    ?>
</body>

</html>