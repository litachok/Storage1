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
        $this->mPath='./DB';

    
        $this->mSorce=$xmlsrc;
        $this->mSchema=$schemasrc;

        $this->mDOM->load($this->mPath.$this->mSorce);
        $this->mDOM->schemaValidate($this->mPath.$this->mSchema);
        
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
    function validate()
    {  
        if($this->mDOM->schemaValidate($this->mPath.$this->mSchema))
            return TRUE;
        else   return FALSE;
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
    
    function modSet($Name,$Weight,$Category,$Location){
        $this->mItem->modItem('name',$Name);
	$this->mItem->modItem('weight',$Weight);
	$this->mItem->modItem('category',$Category);
	$this->mItem->modItem('location',$Location);
    }
 
}

?>
