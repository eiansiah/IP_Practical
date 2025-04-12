<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
    <html>
        <body>
            <h1>Food List</h1>
            <hr />
                <table border='2' style='border-collapse:collapse'>
                    <tr>
                        <th>No. </th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>CarbsPerServing</th>
                        <th>FiberPerServing</th>
                        <th>FatPerServing</th>
                        <th>KjPerServing</th>
                    </tr>

                    <xsl:for-each select="//foodItem[@type='vegetable' or @type='fruit']">
                        <tr>
                            <td><xsl:value-of select="position()"/></td>
                            <td><xsl:value-of select="name" /></td>
                            <td><xsl:value-of select="@type" /></td>
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