#!/usr/bin/env php
<?php
printf("\n\n=== Expences===\n\n");

require_once "lib/expences/runner/Runner.class.php";
\expences\runner\Runner::autoloadRegister();


$config = new \expences\configuration\Runner();
$config->dataDirectory = __DIR__ . "/data/credit";
$config->summaryType = "credit";
$runner = new \expences\runner\Runner($config);

printf("Runner\n");
