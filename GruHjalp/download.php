<?php
// define error page
$error = 'http://tsuts.tskoli.is/2t/1208952229/vef2a/verk4a/user.php?val=Palli95';
// define the path to the download folder

$getfile = NULL;
// block any attempt to explore the filesystem
if (isset($_GET['file']) && basename($_GET['file']) == $_GET['file']) {
$getfile = $_GET['file'];
} else {
header("Location: $error");
exit;
}
if ($getfile) {
$path =  $getfile;
// check that it exists and is readable
if (file_exists($path) && is_readable($path)) {
// send the appropriate headers
header('Content-Type: application/octet-stream');
header('Content-Length: '. filesize($path));
header('Content-Disposition: attachment; filename=' . $getfile);
header('Content-Transfer-Encoding: binary');
// output the file content
readfile($path);
} else {
header("Location: $error");
}
}