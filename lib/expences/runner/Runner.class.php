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
   * __construct 
   * 
   * @access public
   * @return void
   */
  public function __construct()
  {
    $this->_autoloadRegister();
  }

  /**
   * _autoloadRegister 
   * 
   * @access protected
   * @return void
   */
  protected function _autoloadRegister()
  {
    spl_autoload_register(function($className) {
      $level = count(explode("\\", __NAMESPACE__));
      $classPath = str_replace("\\", "/", $className);
      $path = sprintf("%s/%s%s.class.php", __DIR__, str_repeat("../", $level), $classPath);
      require_once($path);
    });
  }
}
