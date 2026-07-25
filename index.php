<?php
$currentPage = "home";
$pageTitle = "Home";

require "events_data.php";
require "header.php";
?>

<section>

    <h2>Welcome to Campus Events Hub</h2>

    <p>
        Campus Events Hub is managed by the Student Activities Department and helps students discover upcoming campus events and register online.
    </p>

    <p>
        Our platform brings together academic, social, sports, and club activities in one convenient place.
    </p>

    <a href="events.php" class="button">Explore Events</a>
    <a href="register.php" class="button">Register Now</a>

</section>

<section>

    <h2>Event Categories</h2>

    <div class="categories">

        <div class="category">
            <h3>Academic &amp; Career</h3>
            <p>Workshops, guest lectures, study groups and career fairs.</p>
        </div>

        <div class="category">
            <h3>Social &amp; Entertainment</h3>
            <p>Movie nights, concerts, festivals and student gatherings.</p>
        </div>

        <div class="category">
            <h3>Sports &amp; Wellness</h3>
            <p>Sports competitions, fitness classes and wellness activities.</p>
        </div>

        <div class="category">
            <h3>Clubs &amp; Hobbies</h3>
            <p>Robotics, gaming, chess, photography and art workshops.</p>
        </div>

    </div>

</section>

<section>

    <h2>Upcoming Events</h2>

    <div class="events">

        <?php
        // To display the next three upcoming events
        $nextThree = array_slice($events, 0, 3, true);

        foreach ($nextThree as $id => $event) :
        ?>
            <article class="event">
                <img src="<?php echo htmlspecialchars($event['image']); ?>" alt="<?php echo htmlspecialchars($event['title']); ?>">
                <div class="event-content">
                    <h3><?php echo htmlspecialchars($event['title']); ?></h3>
                    <p><strong>Date:</strong> <?php echo htmlspecialchars($event['date']); ?></p>
                    <p><?php echo htmlspecialchars($event['summary']); ?></p>
                    <a href="eventsdetalis.php?id=<?php echo $id; ?>" class="button">Read More</a>
                </div>
            </article>
        <?php endforeach; ?>

    </div>

</section>
<!--written by Salem-->
<?php require "footer.php"; ?>