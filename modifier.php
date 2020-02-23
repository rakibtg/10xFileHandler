<?php
/*
  https://stackoverflow.com/questions/32381423/removing-a-line-from-the-middle-of-a-large-file-php
  http://www.hackingwithphp.com/8/5/0/other-file-functions
*/
  function injectData($file, $data, $position) {
    $temp = fopen('php://temp', "rw+");
    $fd = fopen($file, 'r+b');

    // $currentLine = 0;
    // while (($line = fgets($fd)) !== false) {
    //   echo $line;
    //   if (trim($line) == 'Barisal') {
        
    //   }
    //   $currentLine++;
    // }
  
    fseek($fd, $position);
    stream_copy_to_stream($fd, $temp); // copy end
  
    // fseek($fd, $position); // seek back
    // fwrite($fd, $data . PHP_EOL); // write data
  
    rewind($temp);
    stream_copy_to_stream($temp, $fd); // stich end on again
  
    fclose($temp);
    fclose($fd);
  }

  injectData('test.txt', '{"_id": 233, "name": "Kazi Mehedi Hasan"}', 0);

  echo "\n";