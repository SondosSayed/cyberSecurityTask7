
<?php 
require 'init.php';
session_start();

if( isset($_COOKIE['user_role'])  && $_COOKIE['user_role']==='admin'  ){
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">

    <title>Admin</title>
</head>
<body>
    
</body>
</html>

<?php 



if (isset($_POST['accept'])) {

    $id = $_POST['product_id'];
    
    $get_row_data = $connect->prepare("SELECT * FROM testProduct WHERE product_id = :id");
    $get_row_data->bindValue(':id', $id);
    $get_row_data->execute();
    $row_data = $get_row_data->fetch(PDO::FETCH_ASSOC);

    try {
        $insert_product = $connect->prepare("INSERT INTO products (barcode, name, price, qty, image) VALUES (:barcode, :name, :price, :qty, :image)");
        $insert_product->bindValue(':barcode' , $row_data['barcode']);
        $insert_product->bindValue(':name' , $row_data['name']);
        $insert_product->bindValue(  ':price' , $row_data['price']);
        $insert_product->bindValue(':qty' , $row_data['qty']);
        $insert_product->bindValue(':image' , $row_data['image']);
       
        $insert_product->execute();


        $get_row_data = $connect->prepare("DELETE FROM testproduct WHERE `testproduct`.`product_id` = :id");
        $get_row_data->bindValue(':id', $id);
        $get_row_data->execute();

        
       
        // echo "Added successfully";
       
    } catch (Exception $e) {
        echo "Error " . $e->getMessage();
        exit();
    }
}

if (isset($_POST['refuce'])) {

    $id = $_POST['product_id'];
    
    $get_row_data = $connect->prepare("DELETE FROM testproduct WHERE `testproduct`.`product_id` = :id");
    $get_row_data->bindValue(':id', $id);
    $get_row_data->execute();
  
    // echo "refused";




}








try {
    $checkproduct = $connect->prepare("SELECT * FROM testProduct");  
    $checkproduct->execute(); 

} catch (Exception $e) {
    echo "Error " . $e->getMessage();
    exit();
}

?>
            
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Barcode</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Image</th>
                        <th style="width: 25px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php if ($checkproduct->rowCount() > 0) : ?>
                    <?php foreach ($checkproduct as $product) : 
                   

                        
                        ?>
                    <tr>
                        <td><?= $product['barcode'] ?><a/td>
                        <td><?= $product['name'] ?></td>
                        <td>$<?=$product['price'] ?></td>
                        <td> <?= $product['qty'] ?> </td>
                       
                       <td ><img src='images/<?= $product['image']  ?>'  width="100px" ></td>
                        <td> 
                            
                        <div style="width: 150px;">
                    
                        <form action="" method="post">
                                <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                                <button class="prod" type="submit" name="accept">Accept</button>
                                <button class="prod" type="submit" name="refuce">refuce</button>
                            </form>
                           
                           
                        </td>
                    
                    </div>
                    
                    </tr>
                    <?php endforeach ?>
                <?php endif ?>
                </tbody>
            </table>
        </div>
      </div>
      <br>
    </div>
    <?php







}else{
    header('location: login.php'); 
    exit();

}
?>
