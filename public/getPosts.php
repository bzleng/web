<?php
$postsDirectory = './posts';
$posts = array_diff(scandir($postsDirectory), array('..', '.', 'index.html')); 

$postsData = [];

foreach ($posts as $post) {
    $postContent = file_get_contents($postsDirectory . '/' . $post);
    $postsData[] = json_decode($postContent, true);
}

// Sort the posts by date in descending order
usort($postsData, function ($a, $b) {
    return strtotime($b['date']) - strtotime($a['date']);
});

header('Content-Type: application/json');
echo json_encode($postsData);
