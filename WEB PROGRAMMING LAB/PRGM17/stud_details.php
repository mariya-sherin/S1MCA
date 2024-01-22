<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Data</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background-color: #013ca6;
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        h1 {
            margin: 0;
            font-size: 28px;
        }

        form {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .btn-success {
            background-color: #56a0d3;
            color: #fff;
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 18px;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #ce1126;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <h1>Student Data Management System</h1>
    </header>

    <form method="post">
        <input type="submit" class="btn-success" value="Open" name="Submit">
    </form>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "mca2023");

    if (isset($_REQUEST["Submit"])) {
        $query = "SELECT * FROM student ORDER BY year DESC";
        $run = mysqli_query($conn, $query);

        echo "<table>
                <tr>
                    <th>Roll No</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Course</th>
                    <th>Year</th>
                </tr>";

        while ($row = mysqli_fetch_array($run)) {
            echo "<tr>
                    <td>".$row['roll_no']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['age']."</td>
                    <td>".$row['course']."</td>
                    <td>".$row['year']."</td>
                </tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>
