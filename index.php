<?php
include('vendor/autoload.php');
use Google\Cloud\Firestore\FirestoreClient;

$config = [
    'keyFilePath' => '/src/token.json'
];

// Create the Cloud Firestore client
$db = new FirestoreClient($config);

$usersRef = $db->collection('users');
$snapshot = $usersRef->documents();
foreach ($snapshot as $user) {
    printf("User: %s \n", $user->id());
    printf("User Action: %s \n", $user['action']);
    printf("User URL: %s \n", $user['url']);
    printf("User ID: %s \n", $user['id']);
    printf("----------------------------------------------\n");
}
