<?php
  unlink('./test.txt');
  copy('./bakup.test.txt', './test.txt');