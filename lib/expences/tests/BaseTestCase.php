<?php


/**
 * BankSummaryReaderTest 
 * 
 * @uses PHPUnit
 * @uses _Framework_TestCase
 * @package default
 * @version $id$
 * @copyright 
 * @author Wojciech Sznapka <wojciech@sznapka.pl> 
 * @license 
 */
class BaseTestCase extends PHPUnit_Framework_TestCase
{
  /**
   * sets up - register autoloader
   * 
   * @access public
   * @return void
   */
  public function setUp()
  {
    include_once __DIR__ . "/../runner/Runner.class.php";
    \expences\runner\Runner::autoloadRegister(false);
  }
}
