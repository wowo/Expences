<?php
namespace expences\output;

/**
 * Stdout 
 * 
 * @package default
 * @version $id$
 * @copyright 
 * @author Wojciech Sznapka <wojciech@sznapka.pl> 
 * @license 
 */
class Stdout implements \expences\output\IOutput
{
  /**
   * shows operations 
   * 
   * @param array $monthOperations 
   * @access public
   * @return void
   */
  public function show(array $monthOperations)
  {
    foreach ($monthOperations as $operations) {
      foreach ($operations as $path => $operation) {
        $this->showOne($operation);
      }
    }
  }

  /**
   * showOne 
   * 
   * @param \expences\entities\Operation $operation 
   * @access protected
   * @return void
   */
  protected function showOne(\expences\entities\Operation $op)
  {
    printf("%s  %5.2f\t%-55s  %-40s\n", $op->dateOperation, $op->pricePln, $op->type, $op->description);
  }
}
