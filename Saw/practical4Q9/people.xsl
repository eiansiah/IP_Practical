<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
    <html>
        <head>
            <title>Famous People</title>
        </head>
        <body>
            <h1>Famous People</h1>
            <hr />
                <table border='2' style='border-collapse:collapse'>
                    <tr>
                        <th>Name</th>
                        <th>Born Date</th>
                        <th>Died Date</th>
                        <th>Description</th>
                    </tr>

                    <xsl:for-each select="//person">
                        <xsl:sort select="name"/>
                        <tr>
                            <td><xsl:value-of select="name" /></td>
                            <td><xsl:value-of select="@bornDate" /></td>
                            <td><xsl:value-of select="@diedDate" /></td>
                            <td><xsl:value-of select="description" /></td>
                        </tr>
                    </xsl:for-each>
                </table>
        </body>
    </html>
    </xsl:template>
</xsl:stylesheet>