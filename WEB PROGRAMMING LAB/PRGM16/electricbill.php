<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity Bill</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .calculator {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
            transition: transform 0.3s ease-in-out;
            border: 2px solid #e6e6e6;
        }

        .calculator:hover {
            transform: scale(1.02);
        }

        input {
            padding: 15px;
            margin: 15px 0;
            width: 80%;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 8px;
            transition: border-color 0.3s ease-in-out;
            font-size: 16px;
            outline: none;
        }

        input:focus {
            border-color: #4caf50;
        }

        button {
            background-color: #3498db;
            color: white;
            padding: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            font-size: 18px;
        }

        button:hover {
            background-color: #2980b9;
        }

        h2, h3 {
            color: #333;
            font-weight: bold;
        }

        p {
            font-size: 18px;
            color: #555;
            margin-top: 20px;
        }

        .result {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h2>Electricity Bill Calculator</h2>

        <?php
        function calculateElectricityBill($units, $tariffRate) {
            return $units * $tariffRate;
        }
        $unitsConsumed = 0;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $unitsConsumed = isset($_POST["usage"]) ? (float)$_POST["usage"] : 0;

            $tariffRate = 3.30;
            $electricityBill = calculateElectricityBill($unitsConsumed, $tariffRate);

            echo "<div class='result'>";
            echo "<h3>Calculation Summary</h3>";
            echo "<p>Total kWh Consumed: {$unitsConsumed}</p>";
            echo "<p>Electricity Bill: ₹ " . number_format($electricityBill, 2) . "</p>";
            echo "</div>";
        }
        ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            Enter the total kWh consumed (e.g., 350):
            <input type="text" name="usage" value="<?php echo $unitsConsumed; ?>">
            <br>
            <button type="submit">Calculate</button>
        </form>
    </div>
</body>
</html>
