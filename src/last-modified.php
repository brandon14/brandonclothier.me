<?php
function getLastModifiedTime() {
  date_default_timezone_set('EDT');

  $tTimeStamp = null;

  $tRootPath = realpath('../');

  $tDirectories = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($tRootPath));
  
  foreach ($tDirectories as $tPath => $tObject) {
    if (basename($tPath)!== '.ftpquota' && basename($tPath) !== 'DO_NOT_UPLOAD_HERE') {
      $tTimeStamp = filemtime($tPath) > $tTimeStamp ? filemtime($tPath) : $tTimeStamp;
    }
  }

  return date("F jS, Y", $tTimeStamp)." at ".date("h:i:s A T", $tTimeStamp);
}
