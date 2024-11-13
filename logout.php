<?php
session_start();
session_destroy(); // Hancurkan sesi
header('Location: login.php'); // Arahkan ke halaman login
exit;
