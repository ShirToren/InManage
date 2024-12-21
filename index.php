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

    // $url = "https://jsonplaceholder.typicode.com/users";

    // // Initialize cURL session
    // $ch = curl_init($url);

    // // Set cURL options
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response as a string
    // curl_setopt($ch, CURLOPT_HTTPGET, true);        // Use GET method

    // // Execute cURL request
    // $response = curl_exec($ch);

    // // Check for errors
    // if (curl_errno($ch)) {
    //     echo "cURL Error: " . curl_error($ch);
    //     curl_close($ch);
    //     exit;
    // }

    // // Close cURL session
    // curl_close($ch);

    // // Decode the JSON response into a PHP array
    // $data = json_decode($response, true);

    // // Check if the response was successfully decoded
    // if (json_last_error() !== JSON_ERROR_NONE) {
    //     echo "Error decoding JSON: " . json_last_error_msg();
    //     exit;
    // }

    // foreach ($data as $user) {
    //     $newUser = [
    //         'name' => $user['name'],
    //         'email' => $user['email'],
    //         'active' => 0
    //     ];
    //     if ($db->insert('users', $newUser)) {
    //         echo "User inserted successfully!";
    //     } else {
    //         echo "Failed to insert user.";
    //     }
    // }


$updateData = [
    'name' => 'Johnathan Doe',
    'email' => 'johnathan.doe@example.com',
    'active' => 0
];

$whereConditions = [
    'id' => 1
];

if ($db->update('users', $updateData, $whereConditions)) {
    echo "User updated successfully!";
} else {
    echo "Failed to update user.";
}


// Define the condition for the WHERE clause (user ID)
$whereConditions = [
    'id' => '16' // The ID of the user to delete
];

// Call the delete method to remove the user
if ($db->delete('users', $whereConditions)) {
    echo "User deleted successfully!";
} else {
    echo "Failed to delete user.";
}

    ?>
</body>
</html>