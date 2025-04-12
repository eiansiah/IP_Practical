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
                <!-- Create Table -->
                <table border="1" cellpadding="5" cellspacing="0">
                    <tr bgcolor="#cccccc">
                        <th>Name</th>
                        <th>Born Date</th>
                        <th>Died Date</th>
                    </tr>
                    <!-- Sort persons by name -->
                    <xsl:for-each select="people/person">
                        <xsl:sort select="name" data-type="text" order="ascending"/>
                        <tr>
                            <td>
                                <xsl:value-of select="name"/>
                            </td>
                            <td>
                                <xsl:value-of select="@bornDate"/>
                            </td>
                            <td>
                                <xsl:value-of select="@diedDate"/>
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>

