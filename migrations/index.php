<?php

//use classes\Migration;
//use classes\Database;

const DB_HOST = 'localhost';
const DB_NAME = 'academ_cifra';
const DB_USER = 'root';
const DB_PASS = '';
const TABLE_CURRENT_STATE = 'current_state_database';
require 'Database.php';
require 'Migration.php';
//use classes\Migration;
//use classes\Database;
//function autoloader($class)
//{
//    $class = str_replace("\\", '/', $class);
//    $file = __DIR__ . "/{$class}.php";
//    if (file_exists($file)) {
//        require_once $file;
//    }
//}
//
//spl_autoload_register('autoloader');

// поддерживаются пять опций: help, state, migrate, backup и restore
$help  = 'Usage: php ' . $argv[0] . ' -h|-s|-m|-b|-r' . PHP_EOL;
$help .= 'Options:' . PHP_EOL;
$help .= '    -h --help       Show this message' . PHP_EOL;
$help .= '    -s --state      Show current state' . PHP_EOL;
$help .= '    -m --migrate    Change current state' . PHP_EOL;
$help .= '    -b --backup     Create database backup' . PHP_EOL;
$help .= '    -r --restore    Restore database from backup';

if ($argc == 2) { // должна быть только одна опция и это обязательно
    $params = array(
        'h::' => 'help::',
        's::' => 'state::',
        'm::' => 'migrate::',
        'b::' => 'backup::',
        'r::' => 'restore::'
    );
    $options = getopt(implode('', array_keys($params)), $params);

    $migration = new Migration(
        DB_HOST,
        DB_NAME,
        DB_USER,
        DB_PASS,
        TABLE_CURRENT_STATE
    );
    if (isset($options['help']) || isset($options['h'])) {
        // опция help (справка по использованию)
        echo $help;
    } elseif (isset($options['state']) || isset($options['s'])) {
        // опция state (текущее состояние базы данных)
        $migration->state();
    } elseif (isset($options['migrate']) || isset($options['m'])) {
        // опция migrate (изменить состояние базы данных)
        $migration->migrate();;
    } elseif (isset($options['backup']) || isset($options['b'])) {
        // опция backup (создание резервной копии)
        $migration->backup();
    } elseif (isset($options['restore']) || isset($options['r'])) {
        // опция restore (восстановление из резервной копии)
        $migration->restore();
    } else {
        echo 'Syntax error, unkhown option', PHP_EOL;
        echo $help;
    }
}