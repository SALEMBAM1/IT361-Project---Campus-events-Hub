<?php
$currentPage = "register";
$pageTitle = "Register";

require "events_data.php";

$errors = [];
$fullname = "";
$studentid = "";
$email = "";
$selectedEvent = isset($_GET['event']) ? $_GET['event'] : "";
$requests = "";
$success = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $fullname      = trim($_POST['fullname'] ?? "");
    $studentid     = trim($_POST['studentid'] ?? "");
    $email         = trim($_POST['email'] ?? "");
    $selectedEvent = trim($_POST['event'] ?? "");
    $requests      = trim($_POST['requests'] ?? "");

    if ($fullname === "") {
        $errors[] = "Full name is required.";
    }

    if ($studentid === "") {
        $errors[] = "Student ID is required.";
    } elseif (!ctype_digit($studentid)) {
        $errors[] = "Student ID must contain numbers only.";
    }

    if ($email === "") {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    if ($selectedEvent === "") {
        $errors[] = "Please select an event.";
    }

    if (empty($errors)) {

        $csvFile = "registrations.csv";
        $isNewFile = !file_exists($csvFile);

        $row = [
            $fullname,
            $studentid,
            $email,
            $selectedEvent,
            date("F j, Y")
        ];

        $handle = fopen($csvFile, "a");

        if ($isNewFile) {
            fputcsv($handle, ["Name", "Student ID", "Email", "Event", "Date Registered"]);
        }

        fputcsv($handle, $row);
        fclose($handle);

        $success = true;

        $fullname = "";
        $studentid = "";
        $email = "";
        $selectedEvent = "";
        $requests = "";
    }
}

require "header.php";
?>

<section>

    <h2>Register for an Event</h2>

    <p>
        Complete the registration form below to reserve your place at one of our upcoming campus events.
        All fields marked with * are required.
    </p>

    <!-- DEBUG -->
    </strong> 
    <?php if ($success) : ?>
        <div style="background:#d4edda;padding:15px;border:1px solid #28a745;margin-bottom:20px;">
            <strong>Thank you!</strong> Your registration was submitted successfully.
        </div>
    <?php endif; ?>

    <?php if (!empty($errors)) : ?>
        <div>
            <p><strong>Please fix the following before submitting:</strong></p>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="register.php" method="post">

        <label for="fullname">Full Name *</label>
        <input
            type="text"
            id="fullname"
            name="fullname"
            value="<?php echo htmlspecialchars($fullname); ?>"
            required>

        <label for="studentid">Student ID *</label>
        <input
            type="text"
            id="studentid"
            name="studentid"
            value="<?php echo htmlspecialchars($studentid); ?>"
            required>

        <label for="email">University Email *</label>
        <input
            type="email"
            id="email"
            name="email"
            value="<?php echo htmlspecialchars($email); ?>"
            required>

        <label for="event">Select an Event *</label>

        <select id="event" name="event" required>

            <option value="">-- Select an Event --</option>

            <?php foreach ($events as $event) : ?>

                <option
                    value="<?php echo htmlspecialchars($event['title']); ?>"
                    <?php echo ($selectedEvent === $event['title']) ? "selected" : ""; ?>>

                    <?php echo htmlspecialchars($event['title']); ?>

                </option>

            <?php endforeach; ?>

        </select>

        <label for="requests">Special Requests (Optional)</label>

        <textarea
            id="requests"
            name="requests"
            rows="4"><?php echo htmlspecialchars($requests); ?></textarea>

        <button type="submit" class="button">Submit Registration</button>

        <button type="reset" class="button">Clear Form</button>

    </form>

</section>

<?php require "footer.php"; ?> <!--written by Bader Bin Saidan  -->