<!DOCTYPE html>
<html>
<head>
	<title>Filmovi</title>
</head>
<body>

		<form action="unos.php" method="POST" enctype="multipart/form-data">
		<table border = "1">
		<tr>
		<td>Naslov:</td>
		<td><input type="text" name="naslov" value="" /></td>
		</tr>
		<tr>
		<td>Žanr:</td>
		<td>
		<?php
		
		$conn = new mysqli('localhost', 'root', '', 'kolekcija');
		$result = $conn->query("SELECT id, naziv FROM zanr");
		
		echo "<select name = 'id'>";
		while($row = $result->fetch_assoc())
		{
			unset($id, $name);
			$id = $row['id'];
			$name = $row['naziv'];
			echo '<option value = "' . $id . '">'.$name.'</option>';
		}
		
		echo "</select>";
		
		?>
		</td>
		</tr>
		<tr>
		<td>Godina:</td>
		<td>
		<select name = "godina">
		<?php
		
		for($i = 1900; $i <= 2020; $i++)
		{
			echo "<option value = " .$i . ">" .$i . "</option>";
		}
		
		?>
		<option name = "godina"></option>
		</select>
		</td>
		</tr>
		<tr>
		<td>Trajanje:</td>
		<td><input type="integer" name="trajanje" value="" /></td>
		</tr>
		<tr>
		<td>Slika:</td>
		<td><input type="file" name="image" id = "image" accept = "image/JPEG" />
		<input type = "hidden" name = "size" value = "1000000000" /></td>
		</tr>
		<tr>
		<td>Gumb:</td>
		<td><input type="submit" name="submit" value="Unos" /></td>
		</tr>

			</table>
		</form>

</body>
</html>

<?php

mysql_connect("localhost", "root", "") or die (mysql_error());
mysql_select_db("kolekcija") or die ("Nemoguće se spojiti na bazu!".mysql_error());

if(isset($_POST['submit']))
{
	if(isset($_FILES['image']))
	{
		$naslov=$_POST['naslov'];
		$trajanje = $_POST['trajanje'];
		$zanr = $_POST['id'];
		$godina = $_POST['godina'];
		$fp=addslashes(file_get_contents($_FILES['image']['tmp_name'])); 
        }
                $sql = "INSERT INTO filmovi (id, naziv_filma, trajanje, slika, id_zanr, godina)
						VALUES('null', '{$naslov}', '{$trajanje}' ,'{$fp}', '{$zanr}', '{$godina}');";
                            mysql_query($sql) or die("Error in Query insert: " . mysql_error());
	}
			
	
	$msg = "";
	
	$sql = "SELECT id, slika, naziv_filma, godina, trajanje FROM filmovi";
	$myData = mysql_query($sql);
	echo "<table border = '1'>
	<tr>
	<th>Slika</th><th>Naziv filma</th><th>Godina</th><th>Trajanje</th><th>Akcija</th></tr>";
	while($record = mysql_fetch_array($myData))
		{
		echo "<form action = 'unos.php' method = 'post' enctype='multipart/form-data'>";
		echo "<tr>";
		echo "<td>" . $msg.= '<img src="data:image/jpeg;base64,'.base64_encode($record['slika']) .'"/>' . "</td>";
		echo "<td>" . $record['naziv_filma'] . "</td>";
		echo "<td>" . $record['godina'] . "</td>";
		echo "<td>" . $record['trajanje'] . "</td>";
		echo "<td><a href='unos.php?id='".$record['id']."'>{Obriši}</td>";
		
		
		echo "</tr>";
		echo "</form>";
		}
		
		print_r($_GET);
		

	echo "</table>";
	
?>