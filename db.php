<?php

require "libs/rb.php";
R::setup( 'mysql:host=localhost;dbname=test',
       'root', '123' );

session_start();