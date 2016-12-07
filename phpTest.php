<html>
	<head>
		<title>PHP Test</title>
	</head>
	<body>
		<h1>Hello World</h1>
		<form action="action_page.php">
		  <div class="imgcontainer">
			<img src="img_avatar2.png" alt="Avatar" class="avatar">
		  </div>

		  <div class="container">
			<label><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="uname" required>

			<label><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="psw" required>

			<button type="submit">Login</button>
			<input type="checkbox" checked="checked"> Remember me
		  </div>

		  <div class="container" style="background-color:#f1f1f1">
			<button type="button" class="cancelbtn">Cancel</button>
			<span class="psw">Forgot <a href="#">password?</a></span>
		  </div>
		</form>
		
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "fryken332";
			$dbname = "test";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			echo "Connected successfully";
			
			$sql = "INSERT INTO user(Username,Password)
			VALUES (uname,psw)";
			
			if ($conn->query($sql) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			
			$sql = "SELECT Age,Username,Password FROM user";
			$result = $conn->query($sql);
					
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "Age " . $row["Age"]. " - User: " . $row["Username"]. " " . $row["Password"]. "<br>";
				}
			} else {
				echo "0 results";
			}
			?>
	</body>
</html>