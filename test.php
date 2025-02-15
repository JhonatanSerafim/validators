<?php

use Validators\Validator;

require_once __DIR__ . "/vendor/autoload.php";

$validator = new Validator;

// if you want to use your own namespace handler
$validator->setNamespaceHandler("My\\Namespace\\Handler");
$validator->registerMessages(new MyMessages());

$values = [
    'field_1' => [
        "a" => "string",
        "b" => "should_be_int",
        "c" => []
    ],
    "field_2" => '{"json": "valid"}'
];

$rules = [
    "field_1" => "array|required",
    "field_1.a" => "string|required|lenghtBetween:1,2",
    "field_1.b" => "int|between:1,2",
    "field_1.c" => "array",
    "field_2" => "json",
];

$result = Validator::rules($rules, $values);

$result->failedOnField("teste.c"); // false
$result->failed(); // true
$result->throwOnFirstError(); // throws exception whith first error message
$result->failedOnRule('string'); // true
$result->getErrorsMessages(); // returns all error message if exists


