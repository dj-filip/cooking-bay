<?php 


function readTime($postDescription) {
    
    $decoded = strip_tags(html_entity_decode($postDescription)); 
    $wordNum = str_word_count($decoded);

    $time = $wordNum / 200;
    $readingTime = '';
    if ($time < 1) {
        $readingTime = 'short read';
    } else {
        $readingTime = floor($time) . ' min read';
    }

    return $readingTime;
}


function limitDescriptionLength($postDescription) {
    
    $description = str_replace('&nbsp;', ' ', html_entity_decode($postDescription)); 

    $limited = array();

    $wordNum = 25;

    $limited = array_values(explode(' ', $description, $wordNum));

    if(count($limited) == 5) {
        $limited[4] = '...' . $wordNum;
    }

    $descriptionLmtd = implode(' ', $limited);
    return strip_tags($descriptionLmtd);
}

function test($postDesc) {
    $desc = htmlentities($postDesc);
    // $desc = html_entity_decode($postDesc, ENT_COMPAT, 'UTF-8');
    $descDecode = strip_tags(html_entity_decode($desc));

    return $descDecode;
}


?>