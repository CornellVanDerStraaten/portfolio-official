<?php isSessionStarted(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cornell van der Straaten Portfolio</title>
    <meta name="description" content="Portfolio van software developer Cornell van der Straaten">
    <script src="https://kit.fontawesome.com/1eb7c10cba.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/jpg" href="<?php echo site_url() . '/img/headerLogo.svg' ?>"/>
    <link rel="stylesheet" href="<?php echo site_url('/') . 'css/style.css'?>">
</head>

<body>
    <header>
        <div class="header-div">
            <a href="<?php echo url('home') ?>" class="header-div__logo-link">
                <img src="<?php echo site_url() . '/img/headerLogo.svg' ?>" alt="" class="header-div__logo-img">
            </a>
            <nav class="header__nav" id="headerNav">
                <ul class="header__list">
                    <a href="<?php echo url('about') ?>" class="header__link"><li class="header__list-item">About</li></a>
                </ul>
            </nav>
        </div>

    </header>
  