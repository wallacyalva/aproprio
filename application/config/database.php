<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$active_group = 'default';
$active_record = TRUE;

$db['default'] = array(
    'dsn' => '',
    'hostname' => 'localhost',
    'username' => 'amorprop_root',
    'password' => 'w)G%;(&hN=Bh',
    'database' => 'amorprop_painel',
    'dbdriver' => 'mysqli',
    'dbprefix' => 'wc_',
    'pconnect' => TRUE,
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



/* End of file database.php */
/* Location: ./application/config/database.php */
