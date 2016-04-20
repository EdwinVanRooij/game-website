<?php
if(basename($_SERVER["PHP_SELF"]) == "database.php"){
    die("403 - Access Forbidden");
}

//Parse the config file
$ini_array = parse_ini_file("../config.ini", true);

//Put the sections in an array
$db_config = $ini_array['db_config'];
$second_config = $ini_array['second_config'];

//Initialize the variables
print $db_config['host'] . "<br/>";
print $second_config['user'];
print 'swag';

//SQL Information
$host['hostname'] = 'localhost'; // Hostname [Usually localhost]
$host['user'] = 'dbuser'; // Database Username [Usually root]
$host['password'] = 'dl34od903jfDow'; // Database Password [Leave blank if unsure]
$host['database'] = 'maple_maplelife'; // Database Name


//Database Prefix
$prefix = "bit_";
// What is your server`s log in port - Don`t change if you aren`t sure.
$loginport = "7575";
// What is your server`s world port - Don`t change if you aren`t sure.
$worldport = "8484";

/* Don`t touch. */
$mysqli = new MySQLi($host['hostname'],$host['user'],$host['password'],$host['database']);

?>
