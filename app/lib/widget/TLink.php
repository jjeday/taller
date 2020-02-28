<?php

use Adianti\Widget\Base\TElement;

/**
 * TProgressBar
 *
 * @version    1.0
 * @package    widget
 * @author     Renán Darío Gonzales Apaza

 */
class TLink extends TElement
{
    private $width;
    
    private $mask;
    private $className;
    private $target;
    private $href;
    
    public function __construct() 
    {
        parent::__construct('div');
        $this->{'id'} = 'TStateAdvice'.mt_rand(1000000000, 1999999999);
        $this->target = '_blank';
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
    
    public function setTarget($target)
    {
       $this->target = $target;
    }
    
    public function setHref($href){
		$this->href = $href;
	}
            
    /**
     * Shows the widget at the screen
     */       
    public function show()
    {                   
        $label = new TElement('a');
        $label->{'href'} = $this->href;
        $label->{'target'} = $this->target;
        
        $label->{'class'} = "label label-default";
        $label->{'style'} = 'color: blue;';

        $label->add($this->mask);
        parent::add($label);
       
        parent::show();
    }
}
