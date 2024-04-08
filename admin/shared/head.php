<?php 
  include_once 'C:\xampp\htdocs\EstateAgency\admin\vendor\configDB.php'; 
  include_once 'C:\xampp\htdocs\EstateAgency\admin\vendor\theme.php'; 
  include_once 'C:\xampp\htdocs\EstateAgency\admin\vendor\functions.php'; 
  auth();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Estate Agency</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= url("assets/img/favicon.png")?>" rel="icon">
    <link href="<?= url("assets/img/apple-touch-icon.png")?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= url("assets/vendor/bootstrap/css/bootstrap.min.css")?>" rel="stylesheet">
    <link href="<?= url("assets/vendor/bootstrap-icons/bootstrap-icons.css")?>" rel="stylesheet">
    <link href="<?= url("assets/vendor/boxicons/css/boxicons.min.css")?>" rel="stylesheet">
    <link href="<?= url("assets/vendor/quill/quill.snow.css")?>" rel="stylesheet">
    <link href="<?= url("assets/vendor/quill/quill.bubble.css")?>" rel="stylesheet">
    <link href="<?= url("assets/vendor/remixicon/remixicon.css")?>" rel="stylesheet">
    <link href="<?= url("assets/vendor/simple-datatables/style.css")?>" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="<?= url("assets/css/style.css")?>" rel="stylesheet">
  <?php if(isset($_SESSION['admin'])): ?>
    <?php if($_SESSION['admin']['theme'] == 'light'):?>
      <link href=<?= url("assets/css/lightStyle.css")?> rel="stylesheet">
    <?php else:?>
      <link href=<?= url("assets/css/darkStyle.css")?> rel="stylesheet">
    <?php endif;?>
  <?php endif;?>
</head>
<body>