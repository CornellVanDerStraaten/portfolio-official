<?php include 'header.php'; ?>
<form class="project-details__addProjectForm" method="POST" action="<?php echo site_url('/adminInsertProject') ?>">
    <!-- Also submit basic project information -->
    <input type="hidden" name="basic_project_information[project_naam]"       value="<?php echo $basic_project_info['post_info']['project_naam'] ?>">
    <input type="hidden" name="basic_project_information[project_keywords]"   value="<?php echo $basic_project_info['post_info']['project_keywords'] ?>">
    <input type="hidden" name="basic_project_information[project_cover_img]"  value="<?php echo $basic_project_info['filename'] ?>">


    <div class="project-details__container">
        <div class="project-details__project-intro">
            <div class="project-intro__left">
                <img class="project-intro__img" src="<?php echo site_url('') . '/uploads/' . $basic_project_info['filename']; ?>" alt="Project Image Preview">
            </div>

            <div class="project-intro__right">
                <h1 class="project-intro__titel"><?php echo $basic_project_info['post_info']['project_naam'] ?></h1>
                <textarea class="project-intro__textarea" name="projectIntroText" id="projectIntroText" cols="30" rows="5"></textarea>

                <div class="project-intro__link-input-div">
                    <input class="project-intro__checkbox" type="checkbox" name="liveLinkCheckbox" id="liveLinkCheckbox" onclick="liveLinkActivate()">
                    <label class="project-intro__label" id="projectIntroLiveLabel" for="liveLinkCheckbox">Link to live project</label>
                </div>

                <div class="project-intro__link-input-div">
                    <input class="project-intro__checkbox" type="checkbox" name="githubLinkCheckbox" id="githubLinkCheckbox" onclick="githubLinkActivate()">
                    <label class="project-intro__label" id="projectIntroGithubLabel" for="githubLinkCheckbox">Link to github repo</label>
                </div>
            </div>

        </div>
        <div class="project-details__TLDR">
            <h2 class="project-details__title">TL;DR</h2>
            <hr class="project-details__hr">
            <textarea class="TLDR__textarea" id="mytextarea" name="TLDR"></textarea>
        </div>
        <div class="project-details__project-content">
            <h2 class="project-details__title">Project Process</h2>
            <hr class="project-details__hr">
            <textarea class="TLDR__textarea" id="mytextareaprocess" name="project-content-textarea"></textarea>
        </div>
        <div class="project-details__submit-div">
            <input class="admin-login__submit project-details__submit" type="submit" value="Verstuur">
        </div>
    </div>
</form>

<script src="<?php echo site_url('/js/script.js') ?>"></script>
<script src='https://cdn.tiny.cloud/1/tzm3w2o3juzjq71ip92kwtit6fvnmz7xqqutxiq219xaw7o5/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#mytextarea',
        height: 500,
        plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker tinydrive image imagetools code link',
        toolbar: "insertfile image link | code" + 'undo redo | formatselect | ' + 'bold italic backcolor | alignleft aligncenter ' + 'alignright alignjustify | bullist numlist outdent indent | ' + 'removeformat | help',
        menu: {
            insert: {
                title: "Insert",
                items: "insertfile"
            }
        },
        insert_button_items: "insertfile",
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Cornell van der Straaten',
        tinydrive_token_provider: '<?php echo site_url('/jwt') ?>',
        tinydrive_upload_path: "<?php echo site_url('/uploads/projectImages') ?>"
    });
    tinymce.init({
        selector: '#mytextareaprocess',
        height: 1000,
        plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker tinydrive image imagetools code link',
        toolbar: "insertfile image link | code" + 'undo redo | formatselect | ' + 'bold italic backcolor | alignleft aligncenter ' + 'alignright alignjustify | bullist numlist outdent indent | ' + 'removeformat | help',
        menu: {
            insert: {
                title: "Insert",
                items: "insertfile"
            }
        },
        insert_button_items: "insertfile",
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Cornell van der Straaten',
        tinydrive_token_provider: '<?php echo site_url('/jwt') ?>',
        tinydrive_upload_path: "<?php echo site_url('/uploads/projectImages') ?>"
    });
</script>
<?php include 'footer.php'; ?>