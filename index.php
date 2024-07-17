<?php

require 'vendor/autoload.php';

use Parse\ParseClient;
use Parse\ParseException;
use Parse\ParseObject;

$cacertPath = __DIR__ . '/cacert.pem';

$app_id = '';
$rest_key = '';
$master_key = '';

ParseClient::initialize( $app_id, $rest_key, $master_key);
ParseClient::setServerURL('https://parseapi.back4app.com','/');
ParseClient::setCAFile($cacertPath);

$person = new ParseObject("_User");
$person->set("username", "joao.vittor");
$person->set("email", "teste2@gmail.com");
$person->set("password", "123456");

try {
    $person->save();
    echo 'Novo objeto criado com objectId: ' . $person->getObjectId();
} catch (ParseException $ex) {
    echo 'Falha ao criar novo objeto, com mensagem de erro: ' . $ex->getMessage();
}
