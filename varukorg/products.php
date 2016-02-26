<?php

if(isset($_GET['action']) && $_GET['action']=="add"){

    $id=intval($_GET['id']);

    if(isset($_SESSION['cart'][$id])){

        $_SESSION['cart'][$id]['quantity'];

    }else{

        $sql_s="SELECT * FROM products
                WHERE id_product={$id}";
        $query_s=mysql_query($sql_s);
        if(mysql_num_rows($query_s)!=0){
            $row_s=mysql_fetch_array($query_s);

            $_SESSION['cart'][$row_s['id_product']]=array(
                "quantity" => 1,

            );


        }else{

            $message="This product id it's invalid!";

        }

    }

}

?>
<h1>Product List</h1>
<?php
if(isset($message)){
    echo "<h2>$message</h2>";
}
?>
<table>
    <tr>
        <th>Namn</th>
        <th>Lägg till</th>
    </tr>

    <?php

    $sql="SELECT * FROM products ORDER BY name ASC";
    $query=mysql_query($sql);

    while ($row=mysql_fetch_array($query)) {

        ?>
        <tr>
            <td><?php echo $row['name'] ?></td>
            <td><a href="index.php?page=products&action=add&id=<?php echo $row['id_product'] ?>">Lägg till i min kyl</a></td>
        </tr>
    <?php

    }

    ?>

</table>