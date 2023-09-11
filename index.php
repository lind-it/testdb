<?
    include $_SERVER["DOCUMENT_ROOT"] . "/php/config.php";
    include $_SERVER["DOCUMENT_ROOT"] . "/php/functions.php";
    require 'smarty-4.3.2/libs/Smarty.class.php';
    require __DIR__ . '/vendor/autoload.php';

    $mysqli = new mysqli(HOSTNAME, USERNAME, PASSWORD, DBNAME);

    if ($mysqli->connect_errno) {
        printf("Ошибка подключения к базе: %s\n", $mysqli->connect_error);
        exit();
    }

    $query = "SELECT 
    (SELECT `NL_VIEW_SHORT` FROM `NL_VIEW` WHERE `NL_VIEW`.`ID_NL_VIEW` = `NL_PROP_RESALE`.`ID_NL_VIEW`) AS VIEW,
    (SELECT `NL_MATERIAL_SHORT` FROM `NL_MATERIAL` WHERE `NL_MATERIAL`.`ID_NL_MATERIAL` = `NL_PROP_RESALE`.`ID_NL_MATERIAL`) AS MATERIAL,
    (SELECT `NL_HOUSES_SHORT` FROM `NL_HOUSES` WHERE `NL_HOUSES`.`ID_NL_HOUSES` = `NL_PROP_RESALE`.`ID_NL_HOUSES`) AS HOUSES,
    `NL_PROP_RESALE_FLOOR` AS FLOOR, `NL_PROP_RESALE_PHOTO_URLS` AS PHOTOS, `NL_PROP_RESALE_COST_TOTAL` AS COAST, `NL_PROP_RESALE_AREA_FULL` AS AREA, `NL_PROP_RESALE_ADDRESS` AS ADRESS, `NL_PROP_RESALE_DESCRIPTION` AS DESCRIPTION, `NL_PROP_RESALE_PHONE` AS PHONE
    FROM `NL_PROP_RESALE`";
    $data = $mysqli->query($query);

    $outputdata = [];
    while ($row = $data->fetch_assoc()) {

        $desc = urldecode($row["DESCRIPTION"]);
        $lexer = new \nadar\quill\Lexer($desc);

        $outputdata[] = [
            'view' =>$row['VIEW'],
            'material' =>$row['MATERIAL'],
            'home_type' =>$row['HOUSES'],
            'photos' => json_decode($row['PHOTOS']),
            'coast' => $row['COAST'],
            'area' => $row['AREA'],
            'adress' => $row['ADRESS'],
            'desc' =>  $lexer->render(),
            'phone' => $row['PHONE']
        ];
        
    }

    $smarty = new Smarty;
    $smarty->assign('array', $outputdata);

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>TestDB</title>
    <meta name="viewport" content="width=device-width">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body class="testdb">
    <?php
        $smarty->display('apartment.tpl');
    ?>
</body>
</html>
