<?php include 'header.php'; ?>
<div class="project-details__container project-details__container-details">
    <div class="project-details__project-intro">
        <div class="project-intro__left">
            <img class="project-intro__img" src="<?php echo site_url('') . '/uploads/' . $project_info['project_image']; ?>" alt="Project Image Preview">
        </div>

        <div class="project-intro__right">
            <h1 class="project-intro__titel"><?php echo $project_info['project_naam'] ?></h1>
            <p class="project-intro__intro-text"><?php echo $project_info['project_intro_text'] ?></p>

            <?php if ( ! $project_info['github_link'] == 0 ) { ?>
                <div class="project-intro__link-div">
                    <a class="project-intro__link" href="<?php echo $project_info['github_link'] ?>" target="_blank">
                        <p>Github Link</p>
                    </a>
                </div>
            <?php } ?>

            <?php if ( ! $project_info['live_link'] == 0 ) { ?>
                <div class="project-intro__link-div">
                    <a class="project-intro__link" href="<?php echo $project_info['live_link'] ?>" target="_blank">
                        <p>See live version</p>
                    </a>
                </div>
            <?php } ?>

        </div>
    </div>

    <div class="project-details__TLDR">
        <h2 class="project-details__title">TL;DR</h2>
        <hr class="project-details__hr">
        <div class="TLDR__text">
            <?php echo $project_info['tldr']; ?>
        </div>
    </div>

    <div class="project-details__project-content">
        <h2 class="project-details__title">Project Process</h2>
        <hr class="project-details__hr">
        <div class="project-content__text">
            <?php echo $project_info['project_content']; ?>
        </div>
    </div>
</div>



<?php include 'footer.php'; ?>