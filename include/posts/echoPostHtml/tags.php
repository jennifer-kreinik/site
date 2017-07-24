<?php
function getAllTags(){
    return $tagTypes = dbQuery("
        SELECT *
        FROM tags
        ")->fetchALL();
    }
function listOfAllTags(){
    $tagTypes=getAllTags();
    $tagArray = array();
    $returnTags = "";
        foreach ($tagTypes as $tagsOrganized){
            if(!@$tagArray[$tagsOrganized['tagName']]){
                $tagArray[$tagsOrganized['tagName']] = true;
            }
            $returnTags .= "<br/><div class='resume'> ".$tagsOrganized['tagName']." </div>";
        }
        return $returnTags;
}
function tagDropDownMenu(){
    $tagTypes = getAllTags();
    $tagArray = array();
        $returnDropDownMenu = "";
        foreach ($tagTypes as $tagsOrganized){
            if(!@$tagArray[$tagsrganized['tagName']]){
                $tagArray[$tagsOrganized['tagName']] = true;
            }
            $returnDropDownMenu .= "<option value='".$tagsOrganized['tagName']."'>".$tagsOrganized['tagName']."</option>";
        }
        return $returnDropDownMenu;
    }
function currentTagDropDownMenu($postId){
        $currentTags = dbQuery("
            SELECT *
            FROM blogPost_tags_linked
            WHERE blogPostId = :varPostId
            ", array("varPostId"=>$postId))
            ->fetchALL();
        $tagArray = array();
        $returnDropDownMenu = "";
            foreach ($currentTags as $existingTags){
                if(!@$tagArray[$existingTags['tagName']]){
                    $tagArray[$existingTags['tagName']] = true;
                    }
                $returnDropDownMenu .= "<option value='".$existingTags['tagName']."'>".$existingTags['tagName']."</option>";
                }
            return $returnDropDownMenu;
}
