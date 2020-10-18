<?php
// Model functions
// In dit bestand zet je ALLE functions die iets met data of de database doen

function userRegisteredCheck($email)
{
    $connection = dbConnect();
    $sql =  'SELECT * FROM `config` WHERE `email`= :email';
    $statement = $connection->prepare($sql);
    $statement->execute(['email' => $email]);

    return $statement;
}

function insertProject($postData)
{
    $connection = dbConnect();

    // Default links if no link has been given
    $githubLink = 0;
    $liveLink   = 0;
    if (isset($postData['githubLink'])) {
        $githubLink = $postData['githubLink'];
    }
    if (isset($postData['liveLink'])) {
        $liveLink = $postData['liveLink'];
    }

    $sql = 'INSERT INTO `projecten` (`project_naam`, `keywords`, `project_image`, `project_intro_text`, `github_link`, `live_link`, `tldr`, `project_content`)
            VALUES (:project_naam, :keywords, :project_image, :project_intro_text, :github_link, :live_link, :tldr, :project_content) ';
    $statement = $connection->prepare($sql);

    $params = [
        'project_naam'      => $postData['basic_project_information']['project_naam'],
        'keywords'          => $postData['basic_project_information']['project_keywords'],
        'project_image'     => $postData['basic_project_information']['project_cover_img'],
        'project_intro_text' => $postData['projectIntroText'],
        'github_link'       => $githubLink,
        'live_link'         => $liveLink,
        'tldr'              => $postData['TLDR'],
        'project_content'   => $postData['project-content-textarea']
    ];
    
    $statement->execute($params);
}

function getProjects()
{
    $connection = dbConnect();
    $sql = 'SELECT * FROM `projecten` ';
    $statement = $connection->prepare($sql);
    $statement->execute();

    return $statement;
}

function getProject($project_id)
{
    $connection = dbConnect();
    $sql = 'SELECT * FROM `projecten` WHERE `id` = :id';
    $statement = $connection->prepare($sql);
    $statement->execute(['id' => $project_id]);

    return $statement->fetch();
}