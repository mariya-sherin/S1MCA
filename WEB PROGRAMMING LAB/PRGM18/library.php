<!DOCTYPE html>
<html lang="en">
<head>
    <title>Book Information Management</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        h1 {
            margin: 0;
            font-size: 28px;
        }

        form {
            width: 60%;
            margin: 20px auto;
        }

        input, button {
            padding: 10px;
            margin: 10px 0;
            width: 100%;
            box-sizing: border-box;
            font-size: 16px;
        }

        button {
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        table {
            width: 80%;
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
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <h1>Book Information Management</h1>
    </header>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "mca2023");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["submit"])) {
            $book_no = mysqli_real_escape_string($conn, $_POST["book_no"]);
            $title = mysqli_real_escape_string($conn, $_POST["title"]);
            $authors = mysqli_real_escape_string($conn, $_POST["authors"]);
            $edition = mysqli_real_escape_string($conn, $_POST["edition"]);
            $publisher = mysqli_real_escape_string($conn, $_POST["publisher"]);

            $insertQuery = "INSERT INTO books (Book_no, Title, Authors, Edition, Publisher) 
                            VALUES ('$book_no', '$title', '$authors', '$edition', '$publisher')";

            if (mysqli_query($conn, $insertQuery)) {
                echo "<p style='color: green; text-align: center;'>Book information added successfully!</p>";
            } else {
                echo "<p style='color: red; text-align: center;'>Error: " . mysqli_error($conn) . "</p>";
            }
        }

        if (isset($_POST["search"])) {
            $searchTitle = mysqli_real_escape_string($conn, $_POST["searchTitle"]);
            $searchQuery = "SELECT * FROM books WHERE Title LIKE '%$searchTitle%'";

            $searchResult = mysqli_query($conn, $searchQuery);

            if (mysqli_num_rows($searchResult) > 0) {
                echo "<table>
                        <tr>
                            <th>Book Number</th>
                            <th>Title</th>
                            <th>Authors</th>
                            <th>Edition</th>
                            <th>Publisher</th>
                        </tr>";

                while ($row = mysqli_fetch_assoc($searchResult)) {
                    echo "<tr>
                            <td>{$row['book_no']}</td>
                            <td>{$row['title']}</td>
                            <td>{$row['authors']}</td>
                            <td>{$row['edition']}</td>
                            <td>{$row['publisher']}</td>
                        </tr>";
                }

                echo "</table>";
            } else {
                echo "<p style='text-align: center;'>No matching books found.</p>";
            }
        }
    }

    mysqli_close($conn);
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h2>Add Book Information</h2>
        <input type="text" name="book_no" placeholder="Book_no" required>
        <input type="text" name="title" placeholder="Title" required>
        <input type="text" name="authors" placeholder="Authors" required>
        <input type="text" name="edition" placeholder="Edition" required>
        <input type="text" name="publisher" placeholder="Publisher" required>
        <button type="submit" name="submit">Add Book</button>

        <h2>Search for a Book</h2>
        <input type="text" name="searchTitle" placeholder="Enter Title">
        <button type="submit" name="search">Search</button>
    </form>
</body>
</html>