<?php
if (!isset($currentPage)) {
    $currentPage = "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Campus Events Hub<?php echo isset($pageTitle) ? " | " . $pageTitle : ""; ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <header>

        <img src="images/logo.png" alt="Campus Events Hub Logo">

        <h1>Campus Events Hub</h1>

        <p>Discover. Connect. Participate.</p>

    </header>

    <nav>

        <ul>

            <li><a href="index.php" <?php echo $currentPage === "home" ? 'class="active"' : ''; ?>>Home</a></li>
            <li><a href="events.php" <?php echo $currentPage === "events" ? 'class="active"' : ''; ?>>Events</a></li>
            <li><a href="register.php" <?php echo $currentPage === "register" ? 'class="active"' : ''; ?>>Register</a></li>
            <li><a href="registrationslist.php" <?php echo $currentPage === "registrations" ? 'class="active"' : ''; ?>>Registrations</a></li>
            <li><a href="about.php" <?php echo $currentPage === "about" ? 'class="active"' : ''; ?>>About</a></li>

        </ul>

    </nav>
    <!--Written by Abdulaziz Mashykhi-->
    <main>