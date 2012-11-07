<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php 
        include 'Storage.php';
       // $Item= new Item('item');
        //$Item->setid('65765asd756as7d');
       // $Item->
        
        $document= new Storage('./storage.xml','./schema.xsd');
        
       
        
      //  $document = new DOMDocument('test','asd');
        
     //   $dom->documentElement->appendChild($Item);
        
      //  print_r($Item);
        echo 'help';
        $document->testItem();
        //echo "<xmp>".$document->mDOM->saveXML()."</xmp>";
        ?>
    </body>
</html>
