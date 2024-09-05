<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

try {
    $db['default'] = array(
        'dsn'      => '',
        'hostname' => '101.255.105.10',
        'username' => 'pamdi',
        'password' => 'm62KPBeEBfZFPmHW',
        'database' => 'pamdi',
        'dbdriver' => 'mysqli',
        'dbprefix' => '',
        'pconnect' => FALSE,
        'db_debug' => (ENVIRONMENT !== 'production'),
        'cache_on' => FALSE,
        'cachedir' => '',
        'char_set' => 'utf8',
        'dbcollat' => 'utf8_general_ci',
        'swap_pre' => '',
        'encrypt' => FALSE,
        'compress' => FALSE,
        'stricton' => FALSE,
        'failover' => array(),
        'save_queries' => TRUE
    );

    // Coba koneksi ke database
    $mysqli = new mysqli($db['default']['hostname'], $db['default']['username'], $db['default']['password'], $db['default']['database']);

    // Periksa koneksi
    if ($mysqli->connect_errno) {
        throw new Exception('Failed to connssect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

} catch (Exception $e) {
    redirect('https://google.com');
}