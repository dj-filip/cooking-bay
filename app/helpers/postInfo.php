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

    $wordNum = 50;

    $limited = array_values(explode(' ', $description, $wordNum));

    if(count($limited) == 50) {
        array_pop($limited);
    }

    $descriptionLmtd = implode(' ', $limited);
    return trim(strip_tags($descriptionLmtd)) . '...READ MORE';
}

function decode($postDescription) {

    $descDecoded = strip_tags(str_replace('&nbsp;', ' ', html_entity_decode($postDescription)));

    return $descDecoded;
}


?>