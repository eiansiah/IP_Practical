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
                        <th>CarbsPerServing</th>
                        <th>Carbs Consumed</th>
                    </tr>

                    <xsl:for-each select="//foodItem">
                        <tr>
                            <td><xsl:value-of select="position()"/></td>
                            <td><xsl:value-of select="name" /></td>
                            <td><xsl:value-of select="carbsPerServing" /></td>
                            <td><xsl:value-of select="carbsPerServing * 3" /></td>
                        </tr>
                    </xsl:for-each>
                </table>
        </body>
    </html>
    </xsl:template>
</xsl:stylesheet>