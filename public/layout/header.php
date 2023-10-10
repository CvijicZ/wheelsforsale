<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="public/style/style.css">
    <link rel="icon" type="image/x-icon" href="public/img/favicon.png">
    <!-- Option 1: Include in HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title> <?= $title ?> </title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">WheelsForSale</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbarToggler10"
        aria-controls="myNavbarToggler10" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myNavbarToggler10">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Pocetna</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="usersupport.php">Podrska</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Kontakt</a>
            </li>
        </ul>
        <ul id="menu" class="navbar-nav sm-icons mr-0">
            <li id="iconRegister" class="nav-item border border-dark"><a class="nav-link" href="#"><i  class="bi bi-person-plus-fill"></i>Napravi nalog</a></li>
            <li id="iconLogin" class="nav-item border border-dark"><a class="nav-link" href="#"><i  class="bi bi-box-arrow-in-left"></i>Prijavi se</a></li>
            <!-- <li class="nav-item"><a class="nav-link" href="#"><i id="icon" class="bi bi-box-arrow-in-right"></i>Log Out</a></li> -->           
        </ul>
    </div>
</nav>

    
