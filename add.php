<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <title>Add</title>
</head>

<body>
    <div>
        <h1>Adding Product Form</h1>
        <?php 
        require("connect.php");   
        if(isset($_POST["submit"]))
            {
                $nameproduct = $_POST["nameproduct"];
                $price = $_POST["price"];
                $description = $_POST["description"];
                if ($nameproduct == ""||$price == ""|| $description == "") 
                    {
                        ?>
                        <script>
                            alert("Product information should not be blank!!");
                        </script>
                        <?php
                    }
                else
                    {
                        $sql = "select * from product where nameproduct='$nameproduct'";
                        $query = pg_query($conn, $sql);
                        if(pg_num_rows($query)>0)
                        {
                        ?> 
                            <script>
                                alert("The product is available!!");
                            </script>
                        <?php
                        }
                        else
                        {
                            $sql = "INSERT INTO product(nameproduct, price, description) VALUES ('$nameproduct','$price','$description')";
                            pg_query($conn,$sql);
                            ?> 
                                <script>
                                    alert("Added successful!");
                                    window.location.href = "/managing.php";
                                </script>
                            <?php
                        }
                    }
            }
            ?>
        <form action="add.php" method="POST">
            <input type="text" name="nameproduct" placeholder="nameproduct"> <br>
            <input type="text" name="price" placeholder="Price"> <br>
            <input type="text" name="description" placeholder="Description"> <br>
            <button type="submit" value="Add" name="submit">Add</button>
        </form>
        
        <button><a href="/managing.php">Back</a></button>
    </div>
</body>

</html>