<?php

// This is the database connection configuration.
return array(
    'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/testdrive.db',
    // uncomment the following lines to use a MySQL database
    
    // Localhost
    'connectionString' => 'mysql:host=localhost;dbname=inventory_db',
    'emulatePrepare' => true,
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    // Online
//    'connectionString' => 'mysql:host=localhost;dbname=sabaraga_db',
//    'emulatePrepare' => true,
//    'username' => 'sabaraga_db_user',
//    'password' => 'lqlXu5#{}9?R',
//    'charset' => 'utf8',
);
