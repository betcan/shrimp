

<h1>Min Kyl</h1>
<a href="index.php?page=products">Go back to the products page.</a>
<form method="post" action="index.php?page=cart">

    <table>

        <tr>
            <th>Namn</th>


        </tr>

        <?php

        $sql="SELECT * FROM products WHERE id_product IN (";

        foreach($_SESSION['cart'] as $id => $value) {
            $sql.=$id.",";
        }

        $sql=substr($sql, 0, -1).") ORDER BY name ASC";
        $query=mysql_query($sql);
        while($row=mysql_fetch_array($query)){
            ?>
            <tr>
                <td><?php echo $row['name'] ?></td>


            </tr>
        <?php

        }
        ?>


    </table>
    <br />
    <button type="submit" name="submit">Uppdatera</button>
</form>
<br />
