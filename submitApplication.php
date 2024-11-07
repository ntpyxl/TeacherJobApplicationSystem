<?php 
require_once "core/dbConfig.php";
require_once "core/functions.php";
?>

<html>
    <head>
        <title>Teacher Job Application</title>
        <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    </head>
    <body>
        <h2>Teacher Job Application Submission Page</h2>

        <input type="submit" value="Return to homepage" onclick="window.location.href='index.php'">
        <br><br>

        <form action="core/handleForms.php" method="POST">
            <label for="first_name">First name</label>
            <input type="text" name="first_name" required>

            <label for="last_name">Last name</label>
            <input type="text" name="last_name" required>
            <br>

            <label for="age">Age</label>
            <input type="number" name="age" min="0" required>

            <label for="birthdate">Birthdate</label>
            <input type="date" name="birthdate" min="1900-01-01" required>

            <label for="gender">Gender</label>
            <select name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Gay">Gay</option>
                <option value="Lesbian">Lesbian</option>
                <option value="Transgender">Transgender</option>
                <option value="Prefer Not To Say">Prefer Not To Say</option>
            </select>

            <label for="religion">Religion</label>
            <select name="religion">
                <option value="Catholic">Catholic</option>
                <option value="Islam">Islam</option>
                <option value="Buddhism">Buddhism</option>
                <option value="INC">INC</option>
                <option value="None">None</option>
            </select>
            <br>

            <label for="email_address">Email Address</label>
            <input type="text" name="email_address" required>
            <br>

            <label for="home_address">Home Address</label>
            <input type="text" name="home_address" required>
            <br>

            <label for="experienceInMonths">Experience (in months)</label>
            <input type="number" name="experienceInMonths" min="0" required>
            <br>

            <input type="submit" name="submitApplicationButton" value="Submit application">
        </form>
    </body>
</html>