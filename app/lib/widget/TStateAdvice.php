<?php

use Adianti\Widget\Base\TElement;

/**
 * TProgressBar
 *
 * @version    1.0
 * @package    widget
 * @author     Renán Darío Gonzales Apaza

 */
class TStateAdvice extends TElement
{
    private $width;
    private $mask;
    private $className;
    
    public function __construct() 
    {
        parent::__construct('div');
        $this->{'id'} = 'TStateAdvice'.mt_rand(1000000000, 1999999999);
    }
    

    public function setMask($mask)
    {
        $this->mask = $mask;
    }
    
    /**
     * set style class
     */
    public function setClass($class)
    {
        $this->className = $class;
    }
    
    /**
     * Set the value of progress bar
     */ 
    public function setWidth($width)
    {
       $this->width = $width;
    }
            
    /**
     * Shows the widget at the screen
     */       
    public function show()
    {                   
        $label = new TElement('span');
        $label->{'class'} = "label label-{$this->className}";
        $label->{'style'} = 'width: ' . $this->width . '%;';

        $label->add($this->mask);
        parent::add($label);
       
        parent::show();
    }
}
