<?php
function getLastModifiedTime() {
  date_default_timezone_set('EDT');

  $timeStamp = null;

  $path = realpath('../');

  $objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
  foreach ($objects as $name => $object) {
    if (basename($name)!== '.ftpquota' && basename($name) !== 'DO_NOT_UPLOAD_HERE') {
      $timeStamp = filemtime($name) > $timeStamp ? filemtime($name) : $timeStamp;
    }
  }

  return date("F jS, Y", $timeStamp)." at ".date("h:i:s A T", $timeStamp);
}
?>
