<?php
$currentPage = "events";

require "events_data.php";

// read "id" from the URL, e.g. eventsdetalis.php?id=1
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if (!isset($events[$id])) {
    $pageTitle = "Event Not Found";
    require "header.php";
    echo "<section>";
    echo "<h2>Event Not Found</h2>";
    echo "<p>Sorry, we couldn't find the event you were looking for.</p>";
    echo '<a href="events.php" class="button">Back to Events</a>';
    echo "</section>";
    require "footer.php";
    exit;
}

$event = $events[$id];
$pageTitle = $event['title'];

require "header.php";
?>

<section>

    <h2><?php echo htmlspecialchars($event['title']); ?></h2>

    <p><?php echo htmlspecialchars($event['summary']); ?></p>

    <img src="<?php echo htmlspecialchars($event['image']); ?>" alt="<?php echo htmlspecialchars($event['title']); ?>">

    <p><strong>Date:</strong> <?php echo htmlspecialchars($event['date']); ?></p>

    <p><strong>Time:</strong> <?php echo htmlspecialchars($event['time']); ?></p>

    <p><strong>Location:</strong> <?php echo htmlspecialchars($event['location']); ?></p>

    <p><strong>Category:</strong> <?php echo htmlspecialchars($event['category']); ?></p>

    <p><strong>Organizer:</strong> <?php echo htmlspecialchars($event['organizer']); ?></p>

    <p><strong>Capacity:</strong> <?php echo htmlspecialchars($event['capacity']); ?></p>

    <h3>Event Description</h3>

    <p><?php echo htmlspecialchars($event['description']); ?></p>

    <a href="register.php?event=<?php echo urlencode($event['title']); ?>" class="button">Register Now</a>
    <a href="events.php" class="button">Back to Events</a>

</section>

<?php require "footer.php"; ?> <!--written by Khalid Turki-->