
<?php include("head.php"); 
	$output="";
	if(isset($_POST['select'])){
	$a=$_POST['tip'];
	
	switch($a){
			case 1:
				$output="<table border='0'>
				<tr>
				<th>Denumire</th>
				<th>Reducere</th>
				</tr>";

				$query="SELECT a.Denumire,b.Valoare FROM servicii a INNER JOIN reduceri b ON a.ServiceID=b.ServiceID";
				$result=$connection->query($query);
				if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					$output.="<tr><td>";
					$output.=$row['Denumire'];
					$output.="</td><td>";
					$output.=$row['Valoare'];
					$output.="%</td></tr>";
				}
				}


				$output.="</table>";

			
				break;
			
			
			case 2:
				$output="<table border='0'>
				<tr>
				<th>Nume</th>
				<th>Prenume</th>
				</tr>";

				$query="SELECT DISTINCT a.Nume,a.Prenume FROM clienti a INNER JOIN programari b ON a.ClientID=b.ClientID";
				$result=$connection->query($query);
				if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					$output.="<tr><td>";
					$output.=$row['Nume'];
					$output.="</td><td>";
					$output.=$row['Prenume'];
					$output.="</td></tr>";
				}
				}


				$output.="</table>";
			
				break;
				
				
				case 3:
	
				$query="SELECT COUNT(*) AS cnt FROM programari";
				$result=$connection->query($query);
				if($result->num_rows>0){
					$row=$result->fetch_assoc();
					$output="Total programari:".$row['cnt'];
				}
			
				break;
				
				
				
				case 4:
			
				$output="<table border='0'>
				<tr>
				<th>Data</th>
				<th>Count</th>
				</tr>";

				$query="SELECT Data,COUNT(*) AS cnt FROM programari GROUP BY Data";
				$result=$connection->query($query);
				if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					$output.="<tr><td>";
					$output.=$row['Data'];
					$output.="</td><td>";
					$output.=$row['cnt'];
					$output.="</td></tr>";
				}
				}


				$output.="</table>";
				
				
			
				break;
				
				
				case 5:
			
					$output="<table border='0'>
				<tr>
				<th>Denumire</th>
				<th>Pret</th>
				</tr>";

				$query="SELECT a.Denumire,a.Pret,COUNT(*) AS cnt FROM servicii a 
				INNER JOIN programari b ON a.ServiceID=b.ServiceID GROUP BY b.ServiceID ORDER BY cnt DESC LIMIT 3";
				$result=$connection->query($query);
				if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					$output.="<tr><td>";
					$output.=$row['Denumire'];
					$output.="</td><td>";
					$output.=$row['Pret'];
					$output.="</td></tr>";
				}
				}


				$output.="</table>";
			
				break;
				
				
				
				case 6:
				$output="<table border='0'>
				<tr>
				<th>Nume</th>
				<th>Prenume</th>
				</tr>";

				$query="SELECT Nume,Prenume FROM angajati ORDER BY AngajatID LIMIT 3";
				$result=$connection->query($query);
				if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					$output.="<tr><td>";
					$output.=$row['Nume'];
					$output.="</td><td>";
					$output.=$row['Prenume'];
					$output.="</td></tr>";
				}
				}


				$output.="</table>";
			
				break;
				
				
				
				case 7:
					$output="<table border='0'>
				<tr>
				<th>Denumire</th>
				<th>Reducere</th>
				</tr>";

				$query="SELECT a.Denumire,b.Valoare FROM servicii a INNER JOIN reduceri b ON a.ServiceID=b.ServiceID WHERE b.Valoare>=10";
				$result=$connection->query($query);
				if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					$output.="<tr><td>";
					$output.=$row['Denumire'];
					$output.="</td><td>";
					$output.=$row['Valoare'];
					$output.="%</td></tr>";
				}
				}


				$output.="</table>";
			
				break;
				
				
				
				case 8:
					$output="<table border='0'>
				<tr>
				<th>Nume</th>
				<th>Prenume</th>
				</tr>";

				$query="SELECT Nume,Prenume FROM angajati WHERE Nume LIKE 'R%' OR Prenume LIKE 'R%'";
				$result=$connection->query($query);
				if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					$output.="<tr><td>";
					$output.=$row['Nume'];
					$output.="</td><td>";
					$output.=$row['Prenume'];
					$output.="</td></tr>";
				}
				}


				$output.="</table>";
			
				break;
				
				
				
				case 9:
				$output="<table border='0'>
				<tr>
				<th>Denumire</th>
				<th>Pret</th>
				</tr>";

				$query="SELECT Denumire,Pret FROM servicii WHERE Pret>=20";
				$result=$connection->query($query);
				if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					$output.="<tr><td>";
					$output.=$row['Denumire'];
					$output.="</td><td>";
					$output.=$row['Pret'];
					$output.="</td></tr>";
				}
				}


				$output.="</table>";
			
				break;
				case 10:
					$output="<table border='0'>
				<tr>
				<th>Nume</th>
				<th>Prenume</th>
				</tr>";

				$query="SELECT a.Nume,a.Prenume,COUNT(*) AS cnt FROM clienti a 
				INNER JOIN programari b ON a.ClientID=b.ClientID GROUP BY b.ClientID HAVING cnt>=3";
				$result=$connection->query($query);
				if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					$output.="<tr><td>";
					$output.=$row['Nume'];
					$output.="</td><td>";
					$output.=$row['Prenume'];
					$output.="</td></tr>";
				}
				}


				$output.="</table>";
			
			
				break;
		
	}
	
	
	}


?>

Query:<form action="Querys.php" method="post">
<select name="tip">
<option value='1'>Reduceri</option>
<option value='2'>Clienti cu comenzi</option>
<option value='3'>Total programari</option>
<option value='4'>Zi:Numar Programari</option>
<option value='5'>Servicii top 3</option>
<option value='6'>Primii 3 angajati</option>
<option value='7'>Servicii cu reducere >10%</option>
<option value='8'>Angajati cu initiala R</option>
<option value='9'>Servicii cu pret >20$</option>
<option value='10'>Clienti cu nr. comenzi >3</option>

</select>
<input type="submit" name="select" value="->"/>
</form>

<?php echo($output."<br/>");?>
<?php include("footer.php"); ?>