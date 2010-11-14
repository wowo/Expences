#!/usr/bin/env php
<?php
//printf("\n\n=== Expences===\n\n");

require_once "lib/expences/runner/Runner.class.php";
\expences\runner\Runner::autoloadRegister();


$config = new \expences\configuration\Runner();
$config->dataDirectory = __DIR__ . "/data/credit";
$config->type = "credit";
$config->bank = "mbank";
$runner = new \expences\runner\Runner($config);
$results = $runner->run();
var_dump($results);
