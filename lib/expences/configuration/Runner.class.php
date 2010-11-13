<?php
namespace expences\configuration;

/**
 * Runner 
 * 
 * @uses IConfiguration
 * @package default
 * @version $id$
 * @copyright 
 * @author Wojciech Sznapka <wojciech@sznapka.pl> 
 * @license 
 */
class Runner implements IConfiguration
{
  /**
   * directory storing summaries
   * 
   * @var mixed
   * @access public
   */
  public $dataDirectory;
  /**
   * type of the summary (current/credit)
   * 
   * @var mixed
   * @access public
   */
  public $type;
  /**
   * bank name 
   * 
   * @var mixed
   * @access public
   */
  public $bank;
}
