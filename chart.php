<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
      include'Storage.php';
	  
	  $document= new Storage('./storage.xml','./schema.xsd');
     $stylexslt = new XSLTProcessor();
     $stylexsl = new DOMDocument();
      $stylexsl ->load("chart.xsl");
       $stylexslt ->importStylesheet($stylexsl);
      print $stylexslt->transformToXml($document->mDOMroot->parentNode);

?>
</body>
</html>