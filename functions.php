<?php

/**
 * gets most recent row of data from about table in portfolio db
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
 * gets data from skills table in portfolio db, excludes deleted skills
 *
 * @param $db db portfolio database
 * @return array
 */
function getSkills($db) :array {
    $skillsQuery = $db->prepare("SELECT * FROM `skills` WHERE `deleted` = 0");
    $skillsQuery->execute();
    return $skillsQuery->fetchAll();
}

/**
 * displays skills images, loops through all active skills
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


function insertSkill($db, $postData) {

    $query= $db->prepare("INSERT INTO `skills` (`skillName`,`imageSource`,`alternative`) VALUES (:skillName, :imageSource, :alternative);");

    $query->bindParam(':skillName', $postData['skillName']);
    $query->bindParam(':imageSource', $postData['imageSource']);
    $query->bindParam(':alternative', $postData['alternative']);

    $query->execute();

}

function insertAboutToDb($db, $postData) {

    $query= $db->prepare("INSERT INTO `about` (`photoSource`,`photoAlt`,`description`) VALUES (:photoSource, :photoAlt, :description);");

    $query->bindParam(':photoSource', $postData['photoSource']);
    $query->bindParam(':photoAlt',$postData['photoAlt']);
    $query->bindParam(':description',$postData['description']);

    $query->execute();

}



