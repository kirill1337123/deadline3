<?php 

require "libs/rb-mysql.php";
R::setup( 'mysql:host=localhost;dbname=user',
        'root', '' );

session_start();