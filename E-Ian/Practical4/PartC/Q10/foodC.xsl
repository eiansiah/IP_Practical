<?xml version="1.0" encoding="UTF-8" ?>
<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <head>
                <title>Food</title>
            </head>
            <body>
                <h1>Food</h1>
                <hr />
                <table border="1" cellpadding="5" cellspacing="0">
                    <tr bgcolor="#AFDDFF">
                        <th>Count</th>
                        <th>Type</th>
                        <th>Name</th>
                        <th>CarbsPerServing</th>
                        <th>FiberPerServing</th>
                        <th>FatPerServing</th>
                        <th>KjPerServing</th>
                    </tr>
                    <xsl:for-each select="//foodItem[@type='vegetable' or @type='fruit']">
                        <tr>
                            <td><xsl:number /></td>
                            <td><xsl:value-of select="@type" /></td>
                            <td><xsl:value-of select="name" /></td>
                            <td><xsl:value-of select="carbsPerServing" /></td>
                            <td><xsl:value-of select="fiberPerServing" /></td>
                            <td><xsl:value-of select="fatPerServing" /></td>
                            <td><xsl:value-of select="kjPerServing" /></td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>