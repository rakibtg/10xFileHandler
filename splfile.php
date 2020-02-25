<?php

  $file = fopen('./test.txt', 'r+');
  $temp = fopen('php://temp', "rw+");

  while (!feof($file)) {
    $line = fgets($file);
    $lineSafe = trim($line);
    if ($lineSafe === 'Barisal') {
      $line = 'I love barisal' . PHP_EOL;
    }
    fwrite($temp, $line);
  }

  rewind($file);
  rewind($temp);
  stream_copy_to_stream($temp, $file);

  fclose($temp);
  fclose($file);

  echo "\n";