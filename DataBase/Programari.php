
<?php include("head.php"); 
if($_GET){
	if(isset($_GET['delete_id'])){
		$id=$_GET['delete_id'];
		$query="DELETE FROM programari WHERE ProgramareID=".$id."";
		$connection->query($query);
	}

	}


if(isset($_POST['adaug'])){
	if(isset($_POST['data'])){
		$data=$_POST['data'];
		$sid=$_POST['sid'];
		$aid=$_POST['cid'];
		$query="INSERT INTO programari (Data,ServiceID,ClientID) VALUES ('".$data."','".$sid."','".$aid."')";
		$connection->query($query);
		
		
	}
	
}


?>

<form action="Programari.php" method="post">
Client:<select name="cid">
<?php    
$query="SELECT Nume,Prenume,ClientID FROM clienti";
$result=$connection->query($query);
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		$output="<option value='".$row['ClientID']."'>";
		$output.=$row['Nume']." ".$row['Prenume'];
		$output.="</option>";
		echo($output);
	}
}?>
</select>
Serviciu:<select name="sid">
<?php    
$query="SELECT ServiceID,Denumire FROM servicii";
$result=$connection->query($query);
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		$output="<option value='".$row['ServiceID']."'>";
		$output.=$row['Denumire'];
		$output.="</option>";
		echo($output);
	}
}

?>
</select>
<input type="date" name="data" >
<input type="submit"  name="adaug" value="+"/>
</form>

<br />
<table border="0">
<tr>
<th>Nume</th>
<th>Serviciu</th>
<th>Data</th>
<th>Delete</th>
</tr>
<?php
$query="SELECT
  a.Denumire,b.Nume,b.Prenume,ba.ProgramareID,ba.Data
FROM
  servicii a
  JOIN programari ba ON a.ServiceID = ba.ServiceID
  JOIN clienti b ON b.ClientID = ba.ClientID";
$result=$connection->query($query);
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		$output="<tr><td>";
		$output.=$row['Nume']." ".$row['Prenume'];
		$output.="</td><td>";
		$output.=$row['Denumire'];
		$output.="</td><td>";
		$output.=$row['Data'];
		$output.="</td><td>";
		$output.="<button><a href='Programari.php?delete_id=".$row['ProgramareID']."'>X</a></button>";
		$output.="</td></tr>";
		echo($output);
	}
}

?>
</table>
<br>



<?php include("footer.php"); ?>