<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indian Cricket Players</title>

    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            height: 100vh;
            margin: 0;
            background-color: #D1E8E2;
        }

        .container {
            position: absolute; 
            top: 5%;
            left: 50%;
            transform: translateX(-50%);
            width: 600px;
            background-color: #FBEAEB;
        }

        .card {
            border: 1px solid black;
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
            background-color: ;
            padding: 1rem;
        }

        form {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-label {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .form-control {
            width: 100%;
            padding: 0.375rem 0.75rem;
            margin-bottom: 10px;
            border: 1px solid lightsteelblue;
            border-radius: 0.25rem;
        }

        .btn-group {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .btn {
            margin: 0 5px;
            font-weight: bold;
            text-align: center;
            white-space: nowrap;
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
            margin-top: 20px;
            background-color: #CAF0F8;
        }

        th, td {
            border: 2px solid black;
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #2255a4;
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>

<?php
session_start();

if (!isset($_SESSION['player_names'])) {
    $_SESSION['player_names'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $playerName = isset($_POST['playerName']) ? trim($_POST['playerName']) : '';

    if (isset($_POST['action']) && $_POST['action'] === 'remove') {
        $removePlayer = trim($_POST['playerName']);

        $_SESSION['player_names'] = array_diff($_SESSION['player_names'], [$removePlayer]);
    } else {
        if (!empty($playerName)) {
            $_SESSION['player_names'][] = $playerName;
        }
    }
}

echo "<div class='container'>";
echo "<div class='card'>";
echo "<div class='card-header'>Indian Cricket Players</div>";
echo "<div class='card-body'>";
echo "<form method='post'>";
echo "<div class='form-group'>";
echo "<label for='playerName' class='form-label'>Input here:</label>";
echo "<input type='text' name='playerName' class='form-control'>";
echo "</div>";
echo "<div class='btn-group'>";
echo "<button type='submit' name='action' value='add' class='btn btn-success'>Add</button>";
echo "<button type='submit' class='btn btn-danger remove-button' name='action' value='remove'>Remove</button>";
echo "</div>";
echo "</form>";

if (!empty($_SESSION['player_names'])) {
    echo "<table>";
    echo "<tr><th>INDIAN CRICKET PLAYERS</th></tr>";
    foreach ($_SESSION['player_names'] as $player) {
        echo "<tr>";
        echo "<td>$player</td>";
        echo "</tr>";
    }
    echo "</table>";
}

echo "</div>";
echo "</div>";
echo "</div>";

?>

</body>

</html>
