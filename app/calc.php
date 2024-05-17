<?php

require_once __DIR__ . '/vendor/autoload.php';

if (isset($argv[1])) {
    $calculator = new Calculator();
    try {
        $result = $calculator->calculate($argv[1]);
        echo $result . PHP_EOL;
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage() . PHP_EOL;
    }
} else {
    echo "Usage: php calc.php '<input>'" . PHP_EOL;
}

