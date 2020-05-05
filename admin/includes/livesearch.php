<html>
<head>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
</html>





<?php
$servername='localhost';
$username='root';
$password='';
$dbname = "employees";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if (isset($_POST['query'])) {

    $query = "SELECT * FROM employees WHERE first_name LIKE '{$_POST['query']}%' OR last_name LIKE '{$_POST['query']}%' LIMIT 100";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        ?>
<table class="table table-striped" id="example">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Gender</th>
    </tr>
    </thead>
    <tbody>
    <?php
        while ($user = mysqli_fetch_array($result)) { ?>
            <tr>

        <th scope="row"><?php echo $user['emp_no'];   ?></th>
    <td><?php echo $user['first_name'];   ?> </td>
    <td><?php echo $user['last_name'];   ?></td>
    <td><?php echo $user['gender'];   ?></td>

    </tr>
            <?php
            }
            ?>
    </tbody>
</table> <?php
        }
    } else {
        echo "<p style='color:red'>User not found...</p>";


}


?>