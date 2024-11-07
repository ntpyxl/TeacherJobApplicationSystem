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
        <h2>Teacher Job Application Editing Page</h2>

        <input type="submit" value="Return to homepage" onclick="window.location.href='index.php'">
        <br><br>

        <?php $applicationData = getApplicationByID($pdo, $_GET['application_id'])['querySet'] ?>

        <?php if (isset($_SESSION['message'])) { ?>
            <h3 style="color: red;">	
                <?php echo $_SESSION['message']; ?>
            </h3>
	    <?php } unset($_SESSION['message']); ?>

        <form action="core/handleForms.php?application_id=<?php echo $_GET['application_id']?>" method="POST">
            <label for="first_name">First name</label>
            <input type="text" name="first_name" value="<?php echo $applicationData['first_name']?>" required>

            <label for="last_name">Last name</label>
            <input type="text" name="last_name" value="<?php echo $applicationData['last_name']?>" required>
            <br>

            <label for="age">Age</label>
            <input type="number" name="age" min="0" value="<?php echo $applicationData['age']?>" required>

            <label for="birthdate">Birthdate</label>
            <input type="date" name="birthdate" min="1900-01-01" value="<?php echo $applicationData['birthdate']?>" required>

            <label for="gender">Gender</label>
            <select name="gender">
                <option value="Male" <?php echo ($applicationData['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo ($applicationData['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                <option value="Gay" <?php echo ($applicationData['gender'] == 'Gay') ? 'selected' : ''; ?>>Gay</option>
                <option value="Lesbian" <?php echo ($applicationData['gender'] == 'Lesbian') ? 'selected' : ''; ?>>Lesbian</option>
                <option value="Transgender" <?php echo ($applicationData['gender'] == 'Transgender') ? 'selected' : ''; ?>>Transgender</option>
                <option value="Prefer Not To Say" <?php echo ($applicationData['gender'] == 'Prefer Not To Say') ? 'selected' : ''; ?>>Prefer Not To Say</option>
            </select>

            <label for="religion">Religion</label>
            <select name="religion">
                <option value="Catholic" <?php echo ($applicationData['religion'] == 'Catholic') ? 'selected' : ''; ?>>Catholic</option>
                <option value="Islam" <?php echo ($applicationData['religion'] == 'Islam') ? 'selected' : ''; ?>>Islam</option>
                <option value="Buddhism" <?php echo ($applicationData['religion'] == 'Buddhism') ? 'selected' : ''; ?>>Buddhism</option>
                <option value="INC" <?php echo ($applicationData['religion'] == 'INC') ? 'selected' : ''; ?>>INC</option>
                <option value="None" <?php echo ($applicationData['religion'] == 'None') ? 'selected' : ''; ?>>None</option>
            </select>
            <br>

            <label for="email_address">Email Address</label>
            <input type="text" name="email_address" value="<?php echo $applicationData['email_address']?>" required>
            <br>

            <label for="home_address">Home Address</label>
            <input type="text" name="home_address" value="<?php echo $applicationData['home_address']?>" required>
            <br>

            <label for="experienceInMonths">Experience (in months)</label>
            <input type="number" name="experienceInMonths" min="0" value="<?php echo $applicationData['experienceInMonths']?>" required>
            <br>

            <input type="submit" name="editApplicationButton" value="Edit application">
        </form>
    </body>
</html>