<?php

$servername = "127.0.0.1:3308";
$username = "root";
$password = "";
$dbname = "student_registration";

$conn = mysqli_connect($servername, $username, $password, $dbname);
//To remove warning from web page
error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Student Registration form</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="jsfile.js">
    </script>
</head>

<body>
    <div class="navbar" id="nav">
        <button type="button" onclick=fun();>
            Student Registration form
        </button>
        <button type="button" onclick=fun2();>
            Student Records
        </button>
    </div>

    <div id="demo">
        <form id="myform">
            <table>
                <h3>Sign Up</h3>
                <tr>
                    <th>Roll No</th>
                    <td><input type="number" name="rollno" placeholder="Roll No" required></td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="name" placeholder="Name" required></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td><input type="radio" name="gd" value="male" checked>Male
                        <input type="radio" name="gd" value="female" required>Female</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="email" name="gmail" placeholder="Email" required></td>
                </tr>

                <tr>
                    <th>Department</th>
                    <td><select name="dept">
                            <option>Select department</option>
                            <option>IT</option>
                            <option>Computer</option>
                            <option>ENTC</option>
                            <option>Civil</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <th>Password</th>
                    <td><input type="password" name="password" placeholder="password" required></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Register"></td>
                </tr>
            </table>
        </form>
    </div>


    <?php
    $Srn = $_GET['rollno'];
    $Sname = $_GET['name'];
    $Sgnd = $_GET['gd'];
    $Sgm = $_GET['gmail'];
    $Sdept = $_GET['dept'];
    $pwd = $_GET['password'];

    //echo "$lgstr<br>";

    $query = "INSERT INTO signup VALUES('$Srn', '$Sname', '$Sgnd', '$Sgm', '$Sdept', '$pwd' )";

    $putdata = mysqli_query($conn, $query);

    if ($putdata) {
        // echo "Data inserted into database";
    } else {
        echo "Failed to insert Data into database";
    }
    ?>
    <div id="demo3">
        <?php
        $query2 = "SELECT * FROM signup";
        $getdata = mysqli_query($conn, $query2);
        ?>
        <h3 align="center">Displaying Student Records</h3>
        <table border="3" cellspacing="7">
            <tr>
                <th width="10%">Roll no</th>
                <th width="15%">Name</th>
                <th width="10%">Gender</th>
                <th width="15%">Gmail</th>
                <th width="10%">Department</th>
                <th width="15%">Password</th>
            </tr>';
            <?php
            while ($row = mysqli_fetch_array($getdata, MYSQLI_ASSOC)) {
                echo "<tr><td>";
                echo $row['rollno'];
                echo "</td><td>";
                echo $row['name'];
                echo "</td><td>";
                echo $row['gender'];
                echo "</td><td>";
                echo $row['gmail'];
                echo "</td><td>";
                echo $row['dept'];
                echo "</td><td>";
                echo $row['pwd'];
                echo "</td></tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>