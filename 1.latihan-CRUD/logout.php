<?php
// Simpan script ini di file logout.php

session_start();

// Hapus semua data session
session_destroy();

// Redirect ke halaman login atau halaman lain yang diinginkan setelah logout
header('Location: index.php');
exit;
?>
