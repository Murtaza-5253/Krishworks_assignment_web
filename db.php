<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Contract\Auth;
use Kreait\Firebase\Contract\Firestore;
use Google\Cloud\Firestore\FirestoreClient;
use Google\Cloud\Storage\StorageClient;
use Kreait\ Firebase\ Storage;

$factory = (new Factory)

    ->withServiceAccount('internship-assignment-76856-firebase-adminsdk-218ot-782eb9e84a.json');

$auth = $factory->createAuth(); 
$storage = $factory->createStorage(); 
// $firestore = new FirestoreClient([
//     'projectId'=>'internship-assignment-76856'
// ]);

?>