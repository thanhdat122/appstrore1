<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <title>Document</title>
</head>

<body>
<?php
    session_start();
    if(!isset($_SESSION['dangnhap'])){
     header('login.php');
    }
?>
    <div class="content">
        <h1>Managing Product</h1>
        <table>
            <tr>
                <th class="tit">ID</th>
                <th class="tit">Name</th>
                <th class="tit">Price ($)</th>
                <th class="tit">Description</th>
                <th class="tit">Editting</th>
            </tr>

            <?php
            require_once './database.php';
            $sql = "SELECT * FROM product";
            $stmt = $pdo->prepare($sql);
            foreach ($pdo->query($sql) as $row) {
            ?>
                <tr>
                    <td class="info"><?php echo $row['id']?></td> 
                    <td class="info"><?php echo $row['nameproduct']?></td> 
                    <td class="info"><?php echo $row['price']?></td> 
                    <td class="info"><?php echo $row['description']?></td> 
                    <td class="info"><a href="#">Delete</a><a href="#">Update</a></td>
                </tr>
            <?php
            }
            ?> 
        </table>
        <button><a href="add.php">Add Product</a></button>
    </div>
</body>

</html>