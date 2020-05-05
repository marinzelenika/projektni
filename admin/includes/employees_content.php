<html>
<head>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
</head>


<body>
<div class="container">


    <div id="search_area">
        <input type="text" name="search" id="search" class="form-control input-lg" autocomplete="off" placeholder="Type Employee Name" />
    </div>

    <div id="output"></div>

<?php
include ('database.php');
include ('employees.php');

$result_set = Employer::find_all_employees();

    ?>

    <table class="table table-striped" id="example" name="prva">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Gender</th>
    </tr>
    </thead>
    <tbody>
    <?php  while ($row = mysqli_fetch_array($result_set)){  ?>
    <tr>

        <th scope="row"><?php echo $row['emp_no'];   ?></th>
        <td><?php echo $row['first_name'];   ?> </td>
        <td><?php echo $row['last_name'];   ?></td>
        <td><?php echo $row['gender'];   ?></td>
        <td><button class="btn btn-info mr-2">Read</button><button class="btn btn-danger mr-2">Delete</button><button class="btn btn-warning mr-2">Edit</button></td>

    </tr>
        <?php
    }
    ?>
    </tbody>
</table>






</div>
</body>
</html>

<script>

    $(document).ready(function(){
        $("#search").keyup(function(){
            var query = $(this).val();
            if (query != "") {
                $.ajax({
                    url: 'livesearch.php',
                    method: 'POST',
                    data: {query:query},
                    success: function(data){

                        $('#output').html(data);
                        $('#output').css('display', 'block');

                        $("#search").focusout(function(){
                            $('#output').css('display', 'none');
                        });
                        $("#search").focusin(function(){
                            $('#output').css('display', 'block');
                        });
                    }
                });
            } else {
                $('#output').css('display', 'none');
            }
        });
    });

</script>

