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
        <h2>Teacher Job Application</h2>

        <?php if (isset($_SESSION['message'])) { ?>
            <h3 style="color: red;">	
                <?php echo $_SESSION['message']; ?>
            </h3>
	    <?php } unset($_SESSION['message']); ?>

        Would you like to submit an application?
        <input type="submit" value="Submit an application" onclick="window.location.href='submitApplication.php'">
        <br>
        
        <hr style="width: 99%; height: 2px; color: black; background-color: black;">

        <div style="display: flex; align-items: center;">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
                <label for="searchBar">Search</label>
                <input type="text" name="searchBar">
                <input type="submit" name="searchButton" value="Search application">
            </form>
            <input type="submit" name="clearButton" value="Clear search query" onclick="window.location.href='index.php'">
        </div>

        <table>
            <tr>
                <th colspan="12", style="font-size: 18px;">Teacher Job Applications</th>
            </tr>

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
                <th>Actions</th>
            </tr>

            <?php
            if(isset($_GET['searchButton'])) {
                $searchedApplicationsData = searchForApplication($pdo, $_GET['searchBar'])['querySet'];
                foreach($searchedApplicationsData as $row) {
            ?>
            <tr>
                <td><?php echo $row['application_id']?></td>
                <td><?php echo $row['first_name'] . ' ' . $row['last_name']?></td>
                <td><?php echo $row['age']?></td>
                <td><?php echo $row['birthdate']?></td>
                <td><?php echo $row['gender']?></td>
                <td><?php echo $row['religion']?></td>
                <td><?php echo $row['email_address']?></td>
                <td><?php echo $row['home_address']?></td>
                <td><?php echo $row['experienceInMonths']?></td>
                <td><?php echo $row['date_applied']?></td>
                <td><?php echo $row['last_updated']?></td>
                <td>
                    <input type="submit" value="EDIT" onclick="window.location.href='editApplication.php?application_id=<?php echo $row['application_id']; ?>';">
                    <input type="submit" value="DELETE" onclick="window.location.href='deleteApplication.php?application_id=<?php echo $row['application_id']; ?>';">
                </td>
            </tr>

            <?php }} else {
            $applicationsData = getAllApplications($pdo)['querySet'];
            foreach($applicationsData as $row) {
            ?>
            <tr>
                <td><?php echo $row['application_id']?></td>
                <td><?php echo $row['first_name'] . ' ' . $row['last_name']?></td>
                <td><?php echo $row['age']?></td>
                <td><?php echo $row['birthdate']?></td>
                <td><?php echo $row['gender']?></td>
                <td><?php echo $row['religion']?></td>
                <td><?php echo $row['email_address']?></td>
                <td><?php echo $row['home_address']?></td>
                <td><?php echo $row['experienceInMonths']?></td>
                <td><?php echo $row['date_applied']?></td>
                <td><?php echo $row['last_updated']?></td>
                <td>
                    <input type="submit" value="EDIT" onclick="window.location.href='editApplication.php?application_id=<?php echo $row['application_id']; ?>';">
                    <input type="submit" value="DELETE" onclick="window.location.href='deleteApplication.php?application_id=<?php echo $row['application_id']; ?>';">
                </td>
            </tr>
            <?php }} ?>
        </table>
    </body>
</html>