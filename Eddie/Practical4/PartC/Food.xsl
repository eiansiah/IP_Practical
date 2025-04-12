<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <head></head>
            <body>
                <h1>Food Table</h1>
                <hr />
                <!-- Create Table -->
                <table border="1" cellpadding="5" cellspacing="0">
                    <tr bgcolor="#cccccc">
                        <th>Name</th>
                        <th>carbsPerServing</th>
                        <th>fiberPerServing</th>
                        <th>fatPerServing</th>
                        <th>kjPerServing</th>
                        <th>carbohydrate</th>
                        <th>total carbohydrate</th>
                    </tr>
<!--                    Display the contents of Food.xml in a table with a column that provides the count of each
                    row.
                    <xsl:for-each select="foodList/foodItem">-->
<!--                    Display only the 3rd record until the 5th record
                    <xsl:for-each select="foodList/foodItem[position()= 3 or position()= 5]">-->
<!--                    Display only those food items that are either vegetables or fruit.
                    <xsl:for-each select="foodList/foodItem[@type='vegetable' or @type='fruit']">-->
<!--                    Display those food items that are not fruit.
                    <xsl:for-each select="foodList/foodItem[@type!='fruit']">-->
                    <xsl:for-each select="foodList/foodItem">
                        <xsl:sort select="name" data-type="text" order="ascending"/>
                        <tr>
                            <td style="center">
                                <xsl:value-of select="name"/>
                            </td>
                            <td>
                                <xsl:value-of select="carbsPerServing"/>
                            </td>
                            <td>
                                <xsl:value-of select="fiberPerServing"/>
                            </td>
                            <td>
                                <xsl:value-of select="fatPerServing"/>
                            </td>
                            <td>
                                <xsl:value-of select="kjPerServing"/>
                            </td>
                            <td>
                                <xsl:value-of select="carbsPerServing"/>
                            </td>
                            <td>
                                <xsl:value-of select="carbsPerServing*3"/>
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>