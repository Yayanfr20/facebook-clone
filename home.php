<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook - beranda</title>
    <!-- link css -->
    <?php include 'asset/inc/SetupLinkCSS.php'; ?>
</head>

<body>
    <!-- link javascript -->
    <?php include 'asset/inc/SetupLinkJS.php'; ?>
</body>

</html>