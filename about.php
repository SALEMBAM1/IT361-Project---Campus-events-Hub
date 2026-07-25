<?php
$currentPage = "about";
$pageTitle = "About";

$errors = [];
$name = "";
$email = "";
$message = "";
$sent = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $message = trim($_POST["message"] ?? "");

    if ($name === "") {
        $errors[] = "Full name is required.";
    }

    if ($email === "") {
        $errors[] = "Email address is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    if ($message === "") {
        $errors[] = "Message is required.";
    }

    if (empty($errors)) {

        $sent = true;

        // Clear the form after successful submission
        $name = "";
        $email = "";
        $message = "";
    }
}

require "header.php";
?>

<section>

    <h2>About Campus Events Hub</h2>

    <p>
        Campus Events Hub was created to help university students discover upcoming
        campus events and register for them easily. Managed by the Student Activities
        Department, the platform brings together academic, social, sports, and club
        activities in one convenient place.
    </p>

</section>

<section>

    <h2>Our Team</h2>

    <ul>
        <li>Abdulaziz: Documentation, PHP Integration, Logo</li>
        <li>Salem: Home Page, HTML Development</li>
        <li>Bader: Registration System, CSV Storage</li>
        <li>Khalid: Events Pages, Event Details</li>
    </ul>

</section>

<section>

    <h2>Contact Us</h2>

    <p>
        Have an event you'd like to share? complete the form below and we'll review your submission.
    </p>

    <?php if ($sent) : ?>
        <div style="background:#d4edda; color:#155724; border:1px solid #c3e6cb; padding:15px; margin-bottom:20px; border-radius:6px;">
            <strong>Thank you!</strong> Your message has been received successfully.
        </div>
    <?php endif; ?>

    <?php if (!empty($errors)) : ?>
        <div style="background:#f8d7da; color:#721c24; border:1px solid #f5c6cb; padding:15px; margin-bottom:20px; border-radius:6px;">
            <p><strong>Please fix the following before submitting:</strong></p>

            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>

        </div>
    <?php endif; ?>

    <form action="about.php" method="post">

        <label for="name">Full Name</label>

        <input
            type="text"
            id="name"
            name="name"
            placeholder="Enter your name"
            value="<?php echo htmlspecialchars($name); ?>"
            required>

        <label for="email">Email Address</label>

        <input
            type="email"
            id="email"
            name="email"
            placeholder="example@university.edu"
            value="<?php echo htmlspecialchars($email); ?>"
            required>

        <label for="message">Message</label>

        <textarea
            id="message"
            name="message"
            rows="6"
            placeholder="Write your message here..."
            required><?php echo htmlspecialchars($message); ?></textarea>

        <button type="submit" class="button">Send Message</button>

    </form>

</section>

<!-- Written by Abdulaziz Mashykhi -->

<?php require "footer.php"; ?>