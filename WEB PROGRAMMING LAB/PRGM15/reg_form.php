<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <style>
        body {
            font-family: "Trebuchet MS", Tahoma, sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background-color: #f5d3b3;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 700px; 
            max-width: 100%;
            text-align: center;
            color: #495057;
        }

        .card-header {
            padding: 20px;
            font-size: 1.8em;
            background: linear-gradient(to right, #262935, #b30938); 
            color: #fff;
        }

        form {
            text-align: center;
            margin-top: 20px; 
            margin-left: 20px;
            margin-right: 15px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        label {
            display: block;
            margin-bottom: 8px;
            text-align: left;
            font-weight: bold;
            color: #333;
            width: 48%; 
        }

        input {
            width: 48%; 
            padding: 12px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 6px;
        }

        button.submit-button {
            background-color: black;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            margin-top: 16px; 
            margin-bottom: 5px;
        }

    </style>
</head>
<body>

<?php
$conn = mysqli_connect("localhost", "root", "", "sample"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $rollno = $_POST["rollno"];
    $dept = $_POST["dept"];
    $sem = $_POST["sem"];
    $phno = $_POST["phno"];
    $email = $_POST["email"];

    if (empty($name) || empty($rollno) || empty($dept) || empty($sem) || empty($phno) || empty($email)) {
        echo "All fields are required.";
    } else {
        $query = "INSERT INTO student VALUES ('$name', '$rollno', '$dept', '$sem', '$phno', '$email')";
        $run = mysqli_query($conn, $query);

        if ($run) {
            echo "Successfully Inserted";
        } else {
            echo "Failed to Insert";
        }
    }
}
?>

<div class="card">
    <div class="card-header">Student Registration Form</div>
    <form onsubmit="return validate();" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        
        <label for="rollno">Roll No</label>
        <input type="text" name="rollno" id="rollno">
        
        <label for="dept">Department</label>
        <input type="text" name="dept" id="dept">
        
        <label for="sem">Semester</label>
        <input type="number" name="sem" id="sem">
        
        <label for="phno">Mobile No</label>
        <input type="text" name="phno" id="phno">
        
        <label for="email">Email</label>
        <input type="text" name="email" id="email">

        <button type="submit" class="submit-button">Submit</button>

    </form>
</div>

<script>
    function validate() {
        let name = document.getElementById('name').value;
        let rno = document.getElementById('rollno').value;
        let phno = document.getElementById('phno').value;
        let sem = document.getElementById('sem').value;
        let email = document.getElementById('email').value;

        if (name === "") {
            alert("Name shouldn't be empty");
            return false;
        } else if (rno === "") {
            alert("Roll shouldn't be empty");
            return false;
        } else if (phno.length !== 10) {
            alert("Phone No should be 10 digits");
            return false;
        } else if (!email.includes("@")) {
            alert("Not a valid email id");
            return false;
        }
    }
</script>

<?php
if (isset($_REQUEST['search'])) {
    $rollno = $_REQUEST['rollno'];
    $query = "SELECT * FROM student WHERE Roll_No = $rollno";
    $run = mysqli_query($conn, $query);

    $row = mysqli_fetch_array($run);

    echo "Name : " . $row['Name'] . "<br><br>";
    echo "Roll No : " . $row['Roll_No'] . "<br><br>";
    echo "Department : " . $row['Department'] . "<br><br>";
    echo "Semester : " . $row['Semester'] . "<br><br>";
    echo "Phone No : " . $row['Phone_No'] . "<br><br>";
    echo "Email : " . $row['Email'] . "<br><br>";
}
?>

</body>
</html>