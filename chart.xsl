<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
     
     <xsl:variable name="colors" select="document('db/colors.xml')/colors" />
     <xsl:variable name="barWidth" select="20" />
     <xsl:variable name="maxValue" select="20" />
     <xsl:variable name="maxHeight" select="200" />
     <xsl:variable name="ratio" select="number($maxHeight div $maxValue)" />
     <xsl:template match="/">
          <table width="*" height="{$maxHeight + 20}" align="center" cellspacing="0" cellpadding="0" border="0">
                  <tr>
                    <td align="bottom">
                    <xsl:apply-templates select="storagehouse"/>
                    </td>
                    <td width="20"></td>
                    <td>
                    <xsl:call-template name="graph-key">
                         <xsl:with-param name="keys" select="storagehouse" />
                         </xsl:call-template>
                         
                    </td>
               </tr>
          </table>
    </xsl:template>
     
     
     <xsl:template match="storagehouse">
          <table height="100%" cellspacing="0" cellpadding="0" border="0">
               <tr>
                    <xsl:apply-templates />
               </tr>
          </table>
     </xsl:template>
     
     <xsl:template match="item">
          <xsl:call-template name="bars-template">
               <xsl:with-param name="bars" select="." />
               <xsl:with-param name="barIndex" select="position()" /> 
          </xsl:call-template>
     </xsl:template>
  
  
     <xsl:template name="bars-template">
          <xsl:param name="bars" />
          <xsl:param name="barIndex" />
          <xsl:variable name="bar" select="$bars/weight" />
            <xsl:variable name="index" select="count(preceding-sibling::item/weight) + 1"/>
            
            <xsl:if test="$index=1">
               <td valign="bottom" style="border-right:1px solid #222;">
               
               <xsl:call-template name="bar-start" />
               </td>
             </xsl:if>  
          
          <xsl:for-each select="$bar">
               <xsl:variable name="barValue" select="." />
              
               <td valign="bottom">
                    
                    <xsl:call-template name="bar-template">
                         <xsl:with-param name="height" select="round($barValue * $ratio)" />
                         <xsl:with-param name="color" select="$colors/color[$index]" />
                    </xsl:call-template>
               </td>
          </xsl:for-each>
          <xsl:if test="number($barIndex)=last()">
               <td valign="bottom">
                    <xsl:call-template name="bar-template" />
               </td>
          </xsl:if>
     </xsl:template>
  
  
  
     <xsl:template name="bar-template">
          <xsl:param name="height" />
          <xsl:param name="color" />
          <table height="{$height}" cellspacing="0" cellpadding="0" border="0">
               <tr>
                    <td height="{$height}" bgcolor="{$color}" width="{$barWidth}"></td>
               </tr>
               <tr>
                    <td width="{$barWidth}">
                         <span style="font-size:5pt;border-right:1px solid black;border-top:1px solid black;width:{$barWidth};height:1;"></span>
                    </td>
               </tr>
          </table>
     </xsl:template>
    
      <xsl:template name="bar-start">
          <table height="{$maxHeight}" cellspacing="0" cellpadding="0" border="0">
               <tr>
                    <td height="{$maxHeight}" width="{$barWidth}" >
                    
                    </td>
               </tr>
               <tr>
                    <td width="{$barWidth}">
                         <span style="font-size:5pt;border-top:2px solid #B0B0B0;width:{$barWidth};height:1;"></span>
                    </td>
               </tr>
          </table>
     </xsl:template>
       

        <xsl:template name="graph-key">
          <xsl:param name="keys" />
          <xsl:variable name="key" select="$keys/item" />
          <table style="font-family:Arial, Helvetica, sans-serif; font-size:10px;">
               <xsl:for-each select="$key">
                    <xsl:variable name="index" select="position()" />
                    <xsl:variable name="caption" select="name" />
                    <xsl:variable name="amount" select="weight" />
                    <xsl:variable name="color" select="$colors/color[$index]" />
                    <tr>
                         <td width="10" bgcolor="{$color}" ></td>
                         <td>
                              <xsl:value-of select="$caption" />
                         </td>
                         <td>
                              <xsl:value-of select="format-number($amount,'#00.00# kg')" />
                         </td>
                    </tr>
               </xsl:for-each>
          </table>
     </xsl:template>
</xsl:stylesheet>
