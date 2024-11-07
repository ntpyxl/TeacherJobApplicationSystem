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

        <?php if (isset($_SESSION['message'])) { ?>
            <h3 style="color: red;">	
                <?php echo $_SESSION['message']; ?>
            </h3>
	    <?php } unset($_SESSION['message']); ?>

        <h2 style="color: red;"> DELETE THIS APPLICATION? </h2>

        <table>
            <tr>
                <th>Application <br> ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Birthdate</th>
                <th>Gender</th>
                <th>Religion</th>
                <th>Email Address</th>
                <th>Home Address</th>
                <th>Experience <br> (months)</th>
                <th>Date Applied</th>
                <th>Last Updated</th>
            </tr>

            <?php $applicationData = getApplicationByID($pdo, $_GET['application_id'])['querySet']; ?>
            <tr>
                <td><?php echo $applicationData['application_id']?></td>
                <td><?php echo $applicationData['first_name'] . ' ' . $applicationData['last_name']?></td>
                <td><?php echo $applicationData['age']?></td>
                <td><?php echo $applicationData['birthdate']?></td>
                <td><?php echo $applicationData['gender']?></td>
                <td><?php echo $applicationData['religion']?></td>
                <td><?php echo $applicationData['email_address']?></td>
                <td><?php echo $applicationData['home_address']?></td>
                <td><?php echo $applicationData['experienceInMonths']?></td>
                <td><?php echo $applicationData['date_applied']?></td>
                <td><?php echo $applicationData['last_updated']?></td>
            </tr>
        </table>

        <form action="core/handleForms.php?application_id=<?php echo $_GET['application_id']; ?>" method="POST">
            <input type="submit" name="deleteApplicationButton" value="Delete application">
        </form>
    </body>
</html>