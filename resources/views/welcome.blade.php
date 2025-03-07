<?php

use Illuminate\Support\Facades\Hash;

$hashedPassword = '$2y$12$2.G/W7PlH78BlOki9tgvJOsjNCSIXM3VqdYik0l/aK/FJQpPHhSe6';
$plainTextPassword = 'password123'; // Replace with the actual plaintext password

if (Hash::check($plainTextPassword, $hashedPassword)) {
    echo "Password matches!";
} else {
    echo "Password does not match!";
}