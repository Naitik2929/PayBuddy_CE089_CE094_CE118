<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayBuddy</title>
    <link rel="stylesheet" href="/css/recent.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <span class="context">
        <h1>PayBuddy</h1>
    </span>
    <!-- <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table> -->
    <div class="table">
        <?php
        require 'config.php';
        session_start();
        $reg_id = $_SESSION['id'];
        $sql = "SELECT * FROM book WHERE id = $reg_id";
        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                echo '<table class="table table-striped">';
                echo "<thead>";
                echo "<tr>";
                echo '<th scope="col">Name</th>';
                echo '<th scope="col">Total in</th>';
                echo '<th scope="col">Total out</th>';
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['total_in'] . "</td>";
                    echo "<td>" . $row['total_out'] . "</td>";
                    // echo '<td class="temp">';
                    echo '<td>';
                    echo "<a href='recent_entry.php?id=" . $row['book_id'] . "'>View entries</a>";
                    echo "<a href='delete_book.php?id=" . $row['book_id'] . "'>Delete book</a>";
                    echo "&nbsp;";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                mysqli_free_result($result);
            } else {
                echo '<em>No records were found.</em>';
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
        mysqli_close($link);
        ?>

    </div>


    <form action="paybook.html" method="post" class="home_f">
        <input type="submit" value="Home" class="home">
    </form>
</body>

</html>