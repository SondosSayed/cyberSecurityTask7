<?php
session_start();

?>
<span style="font-family: verdana, geneva, sans-serif;">
<!DOCTYPE html>
  <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Add Item</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="addContainer">
                <form action="add_item_process.php" method="post" enctype="multipart/form-data">
                <?php
                      if(isset($sent)){
                        echo $sent;
                      }
                    ?>

                    <h3 class="add"> add new item</h3>
                
                    <label>Barcode</label>
                    <input type="text" name="barcode" placeholder="Barcode" >

                    <?php
                      if(isset($barcodeError)){
                        echo $barcodeError ;
                      }  
                    ?>
                    <label>Name</label>
                    <input type="text"  name="name" placeholder="Name" >

                    <?php
                      if(isset($nameError)){
                        echo $nameError;
                      }
                    ?>
                    <label>Price</label>
                 
                    <input type="text" name="price" placeholder="Price" >
                    <?php
                      if(isset($priceError)){
                        echo $priceError;
                      }
                    ?>
                    <label>Qty</label>
                    <input type="text"  name="qty"  placeholder="Qty" >

                    <?php
                      if(isset($qtyError)){
                        echo $qtyError;
                      }
                    ?>
                    <label>Image</label>
                    <input type="file" name="image"  >
                    <?php
                      if(isset($imageError)){
                        echo $imageError;
                      } 
                    ?>

                    <button name="save">Save</button>

                   
               
                </form>
    
    </body>
    
    </html>
</span>
    