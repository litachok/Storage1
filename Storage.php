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
     //   $this->mPath='';
       // $this->mItem= new Item('item');
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
       // $this->mDOM->cloneNode()
       // $this->mItem->remove();
    //    $this->mDOMroot->appendChild($this->mItem);
     
       // print_r($this->mItem);
       // $this->mDOM->appendChild($this->mItem);
       // $this->mDOM->documentElement->;
             
        
   }
   function printXML() {
       
          echo "<xmp>".$this->mDOM->saveXML()."</xmp>";
   }
  /* function testItem(){
       // print 'id='.$this->mItem->mId.'name='.$this->mItem->mName;
       $this->printXML();
    //   $this->getItemElbyIndex(3);
     //  $this->mItem->modItem('name', 'MUTER');
       // print 'id='.$this->mItem->mId.'name='.$this->mItem->mName;
      // $this->printXML();
      // $this->mItem->newItem();
    //    $this->mItem->update();
    ///   $this->mDOMroot->appendChild($this->mItem->getItem());
       // print 'id='.$this->mItem->mId.'name='.$this->mItem->mName;
    //   $this->printXML();
       
   // $this->printXML();
     //  $this->mItem->update();
      // print 'id='.$this->mItem->mId.'name='.$this->mItem->mName;
     
    
    //$this->validate($this->mSchema);
      
    // $this->save();
   // $this->removeItem();
  //  $this->printXML();
       
   }
   * 
   */
   
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
