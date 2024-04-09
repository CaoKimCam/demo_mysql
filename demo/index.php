<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <h2 class="">List of Clients</h2>
        <a href="/demo/create.php" class="btn-primary btn" role="btn">New Client</a>

        <form method="post" style="margin-top:10px">
            <input type="text" placeholder="Search data" name="search">
            <button class="btn btn-dark btn-sm" name="submit">Search</button>
        </form>
        <br>

        <table>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $databasename = "demo";

            // Create connection
            $connection = new mysqli($servername, $username, $password, $databasename);

            // Check connection
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            if (isset($_POST['submit'])) {
                $search = $_POST['search'];

                $sql = "Select * from clients where id like '%$search%' or name like '%$search%' or email like '%$search%' or address like '%$search%'";
                $result = mysqli_query($connection, $sql);
                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        echo "
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "
                            <tbody>
                                <tr>
                                    <td>$row[id]</td>
                                    <td>$row[name]</td>
                                    <td>$row[email]</td>
                                    <td>$row[phone]</td>
                                    <td>$row[address]</td>
                                    <td>$row[created_at]</td>
                                    <td>
                                        <a href='/demo/edit.php?id=$row[id]' class='btn btn-primary btn-sm'>Edit</a>
                                        <a href='/demo/delete.php?id=$row[id]' class='btn btn-danger btn-sm'>Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                            ";
                        }
                    } else {
                        echo '<h2 class="text-danger">Data not found</h2>';
                    }
                }
            }
            ?>
        </table>
    </div>
</body>

</html>

<!-- // read all from database
                $sql = "SELECT * FROM clients";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[created_at]</td>
                    <td>
                        <a href='/demo/edit.php?id=$row[id]' class='btn btn-primary btn-sm'>Edit</a>
                        <a href='/demo/delete.php?id=$row[id]' class='btn btn-danger btn-sm'>Delete</a>
                    </td>
                    </tr>
                    ";
                } -->