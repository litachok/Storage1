<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
  include 'StoregeClass.php';
  $document= new Storege('./storage.xml','./schema.xsd');
   $text='Submit';
   $value=0;
	  
  if (isset($_GET['index'])&&(($_GET['index'])<$document->length)) { 
     $value = $_GET['index']; $document->getItemElbyIndex($value);
	 $Name=$document->mStoreItem->inName;
	 $Weight=$document->mStoreItem->inWeight;
	 $Category=$document->mStoreItem->inCategory;
	 $Location=$document->mStoreItem->inLocation;
	 }
  elseif (isset($_POST['index'])&&(($_POST['index'])<$document->length)) { 
   $value = $_POST['index']; $document->getItemElbyIndex($value);
     $Name=$document->mStoreItem->inName;
	 $Weight=$document->mStoreItem->inWeight;
	 $Category=$document->mStoreItem->inCategory;
	 $Location=$document->mStoreItem->inLocation;
  } else{
	  
	 $Name='';
	 $Weight='';
	 $Category='';
	 $Location='';
	 $text='Add';
  }
  
  // modifing or adding  
  if ( isset($_POST['formSubmit'])){
	$Name = $_POST['name']; 
	$Weight = $_POST['weight']; 
	$Category = $_POST['category']; 
	$Location = $_POST['location']; 
	echo $Name.$Weight.$Category.$Location;
	if ($_POST['formSubmit'] == "Submit") 
	{ //modify
	$document->mStoreItem->modItem('name',$Name);
	$document->mStoreItem->modItem('weight',$Weight);
	$document->mStoreItem->modItem('category',$Category);
	$document->mStoreItem->modItem('location',$Location);
	echo $value;
	if ($document->validate('./schema.xsd')) $document->save();
	else echo '<h1> Do not match Shcema</h1>';
	} //add
	 elseif ( $_POST['formSubmit'] == "Add"){
	$id='new_id'.$value;
	$document->setItem1($id,$Name,$Weight,$Category,$Location);
	$document->addItemToDOM();
	if ($document->validate('./schema.xsd')) $document->save();
	else echo '<h1> Do not match Shcema</h1>';
	
	}
  }
  
  if (isset($_GET['RemoveItem'])){
	 echo $value;
	 $document->removeItem();
	 $document->save();
	 $value=$value-1; 
  }
  
  function nextel(){
	  return $value++;
  }
  
?>
<head>
<link rel="stylesheet" href="style.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modify Element</title>
</head>
<body>
<form action="modify.php" method="post" >
<div class="input">
<input type="hidden" name="index" type="text" value="<?=$value?>"/>   
<p>Name: <input name="name" type="text" value="<?=$Name?>" /> </p>
<p>Weight: <input name="weight" type="text" value="<?=$Weight?>" /></p>
<p>Category: <input name="category" type="text" value="<?=$Category?>" /></p>
<p>Location: <input name="location" type="text" value="<?=$Location?>" /></p>
</div>

<input type="Submit" name="formSubmit" value="<?=$text?>"/>

</form>   

<div id="button">
<br>       
<a href="modify.php?index=0">Prev</a>
<a href="?RemoveItem?index=<?=$value?>">Remove</a>
<a href="modify.php?index=<?=++$value?>">Next</a>
</div>
</body>
</html>