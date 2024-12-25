<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./simple.css" />
    <title>Document</title>
</head>

<body>
    <?php
    function e($value)
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }

    ?>

    <?php
    $pages = [
        'citrus_salmon' => 'citrus salmon',
        'mediterranian_pasta' => 'mediterranian pasta',
        'sunset_risotto' => 'sunset risotto',
        'tropical_tacos' => 'tropical tacos',
    ];
    ?>

    <form method="GET" action="include.php">
        <select name="page">
            <option value="">Please select a recipe</option>
            <?php foreach ($pages as $pageKey => $pageValue) { ?>
                <option value=<?php echo e($pageKey); ?> <?php if (!empty($_GET['page']) && $_GET['page'] == $pageKey) echo 'selected'; ?>><?php echo e($pageValue) ?></option>
            <?php } ?>


        </select>
        <input type="submit" value="Submit!" />
    </form>


    <?php
    if (!empty($_GET['page'])) {
        $page = $_GET['page'];
        if (isset($pages[$page])) {
        echo file_get_contents("pages/{$page}.html");
        }
    }
    ?>



</body>

</html>