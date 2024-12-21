<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    require_once 'Database.php';
    $db = new Database("localhost", "inmanage", "root","");
    $newUser = [
        'name' => 'Shir Toren',
        'email' => 'shirtoren25@gmail.com',
        'active' => 0
    ];
    if ($db->insert('users', $newUser)) {
        echo "User inserted successfully!";
    } else {
        echo "Failed to insert user.";
    }

    //echo "Hello World! inmanage";
    
    ?>
</body>
</html>