<?php include "libs/crud.php"?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/style.css">
      <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC|Exo+2" rel="stylesheet">
    <title>bizOnline | Gestion des stocks</title>
</head>
<body>
    <div class="wrap">
    <h1 class="title">
        <a href="<?php echo $_SERVER['PHP_SELF'] ?>">Gestion des stocks</a>
    </h1>
    <?php if(isset($msg_crud)): ?>
    <p>
        <?php echo $msg_crud; unset($msg_crud) ?>
    </p>
    <?php endif; ?>
    <p>Ajouter un produit à votre stock :</p>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" class="f-col" >
       <p>Nom: <input class="input" name="nom" type="text" placeholder="Nom du produit" value="" required=""> Prix: <input class="input" name="prix" type="number" placeholder="Prix du produit" value="" required=""> Description: <input class="input" name="description" id="" cols="30" rows="10" placeholder="Description du produit" required=""></input></p>
        <div class="f-row">
            <input class="submit" name="create_product" type="submit" value="Ajouter" class="btn">
        </div>
    </form>

    <?php if (isset($products) && count($products)): ?>
    <p>Liste des produits présent dans votre stock :</p>
            <table>
            <tr>
                <?php
                $meta2 = $exec->getColumnMeta(0);
                $nbrCol = $exec->columnCount();
                     for ($x=0; $x < $nbrCol ; $x++){
                         $meta = $exec->getColumnMeta($x);
                         echo "<th>" . $meta['name'] . "</th>";
                     }?>

                    <th>Editer</th>
                    <th>
                        <input type="submit" name="delete_products" class="btn danger" value="Effacer produits">
                    </th>
            </tr>

            <?php foreach($products as $product) {
                echo "<tr>";
                foreach($product as $val) {
                    $col_name = isset($val) ? $val : "N.R";
                    echo " <td> $col_name </td>";
                }
                echo "<td class=\"tdCenter\"><a class=\"btn\" href=\"libs/edit-product.php?id=$product->id\">Editer</td>";
                echo "
                <td class=\"tdCenter\"><input id=\"product_$product->id\" name=\"delete_product_id[]\" type=\"checkbox\" value=\"$product->id\"></td>
                </tr>";
            } ?>
            </table>
    <?php endif ?>
    </div>
</body>
</html>