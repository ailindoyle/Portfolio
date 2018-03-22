<?php


////////////ABOUT PAGE CONTENT MANAGEMENT FUNCTIONS///////////////

/**
 * fetches most recent row of data from about table in portfolio db
 *
 * @param $db db portfolio database
 * @return array most recent row in about table
 */
function getAboutInfo($db) :array {
    $query = $db->prepare("SELECT * FROM `about` WHERE `deleted` = 0 ORDER BY `dateAdded` DESC LIMIT 1");
    $query->execute();
    return $query->fetch();
}

/**
 * inserts new about information from about admin form to about table of portfolio db as new row
 *
 * @param $db portfolio db
 * @param $postData represents form post data to be input into the table
 */
function insertAboutToDb($db, $postData) {

    $query= $db->prepare("INSERT INTO `about` (`photoSource`,`photoAlt`,`description`) VALUES (:photoSource, :photoAlt, :description);");

    $query->bindParam(':photoSource', $postData['photoSource']);
    $query->bindParam(':photoAlt',$postData['photoAlt']);
    $query->bindParam(':description',$postData['description']);

    $query->execute();

}

/**
 * fetches data from skills table in portfolio db, excludes deleted skills
 *
 * @param $db db portfolio database
 * @return array returns all skills excluding deleted
 */
function getSkills($db) :array {
    $skillsQuery = $db->prepare("SELECT * FROM `skills` WHERE `deleted` = 0");
    $skillsQuery->execute();
    return $skillsQuery->fetchAll();
}

/**
 * displays skills images on portfolio about page, loops through all active skills
 *
 * @param array $skillsRow all data in a row relating to a skill
 * @return string html string to define / describe skill images and alternative text
 */
function displaySkills(array $skillsRow) :string {
    $result = ' ';
    foreach ($skillsRow as $skills) {
        $result .= "<div class='skills-logo col-4 lg-tb-col-3 sm-tb-col-2 mb-col-1'><img src='" . $skills['imageSource'] . "' alt='" . $skills['alternative'] . "'></div>";
    }
    return $result;
}

/**
 * Creates form in about admin page for each skill in the skills table of portfolio db
 *
 * @param array $skillsRow each row of the table as individual skill includes data required by a tags in html
 * @return string returns string that defines html table with edit and delete buttons
 */
function createSkillsForm(array $skillsRow) :string {
    $result = ' ';
    foreach ($skillsRow as $skill) {
       $result .= "<form method='post' action='about_skill_manage.php'>
            <tr>
                <td>
                    " . $skill['skillName'] . "
                </td>
                <td>
                    " . $skill['imageSource'] . "
                </td>
                <td>
                    " . $skill['alternative'] . "
                </td>
                <td>
                    <input type='submit' name='edit' value='Edit'>
                    <input type='submit' name='delete' value='Delete'>
                    <input type='hidden' name='id' value='" . $skill['id'] . "'>
                </td>
            </tr>
        </form>";
    }
    return $result;
}

/**
 * inserts new skills into skills table of portfolio db from about admin form
 *
 * @param $db portfolio database
 * @param $postData represents form post data to be input into the table
 */
function insertSkill($db, $postData) {

    $query= $db->prepare("INSERT INTO `skills` (`skillName`,`imageSource`,`alternative`) VALUES (:skillName, :imageSource, :alternative);");

    $query->bindParam(':skillName', $postData['skillName']);
    $query->bindParam(':imageSource', $postData['imageSource']);
    $query->bindParam(':alternative', $postData['alternative']);

    $query->execute();

}


/////////////////////PORTFOLIO PAGE CONTENT MANAGEMENT FUNCTIONS////////////////////////////


/**
 * fetches project data from projects table in portfolio db
 *
 * @param $db database portfolio
 * @return array returns all projects, excludes deleted
 */
function getPortfolioInfo($db) :array {
    $projectQuery = $db->prepare("SELECT * FROM `projects` WHERE `deleted` = 0");
    $projectQuery->execute();
    return $query->fetch();
}


/**
 * displays projects into portfolio tab of website
 *
 * @param array $row single project contained within single row of project table
 * @return string html string to define / describe project image, link, description and alternative text
 */
function displayProjects(array $row) :string {
    $result = ' ';
    foreach ($row as $project) {
        $result .= "<div class='project-links col-3 tb-col-2 mb-col-1'><div class='project'>
                <a href='" . $project['link'] . "' target='_blank'><img src='" . $project['imageSource'] . "' alt='" . $project['alternativeText'] . "'></a>
                <p><?php echo'" . $project['projectDescription'] . "'</p>
            </div>
        </div> ";
    }
    return $result;
}

/**
 * inserts new projects from portfolio admin form to projects table in database
 *
 * @param $db database portfolio
 * @param $postData new project admin form post data placeholder
 */
function insertProject($db, $postData) {

    $query= $db->prepare("INSERT INTO `projects` (`projectDescription`,`link`, `imageSource`,`alternativeText`) VALUES (:projectDescription, :link, :imageSource, :alternativeText);");

    $query->bindParam(':projectDescription', $postData['projectDescription']);
    $query->bindParam(':link', $postData['link']);
    $query->bindParam(':imageSource', $postData['imageSource']);
    $query->bindParam(':alternativeText', $postData['alternativeText']);

    $query->execute();

}
