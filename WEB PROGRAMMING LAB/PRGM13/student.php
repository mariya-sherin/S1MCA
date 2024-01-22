<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Entry Form</title>
    <style>
        body {
            background-color: #F4CDD0;
            font-family: "Times New Roman", Times, serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            margin: 3rem auto;
            max-width: 600px;
        }

        .card {
            border: 1px black;
            border-radius: 8px;
            overflow: hidden;
        }

        .card-header {
            background-color: black;
            color: white;
            text-align: center;
            padding: 0.75rem;
        }

        .card-body {
            background-color: aliceblue;
            padding: 1rem;
        }

        form {
            margin: 0;
            padding: 0;
        }

        .form-label {
            font-weight: bold;
            display: block;
            margin-bottom: 0.5rem;
        }

        .form-control {
            width: 100%;
            padding: 0.375rem 0.75rem;
            margin-bottom: 1rem;
            border: 1px solid lightsteelblue;
            border-radius: 0.25rem;
        }

        .footer {
            text-align: center;
            margin-top: 1rem;
        }

        .btn {
            display: inline-block;
            font-weight: bold;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
        }

        .btn-success {
            color: #fff;
            background-color: green;
            border-color: green;
        }

        .btn-danger {
            color: #fff;
            background-color: red;
            border-color: red;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th, td {
            border: 1px solid black;
            padding: 0.75rem;
        }

        th {
            background-color: purple;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <h5 class="card-header">STUDENT ENTRY FORM</h5>
            <div class="card-body">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div>
                        <label class="form-label">Enter names of students (comma-separated)</label>
                        <input type="text" class="form-control" name="names" required>
                    </div>
                    <div class="footer">
                        <button type="submit" name="Submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-danger">Clear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Submit'])) {
        $names = $_POST['names'];
        $nameslist = explode(",", $names);
    ?>
        <div class='container'>
            <table>
                <tr>
                    <th colspan='2'>STUDENTS LIST</th>
                </tr>
                <tr>
                    <td>Original Array</td>
                    <td><?php print_r($nameslist); ?></td>
                </tr>
                <tr>
                    <td>Array - Asort()</td>
                    <td><?php asort($nameslist);
                        print_r($nameslist); ?></td>
                </tr>
                <tr>
                    <td>Array - Arsort()</td>
                    <td><?php arsort($nameslist);
                        print_r($nameslist); ?></td>
                </tr>
            </table>
        </div>
    <?php
    }
    ?>
</body>

</html>
