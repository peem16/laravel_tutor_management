<?php


$hash = '$2y$10$woaDlg7IsWlX4LJOc9ZCTuctvJMVzgBfGlMm0.PeU.lRZGV5CxhOe';

if (password_verify('123321', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}

?>
