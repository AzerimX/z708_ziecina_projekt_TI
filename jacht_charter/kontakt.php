<!DOCTYPE html>
<html lang="pl-PL">
<head>
	<meta charset="UTF-8">
	<title>Charter jachtów 0 strona główna</title>
</head>
<body>
	<link rel="stylesheet" href="style.css">
	
	
	<div class="topnav">
		<div id="logo_top" > <a id="logo_top_2" href="index.php"><img src="logo.png" height = 40></a> </div>
		<a class "link_menu" href="jachty_srodladowe.php">NASZE JACHTY</a>
		<a href="kontakt.php">KONTAKT</a>
		<div>TEL: 513 829 915</div>
	</div>

	<div class="content">
		<h2>Kontakt</h2>
		<p>Przystań Kokodrilo, 11-730 Jora Wielka</p>
		<p>Obsługa klientów: 7 dni w tygodniu - 7:00-21:00</p>
		<p>Tel: 513 829 915</p>
		<p>Email: kontakt@przystan_koko.pl</p>
		<h2>Rezerwacja jachtów</h2>
	
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "charter_db";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error)
		{
			echo("Problem z łącznością z bazą danych");
			die("Connection failed: " . $conn->connect_error);
		}
		else
		{
			//echo("connected!");
		}
		?>
		
		
		<form action="kontakt.php" method="post">
		  <label for="chosen_jacht"><h4>Wybierz jacht:</h4></label>
		  <select id="chosen_jacht" name="chosen_jacht" required>
			<?php
			$jachts_query = "SELECT `yacht_model`, `id_yacht` FROM `yacht` WHERE 1;";
			$jachts_result = mysqli_query($conn, $jachts_query);
			while($row = mysqli_fetch_assoc($jachts_result))
			{
				echo('<option value="' . $row['yacht_model'] . '">' . $row['yacht_model'] . '</option>');
			}
		?>
		  </select><br><br>
		  <input type="submit" name="submit_button" value="Sprawdź dostępność"><br><br>
		
		<?php
			if( isset($_POST['chosen_jacht']))
			{
				$jacht = $_POST["chosen_jacht"];
				echo('Wybrano: ' . $jacht . '<br>');
				
				$price_query = "SELECT `price_per_24h_in_pln` FROM `yacht` WHERE `yacht_model` like '" . $jacht . "';";
				//echo($price_query);
				$price_result = mysqli_query($conn, $price_query);
				while($row = mysqli_fetch_assoc($price_result))
				{
					echo('Cena za 24 godziny to: ' . $row['price_per_24h_in_pln'] . 'zł<br>');
				}
				echo('Jacht jest zarezerwowany w następujących terminach:<ul>');
				$reservation_query = "SELECT `id_reservation`, `reservation_start`, `reservation_end`, reservation.`id_yacht`, `phone_number`, `name`, `surname` FROM `reservation` JOIN `yacht` ON `yacht`.id_yacht = `reservation`.id_yacht 
				WHERE yacht_model LIKE '" . $jacht . '\' AND reservation_end >= CURRENT_DATE();';
				//echo($reservation_query);
				//$jacht_id = "0";
				$reservation_result = mysqli_query($conn, $reservation_query);
				while($row = mysqli_fetch_assoc($reservation_result))
				{
					echo("<li>Od " . $row['reservation_start'] . " do " . $row['reservation_end'] . ". Imię rezerwującego: " . $row['name']) . "</li>";
					//$jacht_id = $row['id_yacht'];
				}
				echo('</ul>');
				
				$second_part_form = '
				<h4>Dane do twojej rezerwzacji:</h4>
				<label for="id_name">Imię:</label><br>
				<input type="text" id="id_name" name="first_name" ><br>
				<label for="id_phone">Numer telefonu:</label><br>
				<input type="text" id="id_phone" name="phone" ><br><br>
				<label for="id_first_day">Pierwszy dzień rezerwacji:</label><br>
				<input type="date" id="id_first_day" name="first_day" ><br>
				<label for="id_last_day">Dzień zwrotu:</label><br>
				<input type="date" id="id_last_day" name="last_day" ><br><br>
				<input type="submit" name="submit_button" value="Zarezerwuj"><br>
				';
				echo($second_part_form);
				if( isset($_POST['first_name']) && isset($_POST['phone']) && isset($_POST['first_day']) && isset($_POST['last_day']))
				{
					$id_2_query = "SELECT `id_yacht`, `yacht_model`, `price_per_24h_in_pln` FROM `yacht` WHERE `yacht_model` LIKE '" . $jacht ."';";
					//echo($id_2_query);
					$id_2_result = mysqli_query($conn, $id_2_query);
					$jacht_id = "0";
					$price_24h = 1000;
					while($row = mysqli_fetch_assoc($id_2_result))
					{
						$jacht_id = $row['id_yacht'];
						$price_24h = $row['price_per_24h_in_pln'];
					}
					
					$first_name = $_POST["first_name"];
					$phone = $_POST["phone"];
					$reservation_start = $_POST["first_day"];
					$reservation_end = $_POST["last_day"];
					//$jacht_id
					
					//TUTAJ DAĆ VERIFICATION
					$correct = True; //change to False by default
					if($reservation_start <= date("Y-m-d") OR $reservation_end <= date("Y-m-d"))
					{
						$correct = False;
						echo("<b>Data z przeszłości!</b><br>");
						//echo(date("Y-m-d")) . "<br>";
						//echo($reservation_start). "<br>";
						//echo($reservation_end) . "<br>";
					}
					if($reservation_end < $reservation_start)
					{
						$correct = False;
						echo("<b>Data zwrotu wcześniejsza niż data wypożyczenia!</b><br>");
					}
					if($reservation_end > "2099-12-31" or $reservation_start > "2099-12-31")
					{
						$correct = False;
						echo("<b>Data nie w tym stuleciu!</b><br>");
					}
					while($row = mysqli_fetch_assoc($reservation_result))
					{
						echo("<li>Od " . $row['reservation_start'] . " do " . $row['reservation_end'] . ". Imię rezerwującego: " . $row['name']) . "</li>";
						//$jacht_id = $row['id_yacht'];
					}
					//sprawdzić wszystkie terminy
					$reservation_query_2 = "SELECT `id_reservation`, `reservation_start`, `reservation_end`, reservation.`id_yacht`, `phone_number`, `name`, `surname` FROM `reservation` JOIN `yacht` ON `yacht`.id_yacht = `reservation`.id_yacht 
					WHERE yacht_model LIKE '" . $jacht . '\' AND reservation_end > CURRENT_DATE();';
					$reservation_result_2 = mysqli_query($conn, $reservation_query_2);
					while($row = mysqli_fetch_assoc($reservation_result_2))
					{
						if($row['reservation_end'] >= $reservation_start && $row['reservation_start'] <= $reservation_end)
						{
							$correct = False;
							echo("<li>Koliduje z rezerwacją od " . $row['reservation_start'] . " do " . $row['reservation_end'] . ". Imię rezerwującego: " . $row['name']) . "</li>"; //poprawić
						}
						
						//$jacht_id = $row['id_yacht'];
					}
					if($correct)
					{
						$sql_insert = "
						INSERT INTO `reservation`(`reservation_start`, `reservation_end`, `id_yacht`, `phone_number`, `name`, `surname`)
						VALUES ('" . $reservation_start . "','" . $reservation_end . "','" . $jacht_id . "','" . $phone . "','" . $first_name . "', \"\");";
						mysqli_query($conn, $sql_insert);
						echo("<b>Rezerwacja zatwierdzona!</b><br>");
						$date_diff = strtotime($reservation_end) - strtotime($reservation_start); 
						$price_calculated = round(($date_diff / (60 * 60 * 24)) + 1)* $price_24h;
						echo("Cena wynajmu: " . $price_calculated . " zł<br>");
						echo("Cena zaliczki: " . round($price_calculated * 0.3) . " zł");
					}
					
					//echo($sql_insert);
					
				}
			}
			
			
		?>
	

	
	</form>
	
	
	</div>

	<div class="footer">
	  <p>Copyright © 2021 Cezary Zięcina <br> Strona stworzona na przedmiot "Technologie Internetowe" </p>
	</div>
</body>
</html>