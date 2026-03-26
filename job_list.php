<?php include("includes/navbar.php"); ?>
<?php
include("config.php");

//$sql = "SELECT * FROM jobs";
if(isset($_GET['search']))
{
    $keyword = $_GET['keyword'];
    $sql = "SELECT * FROM jobs WHERE title LIKE '%$keyword%'";
}
else
{
    $sql = "SELECT * FROM jobs";
}
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Available Jobs</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<h2 class="text-center mb-4">Available Part-Time Jobs</h2>
<form method="get" class="mb-4 text-center">
    <input type="text" name="keyword" placeholder="Search job title"
           class="form-control w-50 d-inline">

    <button type="submit" name="search" class="btn btn-primary">
        Search
    </button>
</form>

<div class="row">

<?php
if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
?>
        <div class="col-md-4">
            <div class="card mb-4 shadow">

                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['title']; ?></h5>

                    <p class="card-text"><?php echo $row['description']; ?></p>

                    <p><b>Location:</b> <?php echo $row['location']; ?></p>
                    <p><b>Salary:</b> <?php echo $row['salary']; ?></p>

                    <a href="apply.php?job_id=<?php echo $row['id']; ?>" 
                       class="btn btn-primary">Apply Now</a>
                </div>

            </div>
        </div>
<?php
    }
}
else
{
    echo "<p>No jobs available</p>";
}
?>

</div>

</div>

</body>
</html>