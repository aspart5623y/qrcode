<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h3>This is a Qr Code generator System</h3>

    <form method="post">
        <?php 
            $error = '';

            if(isset($_POST['submit'])){
                if(!empty($_POST['name'])){
                    session_start();
                    $_SESSION['name'] = $_POST['name'];
                    // header('Location: create.php');
                    ?>
                    <img src="qrcode.php?text=<?php echo $_SESSION['name'] ?>" alt="qr code">
                    <br />
                    <?php
                } else {
                    $error = "Please enter your name";
                }
            }
        ?>
        <input type="text" name="name" placeholder="Enter your name">
        <p><?php echo $error; ?></p>

        <input type="submit" name="submit" value="Generate Code">
    </form>
    
    <br />

   
    <form method="post">
        <?php 
            if(isset($_POST['disconnect'])){
                session_start();
                session_destroy();
                unset($_SESSION);
                header('Location: create.php');
            }
        ?>
        

        <input type="submit" name="disconnect" value="Destroy Code">
    </form>

    

</body>
</html>