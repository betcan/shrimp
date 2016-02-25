<?php

if(isset($_POST['submit'])){

    foreach($_POST['quantity'] as $key => $val) {
        if($val==0) {
            unset($_SESSION['cart'][$key]);
        }else{
            $_SESSION['cart'][$key]['quantity']=$val;
        }
    }

}

?>

<h1>View cart</h1>
<a href="index.php?page=products">Go back to the products page.</a>
<form method="post" action="index.php?page=cart">

    <table>

        <tr>
            <th>Name</th>
            <th>Quantity</th>

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
                <td><input type="text" name="quantity[<?php echo $row['id_product'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['id_product']]['quantity'] ?>" /></td>

            </tr>
        <?php

        }
        ?>


    </table>
    <br />
    <button type="submit" name="submit">Update Cart</button>
</form>
<br />
<p>To remove an item set its quantity to 0. </p>