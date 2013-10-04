<!DOCTYPE html>
<html>
    <head>
        <?php require "load_post.php";?>
        <?php require "load_db.php";?>
        <link rel="stylesheet" type="text/css" href="/Zadatak3/table.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container">
            <div class="table-div">
                <div>
                    <h3>Users:</h3>
                    <a href="/Zadatak3/edit.php" class="primary">Add</a>
                </div>
                <table class="table table-hower">
                    <thead>
                        <tr>
                            <th>Full name</th>
                            <th>Username</th>
                            <th>E-mail</th>
                            <th>Password</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if($page>1 && $total<=$offset)
                            header( 'Location: /Zadatak3/index.php?page=' . (int)$total/$limit ) ;
                        
                        
                        while ($row = $result->fetchArray()) { 
                        ?>
                        <tr onclick="edit_person(<?php echo $row["ID"]; ?> )">
                            <td><?php echo $row["fullname"]; ?></td>
                            <td><?php echo $row["username"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                            <td><?php echo $row["password"]; ?></td>
                            <td><button class="btn-danger" onclick="delete_person(event, <?php echo $row["ID"]; ?>)">Delete</button></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="pages">
                    <?php 
                    $total/=$limit;
                    if ($total>1)
                    {
                        if($total!=(int)$total)
                            $total=(int)$total+1;
                        else
                            $total=(int)$total;
                        
                        for($i=1;$i<=$total;$i++){ 
                    ?>    
                    <button onclick="to_page(<?php echo  $i; ?>)" <?php if ($page==$i) echo "class='active'"; ?> > <?php echo $i; ?></button>
                    <?php }}?>
                </div>
            </div>
            <div class="search">
                <div class="title"><label>Search</label></div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="text" name="fullname" placeholder="Full name" value="<?php echo $fullname;?>" />
                    <input type="text" name="username" placeholder="Username" value="<?php echo $username;?>"/>
                    <input type="email" name="email" placeholder="Email" value="<?php echo $email;?>"/>
                    <input type="text" name="password" placeholder="Password" value="<?php echo $password;?>"/>
                    <input type="submit" class="find" value="Find" />
                </form>
            </div>
        </div>
        <script src="/Zadatak3/app.js"></script>
    </body>
</html>
