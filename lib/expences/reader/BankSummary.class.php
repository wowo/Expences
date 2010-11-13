<?php
namespace expences\reader;

/**
 * BankSummary 
 * 
 * @abstract
 * @package default
 * @version $id$
 * @copyright 
 * @author Wojciech Sznapka <wojciech@sznapka.pl> 
 * @license 
 */
abstract class BankSummary
{
  protected function _getXmls($directory)
  {
    $xmls = array();
    foreach (new \DirectoryIterator($directory) as $file) {
      if ($file->isFile()) {
        $path = sprintf("%s/%s", $directory, (string)$file);
        $xmlString = file_get_contents($path);
        $repaired  = $this->_cleanXml($xmlString);
        $xmls[]    = $this->_getXml($repaired);
      }
    }
    return $xmls;
  }

  /**
   * Tidies up xml file and returns repaired content
   * 
   * @param mixed $path 
   * @access protected
   * @return string
   */
  protected function _cleanXml($xmlString)
  {
    $xmlString = iconv(null, "UTF-8", $xmlString);
    $tidy = new \tidy(); 
    $config = array(
      "clean" => true,
      "show-body-only" => false,
      "add-xml-decl" => true,
      "output-xhtml" => true,
      //"indent" => false,
      //"wrap" => 0,
    ); 
    $tidy->parseString($xmlString, $config); 
    $tidy->cleanRepair(); 
    $xmlString = (string)$tidy;
    return $xmlString;
  }

  /**
   * Builds simplexml object based on string
   * 
   * @param mixed $xmlString 
   * @access protected
   * @return SimpleXmlElement
   */
  protected function _getXml($xmlString)
  {
    $sxe = simplexml_load_string($xmlString);
    return $sxe;
  }
}
