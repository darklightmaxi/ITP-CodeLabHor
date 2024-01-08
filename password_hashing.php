<?php

function hashWithSalt($input) {
    $options = [
        'cost' => 12, // 2 ^ 12 iterations
    ];
    $salt = password_hash(rand(), PASSWORD_BCRYPT, $options);
    $hashedPassword = password_hash($input . $salt, PASSWORD_BCRYPT, $options);
    return $hashedPassword;
}

// Example usage
$input = "password123";
$hashedPassword = hashWithSalt($input);

echo "Input: $input\n";
echo "Hashed Password: $hashedPassword\n";

?>
