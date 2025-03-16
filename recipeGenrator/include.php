<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./simple.css"/>
    <title>Document</title>
</head>
<body>
<?php
function e($value)
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

$pages = ['citrus_salmon' => "Citrus Symphony Salmon",
    'mediterranian_pasta' => 'Mediterranean Marvel Pasta',
    'sunset_risotto' => 'Sunset Risotto',
    'tropical_tacos' => 'Tropical Tango Tacos'];
?>


<form action="include.php" method="get">
    <label for="page"></label>
    <select name="page" id="page">
        <option value="">Please select a recipe</option>
        <?php foreach ($pages as $key => $value): ?>
            <option value="<?= e($key) ?>" <?php if (!empty($_GET['page']) && $_GET['page'] == e($key)) echo 'selected' ?> ><?= e($value) ?></option>
        <?php endforeach; ?>

    </select>
    <input type="submit" value="Submit!">
</form>


<?php


// include "pages/$_GET[page].php"; // attention injection SQL
if (!empty($_GET['page'])) {
    $page = $_GET['page'];

    foreach ($pages as $pageList => $title) {
        if ($page == $pageList) {
            echo file_get_contents("pages/$page.php");
        }
    }
}

// echo file_get_contents("pages/$_GET[page].php"); }// emepeche lexecution de fichier PHP
?>

</body>
</html>
