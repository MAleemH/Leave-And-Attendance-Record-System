<?php
include '../includes/user_head.php';
include '../includes/user_navbar.php';
include '../includes/user_sidebar.php';
?>

<main>
    <section>
        <div>
            <div class="d-flex justify-content-between">
                <h3 class="text-uppercase">Attendance</h3>
                <a href="mark_attendance.php" class='btn btn-success m-1'>Mark Attendance</a>
            </div>
            <!-- toggle buttons -->
            <div class="mb-2">
                <button type="button" class="btn btn-warning" onclick="toggleForm('monthlyForm')">Monthly</button>
                <button type="button" class="btn btn-warning" onclick="toggleForm('yearlyForm')">Yearly</button>
            </div>
            <!-- monthly form -->
            <div id="monthlyForm" class="form-container">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Month:</label>
                        <input type="month" class="form-control w-25" name="month" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" name="monthly">View Attendance</button>
                    </div>
                </form>
            </div>
            <!-- yearly form -->
            <div id="yearlyForm" class="form-container">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Year:</label>
                        <input type="number" class="form-control w-25" name="year" min="2000" max="2099" placeholder="2023" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" name="yearly">View Attendance</button>
                    </div>
                </form>
            </div>
            <!-- display attendance -->
            <div class="mt-2">
                <?php
                // Get the selected month and year from the form
                if (isset($_POST['monthly'])) {
                    $selectedDate = $_POST['month'];
                    $selectedYear = date("Y", strtotime($selectedDate));
                    $selectedMonth = date("m", strtotime($selectedDate));

                    // Assuming you have stored employee_id in a session after login
                    $employeeId = $_SESSION['user_id'];

                    // Get the last day of the selected month
                    $lastDayOfMonth = date("t", strtotime($selectedDate));

                    // Query to fetch attendance for the selected month and employee
                    $sql = "SELECT DAY(attendance_date) AS day, status FROM attendance
                            WHERE user_id = $employeeId
                            AND YEAR(attendance_date) = $selectedYear
                            AND MONTH(attendance_date) = $selectedMonth";

                    $result = mysqli_query($connection, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        echo "<h5>Monthly Attendance - " . date("F Y", strtotime($selectedDate)) . "</h5>";
                        // Create an empty attendance array for all days in the month
                        $attendanceData = array_fill(1, $lastDayOfMonth, 'Absent');
                
                        // Populate the attendance array with fetched data
                        while ($row = mysqli_fetch_assoc($result)) {
                            $attendanceData[$row['day']] = $row['status'];
                        }
                
                        // Display the attendance table
                        echo "<div class='monthly'>";
                
                        // Generate headers for the days in the selected month
                        for ($day = 1; $day <= $lastDayOfMonth; $day++) {
                            $attendanceStatus = $attendanceData[$day];
                            echo '<div class="' . ($attendanceStatus == 'Present' ? 'present' : 'absent') . ' monthly-item">';
                            echo $day . '<br>' . $attendanceStatus;
                            echo '</div>';
                        }
                
                        echo "</div>";
                    } else {
                        echo "No attendance records found for the selected month.";
                    }
                } elseif (isset($_POST['yearly'])) {
                    $selectedYear = $_POST['year'];

                    // Assuming you have stored employee_id in a session after login
                    $employeeId = $_SESSION['user_id'];

                    // Query to fetch attendance for the selected year and employee
                    $sql = "SELECT * FROM attendance
                            WHERE user_id = $employeeId
                            AND YEAR(attendance_date) = $selectedYear";

                    $result = mysqli_query($connection, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // Display the attendance records
                        echo "<h2>Yearly Attendance - " . $selectedYear . "</h2>";
                        echo "<table>";
                        echo "<tr><th>Date</th><th>Time In</th><th>Time Out</th></tr>";

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['attendance_date'] . "</td>";
                            echo "<td>" . $row['time_in'] . "</td>";
                            echo "<td>" . $row['time_out'] . "</td>";
                            echo "</tr>";
                        }

                        echo "</table>";
                    } else {
                        echo "No attendance records found for the selected year.";
                    }
                }

                // Close the database connection
                mysqli_close($connection);
                ?>

            </div>
        </div>
    </section>
</main>

<?php
include '../includes/user_footer.php';
?>