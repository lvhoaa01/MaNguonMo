<?php

$conn = mysqli_connect('localhost', 'root', '', 'quanly_ban_sua')
    or die('database ' . mysqli_connect_error());

mysqli_set_charset($conn, 'utf8');
