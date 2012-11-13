
<?php
   
 function fileToDOMDoc($filename) { 
    $dom= new DOMDocument; 
    $xmldata = file_get_contents($filename); 
    $xmldata = str_replace("&", "&amp;", $xmldata);  // disguise &s going IN to loadXML() 
    $dom->substituteEntities = true;  // collapse &s going OUT to transformToXML() 
    $dom->loadXML($xmldata); 
    return $dom; 
 } 

$xml = fileToDOMDoc('db/storage.xml'); 
$xsl = fileToDOMDoc('chart.xsl'); 

$proc = new XSLTProcessor(); 
$proc->importStyleSheet($xsl); 

echo $proc->transformToXML($xml);

?>
