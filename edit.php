<!DOCTYPE html>
<html>
    <head>
        <?php require "test_input.php";?>
        
        <link rel="stylesheet" type="text/css" href="/zadatak3/table.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <?php
    
    $db = new SQLite3('information.db');
    $fullname = $email = $username = $password =$id= "";
    $fullnameErr = $emailErr = $usernameErr = $passwordErr="";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        require "save.php";
    }
    else{
        require "get_edit.php";
    }

    ?>
    <body>
        <div class="container">
            <div class="edit">
                <div class="title"><h3>Edit user</h3></div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="text" name="id" style="display: none" value="<?php echo $id;?>" />
                    <div class="group">
                        <label>Full name:</label>
                        <input type="text" name="fullname" placeholder="Full name" value="<?php echo $fullname;?>"/>
                        <span <?php if(!empty($fullnameErr))echo 'class="error"';?> > <?php echo $fullnameErr;?></span>
                    </div>
                    <div class="group">
                        <label>Username:</label> 
                        <input type="text" name="username" placeholder="Username" value="<?php echo $username;?>"/>
                        <span <?php if(!empty($usernameErr))echo 'class="error"';?>>* <?php echo $usernameErr;?></span>
                    </div>
                    <div class="group">
                        <label>E-mail:</label>
                        <input type="email" name="email" placeholder="Email" value="<?php echo $email;?>"/>
                        <span <?php if(!empty($emailErr))echo 'class="error"';?>>* <?php echo $emailErr;?></span>
                    </div>
                    <div class="group">
                        <label>Password:</label>
                        <input type="text" name="password" placeholder="Password" value="<?php echo $password;?>"/>
                        <span <?php if(!empty($passwordErr))echo 'class="error"';?>>* <?php echo $passwordErr;?></span>
                    </div>
                    <button class="btn-warning" onclick="toIndex(event)">Cancel</button>
                    <input type="submit" class="save" value="Save" />
                    
                </form>
            </div>
        </div>
        <script src="/zadatak3/app.js"></script>
    </body>
</html>

