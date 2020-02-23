<?php
  $handle = fopen('./test.txt', 'r+');
  if ($handle) {
    $updatable = false;
    $previousLine = false;
    while (($line = fgets($handle)) !== false) {
      if (trim($line) == 'Barisal') {
        echo ftell($handle) . "\n";
        fseek($handle, ftell($handle), SEEK_SET);
        fwrite($handle, "Canada" . PHP_EOL . "Chittagong");
        fwrite($handle, PHP_EOL);
      }
    }
    fclose($handle);
  }

  echo "\n";