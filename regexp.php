<?php

  function softFind ($jsonString, $key) {
    $exp = '/"'.$key.'":"((\\"|[^"])*)"/Ui';
    preg_match( $exp, $jsonString, $matches );
    if (!empty($matches)) return $matches[1];
  }

  $json = '{"name":"Prof. Skye Veum IV","email":"strosin.elmira@gmail.com","age":47}';
  echo softFind($json, 'email');