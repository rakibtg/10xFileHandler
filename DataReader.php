<?php

  class DataReader {

    protected $sourceFile;
    protected $file;
    // private $temp;

    function __construct () {
      // File contains total LOC: 641247
      $this->sourceFile = __DIR__ . '/../large-db/data-1gb.sdb';
      $this->file = fopen($this->sourceFile, 'r+');
    }

    private function softFind ($jsonString, $key) {
      $exp = '/"'.$key.'":"((\\"|[^"])*)"/Ui';
      preg_match( $exp, $jsonString, $matches );
      if (!empty($matches)) return $matches[1];
    }

    public function byLine ($lineNumber = 0) {
      while (!feof($this->file)) {
        $line = fgets($this->file);
        $fileLineNumber = ftell($this->file);
        // echo $fileLineNumber . "\n";
        $email = $this->softFind($line, 'email');
        // $age = $this->softFind($line, 'age');
        // $country = $this->softFind($line, 'country');
        $age = null;
        $country = null;
        if ($fileLineNumber === $lineNumber) {
          print_r([
            'email' => $email,
            'age' => $age,
            'country' => $country
          ]);
          $lineObject = @json_decode(trim($line));
          print_r($lineObject);
        }
      }
    }

    function __destruct () {
      // $this->print_mem();
      fclose($this->file);
    }

  }

  $db = new DataReader();
  $db->byLine(1073049965);