<?php include 'header.php';  ?>
<div class="intro">
    <p class="intro__quote">
        “Passion is caused by ambition, ambition inspires curiosity and curiosity creates good programmers. Those create good programs and make the world a happy and lazy place.”
    </p>
    <p class="intro__person">
        - Cornell van der Straaten
    </p>
</div>
<div class="projecten__container">
    <?php foreach ($projecten as $row) { ?>
        <a href="<?php echo site_url('/projectDetails/') . $row['id'] ?>"  class="project">
            <div class="project__overlay">
                <h2 class="project__title"><?php echo $row['project_naam'] ?></h2>
                <p class="project__keywords"><?php echo $row['keywords'] ?></p>
            </div>
            <img class="project__image" src="<?php echo site_url('') . '/uploads/' . $row['project_image']; ?>" alt="<?php echo 'Logo of ' . $row['project_naam']; ?>">
    </a>
    <?php } ?>
</div>

<?php include 'footer.php'  ?>