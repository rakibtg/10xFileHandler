<?php

// function injectData($file, $data, $position) {
//   $temp = fopen('php://temp', "rw+");
//   $fd = fopen($file, 'r+b');

//   fseek($fd, $position);
//   stream_copy_to_stream($fd, $temp); // copy end

//   fseek($fd, $position); // seek back
//   fwrite($fd, $data . PHP_EOL); // write data

//   rewind($temp);
//   stream_copy_to_stream($temp, $fd); // stich end on again

//   fclose($temp);
//   fclose($fd);
// }

// injectData('test.txt', 'Canada', 0);

  // $file = new SplFileObject('test.txt', "r+");
  // $file->seek(0);     // Seek to line no. 10,000
  // // echo $file->current(); // Print contents of that line
  // echo $file->fwrite('1');

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
  
  // fseek($handle, 6);
  // $data = fgets($handle, 4096);
  // echo $data;

  echo "\n";