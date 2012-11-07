<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
<xsl:output method="html" encoding="utf-8" doctype-public="-//W3C//DTD XHTML 1.0 Transitional//EN" doctype-system="http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" indent="yes"/>
<xsl:template match="/">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>
<xsl:text>Chart by weight</xsl:text>
</title>
</head>

<body>
<Chart>
    <Array id="items">
        <xsl:for-each select="storagehouse/item/name">
            <String><xsl:apply-templates/></String>
        </xsl:for-each>
    </Array>
    <Array id="weight">
        <xsl:for-each select="storagehouse/item/weight">
            <Number><xsl:apply-templates/></Number>
        </xsl:for-each>
    </Array>
   <Attribute name="FontName" value="Helvetica"/>
   <Attribute name="FontSize" value="12"/>
   <ChartTitle><Attribute name="Title" value="Weight Chart"/></ChartTitle>
    <AxisXY>
        <AxisY>
            <AxisTitle>
                <Attribute name="Title" value="Weight in kg"/>
            </AxisTitle>
        </AxisY>
        <AxisX>
            <AxisTitle><Attribute name="Title" value="items"/></AxisTitle>
        </AxisX>
        <Bar y="#weight">
           <Attribute name="BarType" value="BAR_TYPE_VERTICAL"/>
           <Attribute name="Labels" value="#items"/>
           <Attribute name="LabelType"  value="LABEL_TYPE_Y"/>
           <Attribute name="FillColor" value="#CCC"/>
           <Attribute name="TextFormat">##.##Kg</Attribute> 
        </Bar>
    </AxisXY>
</Chart> 
</body>
</html>

</xsl:template>
</xsl:stylesheet>