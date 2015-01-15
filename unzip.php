<?php

/**
 * see http://www.dmsolutions.de/faq/allgemeines/wie-man-zip-dateien-direkt-auf-dem-server-entpacken-kann.html
 *
 */
$file = 'singkreis-lb-master.zip';

$path = pathinfo(realpath($file), PATHINFO_DIRNAME);

echo "extracting '$file' to '$path'<br>";

$zip = new ZipArchive();

$res = $zip->open($file);
if ($res === TRUE) {
  $res = $zip->extractTo($path);
  if ($res === TRUE) {
    $zip->close();
    echo "'$file' successfuly exported to '$path'<br>";
  } else {
    echo "ERROR could not extract '$file' to '$path'<br>";
  }
} else {
  echo "ERROR could not open '$file'<br>";
}
