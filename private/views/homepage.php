<?php include 'header.php';
?>

<div class="home__intro">
    <div class="intro__container">
        <p class="intro__title">Hoi, mijn naam is Cornell<br>Ik ben een <span class="blue-text">Web Developer</span> met een passie voor Back-End</p>
        <div class="intro__quote">
            <p class="quote__text">Talk is cheap. Show me the code.</p>
            <p class="blue-text quote__author">- Linus Torvalds</p>
        </div>
        <div class="intro__socials">
            <ul class="intro__list">
                <li class="intro__list-item">
                    <a target="_blank" href="https://www.linkedin.com/in/cornell-van-der-straaten-865519192/" class="intro__list-item__link">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </li>
                <li class="intro__list-item">
                    <a target="_blank" href="https://github.com/CornellVanDerStraaten" class="intro__list-item__link">
                        <i class="fab fa-github"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="home__home-about">
    <div class="home-about__grid">
        <h2 class="home-about__title blue-text">Over mij</h2>
        <div class="home-about__img-container">
            <img src="<?php echo site_url() . '/img/about-image.jpeg' ?>" alt="Cornell van der Straaten" class="home-about__img">
        </div>
        <div class="home-about__container">
            <h1 class="home-about__name">Cornell van der Straaten</h1>
            <p class="home-about__text">Hoi, ik ben Cornell van der Straaten. Een front- en backend developer.
                Ik ben geinteresseerd en gepassioneerd over alles development gerelateerd.
                Momenteel volg ik een MBO studie op het Mediacollege Amsterdam.
                Ook heb ik samen met Mees Postma een klein bedrijf gestart waar wij wordpress websites en hosting opzetten en ook SEO verzorgen.
            </p>

            <a href="<?php echo site_url('/resume.pdf') ?>" target="_blank" class="about-info__cv-button home-about__knop">NAAR CV</a>
        </div>
    </div>
</div>
<div class="gray-row">
    <div class="projecten__container ">
    <h2 class="projecten__title blue-text">Mijn werk</h2>
    <div class="owl-carousel owl-theme home-carousel">
    <?php foreach ($projecten as $row) { ?>
        <a href="<?php echo site_url('/projectDetails/') . $row['id'] ?>" class="project">
            <div class="project__overlay">
                <h2 class="project__title"><?php echo $row['project_naam'] ?></h2>
                <p class="project__keywords"><?php echo $row['keywords'] ?></p>
            </div>
            <img class="project__image" src="<?php echo site_url('') . '/uploads/' . $row['project_image']; ?>" alt="<?php echo 'Logo of ' . $row['project_naam']; ?>">
        </a>
    <?php } ?>
    </div>
</div>
</div>


<div class="contact__container">
    <h2 class="contact__title blue-text">Contact mij</h2>
    <form action="#" class="contact-form">
        <input type="text" class="contact-form__input" name="contact_naam" id="contactNaamInput" placeholder="Naam">
        <input type="mail" class="contact-form__input" name="contact_mail" id="contactMailInput" placeholder="E-mail">
        <input type="text" class="contact-form__input" name="contact_bericht" id="contactBerichtInput" placeholder="Bericht">
    </form>
</div>

<?php include 'footer.php'  ?>