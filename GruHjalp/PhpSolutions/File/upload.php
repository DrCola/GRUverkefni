<?php

namespace PhpSolutions\File;


class Upload {
protected $renameDuplicates;
protected $notTrusted = ['bin', 'cgi', 'exe', 'js', 'pl', 'php', 'py', 'sh'];
protected $suffix = '.upload';
protected $newName;
protected $typeCheckingOn = true;
protected $destination;
protected $max = 5120000;
protected $messages = [];
protected $permitted = [
'image/gif',
'image/jpeg',
'image/pjpeg',
'image/png'
];

public function __construct($path) {
if (!is_dir($path) || !is_writable($path)) {
throw new \Exception("$path must be a valid,writable directory.");
}
$this->destination = $path;
}


public function upload($renameDuplicates = true) {
$this->renameDuplicates = $renameDuplicates;
$uploaded = current($_FILES);
if (is_array($uploaded['name'])) {
// deal with multiple uploads
foreach ($uploaded['name'] as $key => $value) {	
$currentFile['name'] = $uploaded['name'][$key];
$currentFile['type'] = $uploaded['type'][$key];
$currentFile['tmp_name'] = $uploaded['tmp_name'][$key];
$currentFile['error'] = $uploaded['error'][$key];
$currentFile['size'] = $uploaded['size'][$key];

if ($this->checkFile($currentFile)) {
$this->moveFile($currentFile);
}
}
} else {
if ($this->checkFile($uploaded)) {
$this->moveFile($uploaded);
}
}
}



protected function checkFile($file) {
$accept = true;
if ($file['error'] != 0) {
$this->getErrorMessage($file);
// stop checking if no file submitted
if ($file['error'] == 4) {
return false;
} else {
$accept = false;
	}
}
if (!$this->checkSize($file)) {
$accept = false;
}

if ($this->typeCheckingOn) {
if (!$this->checkType($file)) {
$accept = false;
}
}
if ($accept) {
$this->checkName($file);
}
return $accept;
}


protected function moveFile($file) {

	$filename = isset($this->newName) ? $this->newName : $file['name'];
	//$this->newname[] = $file['name'];
$success = move_uploaded_file($file['tmp_name'],
$this->destination . $filename);
if ($success) {
$result = $file['name'];
if (!is_null($this->newName)) {
$result = $this->newName;
}
$this->messages2[] = $result;
} else {
$this->messages[] = 'Could not upload ' . $file['name'];
}
}



public function getMessages() {
return $this->messages;
}

public function getMessages2() {
return $this->messages2;
}
public function geterror() {
return $this->messages3;
}

public function getErrorMessage($file) {
switch($file['error']) {
case 1:
$result3 = 10;
$this->messages3[] = $result3;
case 2:
$result3 = 10;
$this->messages[] = $file['name'] . ' is too big: (max: ' .
$this->getMaxSize() . ').';
$this->messages3[] = $result3;
break;
case 3:
$result3 = 10;
$this->messages[] = $file['name'] . ' was only partially
uploaded.';
$this->messages3[] = $result3;
break;
case 4:
$result3 = 10;
$this->messages[] = 'No file submitted.';
$this->messages3[] = $result3;
break;
default:
$this->messages[] = 'Sorry, there was a problem uploading ' .
$file['name'];
$this->messages3[] = $result3;
break;
}
}




protected function checkSize($file) {
if ($file['error'] == 1 || $file['error'] == 2 ) {
return false;
} elseif ($file['size'] == 0) {
	$this->messages3[] = '10';
$this->messages[] = $file['name'] . ' is an empty file.';
return false;
} elseif ($file['size'] > $this->max) {
	$this->messages3[] = '10';
$this->messages[] = $file['name'] . ' exceeds the maximum size
for a file (' . $this->getMaxSize() . ').';
return false;
} else {
	return true;
}
}

protected function checkType($file) {
if (in_array($file['type'], $this->permitted)) {
return true;
} else {
if (!empty($file['type'])) {
$this->messages[] = $file['name'] . ' is not permitted
type of file.';
$this->messages3[] = '10';
}
return false;
}
}
public function getMaxSize() {
return number_format($this->max/1024, 1) . ' KB';
}

public function allowAllTypes($suffix = true) {
$this->typeCheckingOn = false;
if (!$suffix) {
$this->suffix = ''; // empty string
}
}
public function setMaxSize($num) {
if (is_numeric($num) && $num > 0) {
$this->max = (int) $num;
}
}

protected function checkName($file) {
$this->newName = null;
$nospaces = str_replace(' ', '_', $file['name']);
if ($nospaces != $file['name']) {
$this->newName = $nospaces;
}
$extension = pathinfo($nospaces, PATHINFO_EXTENSION);
if (!$this->typeCheckingOn && !empty($this->suffix)) {
if (in_array($extension, $this->notTrusted) || empty($extension)) {
$this->newName = $nospaces . $this->suffix;
		}
	}
	if ($this->renameDuplicates) {
$name = isset($this->newName) ? $this->newName : $file['name'];
$existing = scandir($this->destination);
if (in_array($name, $existing)) {
// rename file
	$basename = pathinfo($name, PATHINFO_FILENAME);
$extension = pathinfo($name, PATHINFO_EXTENSION);
$i = 1;
do {
$this->newName = $basename . '_' . $i++;
if (!empty($extension)) {
$this->newName .= ".$extension";
			}
		} while (in_array($this->newName, $existing));
	}
}
}


function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}




}
