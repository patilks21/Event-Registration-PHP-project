<?php session_start(); 
        if(isset($_POST["logout"])){
            session_unset();  
            session_destroy();
             header('location: index.html');
        }
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>
            
        </title>
    </head>
    <body>
    	<div class="form">
            <br><label>Hello, <?php echo $_SESSION["name"]; ?>.</label><br>
            <br><label style="font-size: 25px">Here are all the Events!</label><br>
            <table border="1" align="center"  >
                <tr>
                <th>EVENT NAME</th>
                <th>DATE</th>
				<th>ORGANISER</th>
				<th>ADDRESS</th>
				<th>CONTACT</th>
				<th>EMAIL</th>
                </tr>
            <?php
                $conn = new mysqli("localhost", "root", "mysql", "db");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 
                $sql = "SELECT * FROM eventdetails;";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row['ename']."</td>";
                        echo "<td>".$row['date']."</td>";
						echo "<td>".$row['oname']."</td>";
						echo "<td>".$row['address']."</td>";
						echo "<td>".$row['contact']."</td>";
						echo "<td>".$row['email']."</td>";
                        echo "</tr>";
                    }
                }
                $conn->close();
            ?>
            </table>
			<br><br>
			<p style="font-size: large;">Add new event? <a href="addevent.html">Click Here</a></p>
    </body>
</html>