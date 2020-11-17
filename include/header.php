<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title :"mychat"; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Pacifico&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/myChat/css/bootstrap.min.css">
    <link rel="stylesheet" href="/myChat/css/font-awesome.min.css">
    <?php
    if(isset($reg))
        echo '<link rel="stylesheet" href="/myChat/css/register.css">'; 
    ?>
    <link rel="stylesheet" href="/myChat/css/main.css">
</head>
<body>
