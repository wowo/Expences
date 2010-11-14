<?php
namespace expences\output;

/**
 * Logger 
 * 
 * @package default
 * @version $id$
 * @copyright 
 * @author Wojciech Sznapka <wojciech@sznapka.pl> 
 * @license 
 */
class Logger
{
  /**
   * Output pattern (decorator)
   * 
   * @var string
   * @access protected
   */
  protected $_pattern;
  /**
   * Output stream
   * 
   * @var mixed
   * @access protected
   */
  protected $_stream;
  /**
   * Date format 
   * 
   * @var mixed
   * @access protected
   */
  protected $_dateFormat;

  /**
   * The constructor 
   * 
   * @param   public function__construct( $  public functionpattern 
   * @param string $stream 
   * @access public
   * @return void
   */
  public function __construct($stream = "php://stdout", $dateFormat = "H:i:s", $pattern = '>> [%2$s] %1$s')
  {
    $this->_pattern = $pattern;
    $this->_dateFormat = $dateFormat;
    $this->_stream = $stream;
  }

  /**
   * Logs to the stream
   * 
   * @param mixed $message 
   * @access public
   * @return void
   */
  public function log($message)
  {
    $msg = sprintf($this->_pattern, $message . PHP_EOL, date($this->_dateFormat));
    $stream = fopen($this->_stream, "a+");
    fwrite($stream, $msg);
  }
}
