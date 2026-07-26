<?php 
$currentPage = "registrations";
$pageTitle = "Registrations";

require "header.php";

$csvFile = "registrations.csv";
$rows = [];

if (file_exists($csvFile)) {
    $handle = fopen($csvFile, "r");
    $header = fgetcsv($handle);
    while (($data = fgetcsv($handle)) !== false) {
        $rows[] = $data;
    }
    fclose($handle);
}
?>

<section>

    <h2>Student Registrations</h2>

    <p>The table below displays all students currently registered for campus events.</p>

    <p><strong>Total Registrations:</strong> <?php echo count($rows); ?></p>

    <?php if (empty($rows)) : ?>

        <p>No registrations yet. Be the first to <a href="register.php">register for an event</a>.</p>

    <?php else : ?>

        <table>

            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Student ID</th>
                    <th>Email</th>
                    <th>Registered Event</th>
                    <th>Registration Date</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row[0]); ?></td>
                        <td><?php echo htmlspecialchars($row[1]); ?></td>
                        <td><?php echo htmlspecialchars($row[2]); ?></td>
                        <td><?php echo htmlspecialchars($row[3]); ?></td>
                        <td><?php echo htmlspecialchars($row[4]); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>

    <?php endif; ?>

</section>

<?php require "footer.php"; ?> <!--written by Bader Bin Saidan  -->