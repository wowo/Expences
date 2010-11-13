<?php
namespace expences\reader\mbank;

/**
 * Reads mbank credit card summaries
 * 
 * @package default
 * @version $id$
 * @copyright 
 * @author Wojciech Sznapka <wojciech@sznapka.pl> 
 * @license 
 */
class Credit extends \expences\reader\BankSummary implements \expences\reader\IBankSummary
{
  /**
   * read files
   * 
   * @param mixed $directory 
   * @access public
   * @return array
   */
  public function readFiles($directory)
  {
    $xmls = $this->_getXmls($directory);
  }
}
