<?php
session_start();

// Connect to the database
require_once('db_conn.php');


    // Get the habit ID to edit from the query string
    $habit_id = $_POST['id'];

    // Fetch the habit from the database
    $sql = "SELECT * FROM habits WHERE id = '$habit_id'";
    $result = mysqli_query($conn, $sql);

    // Check if the habit exists in the database
    if (mysqli_num_rows($result) == 1) {
        // Fetch the habit data
        $row = mysqli_fetch_assoc($result);
        $habit = $row['text'];
        $reps = $row['reps'];
        $timeframe = $row['timeframe'];

        // Output the form with pre-filled data
        echo '
        <form class="edit-habit" method="POST" action="update_habit.php">
            <input type="hidden" name="id" value="'.$habit_id.'">
            <input
                class="habit"
                type="text"
                name="habit"
                placeholder="Enter a Habit Title"
                value="'.$habit.'"
                required
            />
            <input
                class="rep"
                type="number"
                name="reps"
                placeholder="No. of Repetitions"
                min="1"
                value="'.$reps.'"
                required
            />
            <select name="timeframe" id="timeframe" class="frequency">
                <option value="" disabled class="pHFrequency">Frequency</option>
                <option value="Daily" '.($timeframe == "Daily" ? "selected" : "").'>Daily</option>
                <option value="Weekly" '.($timeframe == "Weekly" ? "selected" : "").'>Weekly</option>
                <option value="Monthly" '.($timeframe == "Monthly" ? "selected" : "").'>Monthly</option>
                <option value="Yearly" '.($timeframe == "Yearly" ? "selected" : "").'>Yearly</option>
            </select>
            <input type="hidden" name="author_id" value="<?php echo $author_id; ?>" />
            <input class="addHabitButton" type="submit" value="Update Habit" />
        </form>
        ';
    } else {
        // If the habit does not exist in the database, redirect the user back to the homepage
        header('Location: habits.php');
        exit();
    }


// Close the database connection
mysqli_close($conn);
?>
