<?php



////////////// HOME PAGE /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


/**
 * get home data from db
 *
 * @param $db
 * @return array
 */
function getHomeInfo($db) :array {
    $query = $db->prepare("SELECT `headerTop`, `headerBottom`, `summary` FROM `home` ORDER BY `dateAdded` DESC LIMIT 1");
    $query->execute();
    return $query->fetch();
}


/**
 * get featured projects from db
 *
 * @param $db
 * @return mixed
 */
function getFeaturedProjects($db) {
    $featuredQuery = $db->prepare("SELECT `link`, `imageSource`, `alternativeText`, `projectDescription` FROM `projects` WHERE `featured` = 1");
    $featuredQuery->execute();
    return $query->fetch();
}


///**
/// NOT WORKING
///
// * display featured projects
// *
// * @param $featuredRow
// * @return string
// */
//function displayFeaturedProjects($featuredRow) {
//    $result = ' ';
//    foreach ($featuredRow as $featured) {
//        $result .= "<div class='featured-project-links featured-project-one col-3 tb-col-2 mb-col-1'>
//            <div class='project'>
//                <a href='" . $featured['link'] . "' target='_blank'><img src='" . $featured['imageSource'] . "' alt='" . $featured['alternativeText'] . "'></a>
//                <p>'" . $featured['projectDescription'] . "'</p>
//            </div>
//        </div> ";
//    }
//    return $result;
//}


/**
 * inserts home info into home table of portfolio db from home admin form
 *
 * @param $db portfolio database
 * @param $postData represents form post data to be input into the table
 */
function insertHome($db, $postData) {

    $query= $db->prepare("INSERT INTO `home` (`headerTop`,`headerBottom`, `summary`) VALUES (:headerTop, :headerBottom, :summary);");

    $query->bindParam(':headerTop', $postData['headerTop']);
    $query->bindParam(':headerBottom', $postData['headerBottom']);
    $query->bindParam(':summary', $postData['summary']);

    $query->execute();

}



//////////// ABOUT PAGE CONTENT MANAGEMENT FUNCTIONS ///////////////////////////////////////////////////////////////////////////////////////////////

/**
 * fetches most recent row of data from about table in portfolio db
 *
 * @param $db db portfolio database
 * @return array most recent row in about table
 */
function getAboutInfo($db) :array {
    $query = $db->prepare("SELECT `photoSource`, `photoAlt`, `description` FROM `about` WHERE `deleted` = 0 ORDER BY `dateAdded` DESC LIMIT 1");
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
    $skillsQuery = $db->prepare("SELECT `imageSource`, `alternative` FROM `skills` WHERE `deleted` = 0");
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

/**
 * edits skill using form in manage skills
 *
 * @param $db portfolio database
 * @param $postData manage skills form post data placeholder
 */
function editSkill($db, $postData) {

    if ($postData['id'] != NULL) {
        $updateQuery = $db->prepare("UPDATE `skills` SET `skillName` = :skillName, `imageSource` = :imageSource, `alternative` = :alternative WHERE `id` = :id");
        $updateQuery->bindParam(':id', $postData['id']);
        $updateQuery->bindParam(':skillName', $postData['skillName']);
        $updateQuery->bindParam(':imageSource', $postData['imageSource']);
        $updateQuery->bindParam(':alternative', $postData['alternative']);

        $updateQuery->execute();

    }
}

/**
 * deletes skill from skills table by changing value from 0 to 1
 *
 * @param $db portfolio database
 * @param $postData manage skill form post data placeholder
 */
function deleteSkill($db, $postData) {

    if ($postData['delete'] != NULL && $postData['id'] != NULL) {
        $deleteQuery = $db->prepare("UPDATE `skills` SET `deleted` = 1 WHERE `id` = :id");
        $deleteQuery->bindParam(':id', $postData['id']);

        $deleteQuery->execute();

        header('Location: admin_about.php');
        exit();
    }

}

/**
 * populates single into form for editing using id number
 *
 * @param $db portfolio database
 * @param $postData manage skills form post data placeholder
 * @return mixed returns data from row of id for editing
 */
function getSingleSkill($db, $postData) {
    $fetchQuery = $db->prepare("SELECT `imageSource`, `alternative` FROM `skills` WHERE `id` = :id");
    $fetchQuery->bindParam(':id', $postData['id']);
    $fetchQuery->execute();
    return $fetchQuery->fetch();
}


///////////////////// PORTFOLIO PAGE CONTENT MANAGEMENT FUNCTIONS /////////////////////////////////////////////////////////////////////////////////////////////////


/**
 * fetches project data from projects table in portfolio db
 *
 * @param $db database portfolio
 * @return array returns all projects, excludes deleted
 */
function getPortfolioInfo($db) :array {
    $projectQuery = $db->prepare("SELECT `link`, `imageSource`, `alternativeText`, `projectDescription`, `id` FROM `projects` WHERE `deleted` = 0");
    $projectQuery->execute();
    return $projectQuery->fetchAll();
}

/**
 * displays projects into portfolio tab of website
 *
 * @param array $row single project contained within single row of project table
 * @return string html string to define / describe project image, link, description and alternative text
 */
function displayProjects(array $portfolioInfo) :string {
    $result = ' ';
    foreach ($portfolioInfo as $project) {
        $result .= "<div class='project-links col-3 tb-col-2 mb-col-1'><div class='project'>
                <a href='" . $project['link'] . "' target='_blank'><img src='" . $project['imageSource'] . "' alt='" . $project['alternativeText'] . "'></a>
                <p>" . $project['projectDescription'] . "</p>
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

/**
 * edits project using form in portfolio update
 *
 * @param $db portfolio database
 * @param $postData edit project admin form post data placeholder
 */
function editProject($db, $postData) {

    if ($postData['id'] != NULL) {

        $updateQuery = $db->prepare("UPDATE `projects` SET `projectDescription` = :projectDescription, `link` = :link, `imageSource` = :imageSource, `alternativeText` = :alternativeText WHERE `id` = :id");
        $updateQuery->bindParam(':id', $postData['id']);
        $updateQuery->bindParam(':projectDescription', $postData['projectDescription']);
        $updateQuery->bindParam(':link', $postData['link']);
        $updateQuery->bindParam(':imageSource', $postData['imageSource']);
        $updateQuery->bindParam(':alternativeText', $postData['alternativeText']);

        $updateQuery->execute();

    }
}

/**
 * deletes project from projects table by changing value from 0 to 1
 *
 * @param $db portfolio database
 * @param $postData delete project admin form post data placeholder
 */
function deleteProject($db, $postData) {

    if ($postData['delete'] != NULL && $postData['id'] != NULL) {
        $deleteQuery = $db->prepare("UPDATE `projects` SET `deleted` = 1 WHERE `id` = :id");
        $deleteQuery->bindParam(':id', $postData['id']);

        $deleteQuery->execute();

        header('Location: admin_portfolio.php');
        exit();
    }

}

/**
 * redirects back to admin page if stuck
 *
 * @param $postData project admin form post data placeholder
 */
function redirectIfStuck ($postData) {

    if ($postData['edit'] == NULL || $postData['id'] == NULL) {
        header('Location: admin.php');
        exit();
    }

}

/**
 * populates single into form for editing using id number
 *
 * @param $db portfolio database
 * @param $postData edit project admin form post data placeholder
 * @return mixed returns data from row of id for editing
 */
function getSingleProject($db, $postData) {
    $fetchQuery = $db->prepare("SELECT `id`, `projectDescription`, `link`, `imageSource`, `alternativeText` FROM `projects` WHERE `id` = :id");
    $fetchQuery->bindParam(':id', $postData['id']);
    $fetchQuery->execute();
    return $fetchQuery->fetch();
}


///////////////////// CONTACT PAGE CONTENT MANAGEMENT FUNCTIONS /////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * fetches contact data from contact table in portfolio db
 *
 * @param $db database portfolio
 * @return array returns all contact data, excludes deleted
 */
function getContactInfo($db) :array {
    $query = $db->prepare("SELECT `description`, `email` FROM `contact` ORDER BY `dateAdded` DESC LIMIT 1");
    $query->execute();
    return $query->fetch();
}

/**
 * inserts contact info into contact table of portfolio db from contact admin form
 *
 * @param $db portfolio database
 * @param $postData represents form post data to be input into the table
 */
function insertContact($db, $postData) {

    $query= $db->prepare("INSERT INTO `contact` (`description`,`email`) VALUES (:description, :email);");

    $query->bindParam(':description', $postData['description']);
    $query->bindParam(':email',$postData['email']);

    $query->execute();

}



















