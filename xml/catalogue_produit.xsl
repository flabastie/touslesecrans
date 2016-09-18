<?xml version="1.0" encoding="utf-8"?>

<!DOCTYPE xsl:stylesheet  [
	<!ENTITY nbsp   "&#160;">
	<!ENTITY copy   "&#169;">
	<!ENTITY reg    "&#174;">
	<!ENTITY trade  "&#8482;">
	<!ENTITY mdash  "&#8212;">
	<!ENTITY ldquo  "&#8220;">
	<!ENTITY rdquo  "&#8221;"> 
	<!ENTITY pound  "&#163;">
	<!ENTITY yen    "&#165;">
	<!ENTITY euro   "&#8364;">
]>

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" encoding="utf-8" doctype-public="-//W3C//DTD XHTML 1.0 Transitional//EN" doctype-system="http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"/>
<xsl:template match="/">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Mise en forme avec XSLT</title>
</head>

<body>


<table width="1000" border="1" cellspacing="0" cellpadding="5px">
	<thead>		
			  <tr>
			    <th scope="col">Marque</th>
			    <th scope="col">Modèle</th>
			    <th scope="col">Prix</th>
			    <th scope="col">Titre</th>
			    <th scope="col">ref_fabriquant</th>
			    <th scope="col">slogan</th>
			  </tr>
	</thead>

	<tbody>
		<xsl:apply-templates select="//produit" />
	</tbody>

</table>


</body>
</html>

</xsl:template>

	<xsl:template match="articles/produit">
			  <tr>
			    <td><xsl:value-of select="marque"/></td>
			    <td><xsl:value-of select="modele"/></td>
			    <td><xsl:value-of select="prix"/></td>
			    <td><xsl:value-of select="titre"/></td>
			    <td><xsl:value-of select="ref_fabriquant"/></td>
			    <td><xsl:value-of select="slogan"/></td>
			  </tr>
	</xsl:template>

</xsl:stylesheet>
