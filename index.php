<!DOCTYPE html>
 <html>
   <?php
        
        include'Storage.php';
       
       $document= new Storage('./storage.xml','./schema.xsd');
   
        ?>  
   <head>
   <link rel="stylesheet" href="style.css" type="text/css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <title>Index Page</title>
    </head>
    <body>
    <h1><?php echo $document->mDOMroot->nodeName ?></h1>
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
            <td><?php echo $document->mItem->mName;?></td>
            <td><?php echo $document->mItem->mWeight;?></td>
            <td><?php echo $document->mItem->mCategory; ?></td>
            <td><?php echo $document->mItem->mLocation ?></td>
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