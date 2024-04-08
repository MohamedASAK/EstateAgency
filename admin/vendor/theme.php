<?php
    include_once 'C:\xampp\htdocs\EstateAgency\admin\vendor\configDB.php';
    //Theme Select
    $oneTheme = "SELECT `color` FROM `theme` WHERE id = 1;";
    $selectTheme = mysqli_query($connect, $oneTheme);
    $rowTheme = mysqli_fetch_assoc($selectTheme);

    if (isset($_GET['theme'])) {
        $color = $_GET['theme'];
        $updateTheme = "UPDATE `theme` SET color = $color WHERE id =1";
        $updateThemeRun = mysqli_query($connect, $updateTheme);
        header("location: estateagency/admin/index.php");
    }
