<!DOCTYPE html>
 <html>
   <?php
        
        include'StoregeClass.php';
       
       $document= new Storege('./storage.xml','./schema.xsd');
   //    $document->addItem('usb', 3, 'A', "C");
    //   $document->setItem('123123wqe', 'usb', 3, 'A', "C1");
    //   $document->setDomEl();
 
      
	//$document->getItemElbyIndex(0);	
        //$document->mStoreItem->inName; 
        
        //$document->setItem1('12313','name',3 , "b", 'd3');
       
      
       $document->getItemElbyIndex(0);
      //  print $document->mStoreItem->inName;
       // print $document->mStoreItem->inWeight;
        ?>  
   <head>
   <link rel="stylesheet" href="style.css" type="text/css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <title>Index Page</title>
    </head>
    <body>
    <h1><?php echo $document->mStoreHouseDOM->documentElement->nodeName ?></h1>
    <table class="gridtable">
      <tr>
          	<th>Modify</th>
            <th>Name</th>
            <th>Weight</th>
            <th>Category</th>
            <th>Location</th>
      </tr>
      <form name="index" action="modify.php" method="post">
	  <?php for ($index=0; $index<$document->length; $index+=1){$document->getItemElbyIndex($index); ?>
           <tr>
            <td><?php echo '<a href="modify.php?index='.$index.'" target="new">+</a>'; ?> </td>
            <td><?php echo $document->mStoreItem->inName;?></td>
            <td><?php echo $document->mStoreItem->inWeight;?></td>
            <td><?php echo $document->mStoreItem->inCategory; ?></td>
            <td><?php echo $document->mStoreItem->inLocation ?></td>
           </tr> 
	    <?php }
		?>
    </table>
    
    <br>
   <?php  echo '<a href="modify.php?index='.$index.'" target="new">Add new</a> ' ?>
   
   <a href="index.php" target="_self">Refresh</a>
   <a href="chart.php" target="new">Chart</a>
   
 
 </body>
</html>