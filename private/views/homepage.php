<?php include 'header.php';
?>

<div class="home__intro">
    <div class="intro__container">
        <p class="intro__title">Hoi, mijn naam is Cornell<br>Ik ben een <span class="blue-text">Web Developer</span> met een passie voor Back-End</p>
        <div class="intro__quote">
            <p class="quote__text">Talk is cheap. Show me the code.</p>
            <p class="blue-text quote__author">- Linus Torvalds</p>
        </div>
    </div>

</div>

<div class="home__home-about">

</div>

<div class="projecten__container">
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

<?php include 'footer.php'  ?>