#!/usr/bin/env php
<?php

require_once "lib/expences/runner/Runner.class.php";
$runner = new \expences\runner\Runner();
$reader = new \expences\reader\BankSummary();
printf("Runner\n");
