<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/output.css">
    <title> <?= ucwords(preg_replace("/[-_]/", " ", $data["title"])) ?></title>
    <script src="<?= BASEURL; ?>/js/jquery.min.js"></script>
    <script src="<?= BASEURL; ?>/js/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/sweetalert2.min.css">
</head>

<body class="bg-white">