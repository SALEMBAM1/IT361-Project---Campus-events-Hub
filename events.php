<?php
$currentPage = "events";
$pageTitle = "Events";
require "events_data.php";
require "header.php";
?>
 
<!-- the introduction -->
<section>
    <h2>Upcoming Campus Events</h2>
    <p>
        Explore upcoming events organized by the Student Activities Department.
        Select any event to learn more about it and register online.
    </p>
</section>
 
<!-- events list -->
<div>
    <div class="events">
        <?php foreach ($events as $id => $event) : ?>
            <article class="event">
                <img src="<?php echo htmlspecialchars($event['image']); ?>"
                     alt="<?php echo htmlspecialchars($event['title']); ?>">
                <div class="event-content">
                    <h3><?php echo htmlspecialchars($event['title']); ?></h3>
                    <p><strong>Date:</strong> <?php echo htmlspecialchars($event['date']); ?></p>
                    <p><strong>Location:</strong> <?php echo htmlspecialchars($event['location']); ?></p>
                    <p><strong>Category:</strong> <?php echo htmlspecialchars($event['category']); ?></p>
                    <p><?php echo htmlspecialchars($event['summary']); ?></p>
                    <a href="eventsdetalis.php?id=<?php echo $id; ?>" class="button">
                        View Event Details
                    </a>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</div>
 
<?php require "footer.php"; ?> <!--written by Khalid Turki-->