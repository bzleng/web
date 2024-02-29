<?php
$postsDirectory = './posts';
$posts = array_diff(scandir($postsDirectory), array('..', '.', 'index.html')); 
$requestedPostId = isset($_GET['id']) ? $_GET['id'] : null;

$postsData = [];

foreach ($posts as $post) {
    $postContent = file_get_contents($postsDirectory . '/' . $post);
    $postArray = json_decode($postContent, true);

    if ($requestedPostId !== null) {
        if ($postArray['id'] == $requestedPostId) {
            $postsData[] = $postArray;
            break; 
        }
    } else {
        $postsData[] = $postArray;
    }
}

// Sort the posts by date in descending order
usort($postsData, function ($a, $b) {
    return strtotime($b['date']) - strtotime($a['date']);
});

header('Content-Type: application/json');
echo json_encode($postsData);
