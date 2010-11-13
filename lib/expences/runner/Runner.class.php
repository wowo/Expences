<?php
namespace expences\runner;

/**
 * Runner 
 * 
 * @package default
 * @version $id$
 * @copyright 
 * @author Wojciech Sznapka <wojciech@sznapka.pl> 
 * @license 
 */
class Runner
{
  /**
   * _config 
   * 
   * @var IConfiguration
   * @access protected
   */
  protected $_config = null;

  /**
   * __construct 
   * 
   * @access public
   * @return void
   */
  public function __construct(\expences\configuration\IConfiguration $config)
  {
    $this->_config = $config;
  }

  /**
   * _autoloadRegister 
   * 
   * @access protected
   * @return void
   */
  public static function autoloadRegister($verbose = false)
  {
    spl_autoload_register(function($className) {
      $level = count(explode("\\", __NAMESPACE__));
      $classPath = str_replace("\\", "/", $className);
      $path = sprintf("%s/%s%s.class.php", __DIR__, str_repeat("../", $level), $classPath);
      if ($verbose) {
        printf("\t%s -> %s\n", $className, $path);
      }
      require_once($path);
    });
  }

  /**
   * Runs expences process - retrieves data from disk and forms it into nice way
   * 
   * @access public
   * @return void
   */
  public function run()
  {
    $factory = new \expences\factories\BankSummaryReader();
    $reader  = $factory->getBankSummaryReader($this->_config->bank, $this->_config->type);
    $result  = $reader->readFiles($this->_config->dataDirectory);
    return $result;
  }
}
