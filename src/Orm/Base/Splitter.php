<?php

namespace Emeka\Candy\Base;

class Splitter
{

  /**
   * @var $className
   */
  private $className;

  /**
   * @param $className
   */
  public function __construct($className)
  {
    $this->className = $className;
  }

  public function split()
  {
    return preg_split('/(?=[A-Z])/', $this->className);
  }

  public function toLower()
  {
    $lowerCase = [];
    foreach($this->split() as $key => $value){
      $lowerCase[] = strtolower($value);
    }
    return $lowerCase;
  }

  public function format()
  {
    $formattedString = join('_', $this->toLower());
    if(strpos($formattedString, '_') === 0) 
    {
      $formattedString = substr($formattedString, 1);
    }
    return $formattedString;
  }

}