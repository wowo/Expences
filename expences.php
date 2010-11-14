#!/usr/bin/env php
<?php

require_once "lib/expences/runner/Runner.class.php";
\expences\runner\Runner::autoloadRegister();

try {
  $output = new \expences\output\Stdout();
  $logger = new \expences\output\Logger("php://stderr");
  $logger->log("Expences calculator");

  $config = new \expences\configuration\Runner(__DIR__ . "/data/credit", "credit", "mbank");
  $runner = new \expences\runner\Runner($config);
  $operations = $runner->run();
  $logger->log(sprintf("Retreived %d operations", count($operations)));
  $output->show($operations);
  $logger->log("Finished");
} catch (\expences\exceptions\PhpConfiguration $e) {
}
