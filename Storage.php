<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Storage
 *
 * @author Bevzyuk
 */
include 'item.php';
class Storage {
   
    protected $mDOM;
    public    $mDOMroot;
    protected $mSorce;
    protected $mSchema;
    protected $mPath;
    public $mItem;
    public  $length;
    
    function __construct($xmlsrc, $schemasrc)
    {
        $this->mDOM=new DOMDocument();// В конструктор
    
        $this->mDOM->load($xmlsrc);
        $this->mDOM->schemaValidate($schemasrc);
        $this->mPath='';
        $this->mSorce=$xmlsrc;
        $this->mSchema=$schemasrc;
        
        $nodelist=$this->mDOM->getElementsByTagName('item');
        $this->mDOMroot=  $this->mDOM->documentElement;
        $this->length=$nodelist->length;
        $this->mItem =new Item($nodelist->item(0));
        $this->mItem->setRoot($this->mDOMroot);
      
   }
  
 
 //Save curent DOMDocument in to file
    function save()
    {
       $this->mDOM->save($this->mPath.$this->mSorce); 
    }
    //validate XML Schema check;
    function validate($schema)
    {  
        if($this->mDOM->schemaValidate($schema))
            return print 'valid';
        else   return print 'UnValid';
    }
      
    //set curent Item by index
    function getItemElbyIndex($index)
     {  
         $Nodelist=$this->mDOMroot->getElementsByTagName("item");
         $newItem=$Nodelist->item($index);
         $this->mItem->setItem($newItem);
    }
    //remove curent Item
    function removeItem()
    {      
        $this->mItem->remove();    
    }

 
}

?>
