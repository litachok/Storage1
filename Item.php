<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Item
 *
 * @author Bevzyuk
 */
class Item  {
    
    public $mName;
    public $mWeight;
    public $mCategory;
    public $mLocation;
    public $mId;
    protected $attrNode;
    protected $mDOMroot;
    
    protected $mDomEl;

    
    function __construct($Domel)
    {
     $this->mDomEl=$Domel;
    } 
    function newItem(){
        
       $this->mDomEl=$this->mDomEl->cloneNode(true);
       $this->mDOMroot->appendChild($this->mDomEl);
        
    }
    function setRoot($DOMroot)
    {
           $this->mDOMroot=$DOMroot;
    }
    //remove curent
    function remove()
    {    
        $this->mDOMroot->removeChild($this->mDomEl);
    }
    function getItem()
    {
        
        return $this->mDomEl;
        
    }
    function setItem($newItem){
        
        $this->mDomEl=$newItem;
        $this->update();
        /// Потрібно Update();
        
    }
    function modItem($proper,$value)
    {        
        if($proper=='id'){
            $AttrNode=$this->mDomEl->getAttributeNode('id');
            $AttrNode->nodeValue=$value;
        }
        
        $elNodes=$this->mDomEl->childNodes;
        switch ($proper) {            
            case 'name':
            foreach ($elNodes as $node)
                if($node->nodeName=='name')
                    $node->nodeValue=$value;
                break;
            case 'weight':
             foreach ($elNodes as $node)
                if($node->nodeName=='weight')
                    $node->nodeValue=$value;

                break;
            case 'category':
            foreach ($elNodes as $node)
                if($node->nodeName=='category')
                    $node->nodeValue=$value;

                break;
            case 'location':
            foreach ($elNodes as $node)
                if($node->nodeName=='location'){
                    $node->nodeValue=$value;
                     
                }
                break;
      }
    } 
    
    function update()
    {       
        $this->mId= $this->mDomEl->getAttributeNode('id')->nodeValue ;
               $elNodes=$this->mDomEl->childNodes;
               foreach ($elNodes as $node)
                  {
                   switch ($node->nodeName) 
                   {
                       case 'name':
                           $this->mName=$node->nodeValue;
                        //   print $node->nodeValue;
                           break;
                       case 'weight':
                           $this->mWeight=$node->nodeValue;

                           break;
                       case 'category':
                           $this->mCategory=$node->nodeValue;

                           break;
                       case 'location':
                           $this->mLocation=$node->nodeValue;

                           break;
                   }  
                 }       
    }

}
 




?>
