<?php
namespace eastbarbarian\debuger;

/**
 * zaglushka
 * @param bool $arg
 * @param bool $isDie
 */
function z($text = false)
{
    if ($text) {
        echo $text . PHP_EOL;
    } else {
        echo 'zaglushka' . PHP_EOL;
    }
    die;
}

/**
 * otmetka
 */
function o($arg = false)
{
    if($arg){
        echo $arg . PHP_EOL;
    }else{
        echo 'zdes' . PHP_EOL;
    }
}

/**
 * var_dump and die
 * @param $args
 */
function vd($args)
{
    if (is_array($args)) {
        foreach ($args as $arg) {
            my_var_dump($arg);
        }
    } else {
        my_var_dump($args);
    }
    echo '-----------------------------------------------' . PHP_EOL;
    die;
}

/**
 * var_dump
 * @param $args
 */
function v($args)
{
    if (is_array($args)) {
        foreach ($args as $arg) {
            my_var_dump($arg);
        }
    } else {
        my_var_dump($args);
    }
    echo '-----------------------------------------------' . PHP_EOL;
}

/**
 * print_r and die
 * @param $args
 */
function pd($args)
{
    echo '<pre>';
    print_r($args);
    echo '</pre>';
//    if(is_array($args)){
//        foreach ($args as $arg) {
//            my_print_r($arg);
//        }
//    }else{
//        my_print_r($args);
//    }
    echo '-----------------------------------------------' . PHP_EOL;
    die;
}

/**
 * print_r
 * @param $args
 */
function p($args)
{
    echo '<pre>';
    print_r($args);
    echo '</pre>';
    echo '-----------------------------------------------' . PHP_EOL;
}

/**
 * print_r
 * @param $arg
 */
function my_print_r($arg)
{
    print_r($arg);
    lt();
}

/**
 * var_dump
 * @param $arg
 */
function my_var_dump($arg)
{
    var_dump($arg);
    lt();
}

function lt()
{
    if (isWeb()) {
        echo '<br>';
    } else {
        echo PHP_EOL;
    }
}

function isWeb()
{
    return (substr(php_sapi_name(), 0, 3) == 'cgi');
}

function arrayDiff($resp, $exp)
{
    foreach ($resp as $key => $value) {
        if (is_array($value) && isset($exp[$key])) {
            arrayDiff($value, $exp[$key]);
        } elseif (!isset($exp[$key])) {
            echo $key . ' not exists' . PHP_EOL;
        } else {
            if ($value !== $exp[$key]) {
                echo $key . '  ' . $value . ' ' . gettype($value) . ' || ' . $exp[$key] . '  ' . gettype($exp[$key]) . PHP_EOL;
            }
        }
    }
}

?>

