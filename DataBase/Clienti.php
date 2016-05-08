
<?php include("head.php"); 
if($_GET){
	if(isset($_GET['delete_id'])){
		$id=$_GET['delete_id'];
		$query="DELETE FROM clienti WHERE ClientID=".$id."";
		$connection->query($query);
		$query="DELETE FROM programari WHERE ClientID=".$id."";
		$connection->query($query);
	}

	}


if(isset($_POST['adaug'])){
	if($_POST['nume']!=""&&$_POST['prenume']!=""){
		$nume=$_POST['nume'];
		$prenume=$_POST['prenume'];
		$query="INSERT INTO clienti (Nume,Prenume) VALUES ('".$nume."','".$prenume."')";
	
		$connection->query($query);
		}
		
	
}
	if(isset($_POST['edit'])){
	if($_POST['nume']!=""&&$_POST['prenume']!=""){
		$nume=$_POST['nume'];
		$prenume=$_POST['prenume'];
		$aid=$_POST['aid'];
		$query="UPDATE clienti SET Nume='".$nume."',Prenume='".$prenume."' WHERE ClientID=".$aid."";
		$connection->query($query);
	}
	}


?>

<form action="Clienti.php" method="post">
Nume:<input type="text" name="nume"/>
Prenume:<input type="text"  name="prenume" />
<input type="submit"  name="adaug" value="+"/>
</form>

<form action="Clienti.php" method="post">

Client:<select name="aid">
<?php    
$query="SELECT ClientID,Nume,Prenume FROM clienti";
$result=$connection->query($query);
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		$output="<option value='".$row['ClientID']."'>";
		$output.=$row['Nume']." ".$row['Prenume'];
		$output.="</option>";
		echo($output);
	}
}

?>
</select>
Nume:<input type="text" name="nume"/>
Prenume:<input type="text"  name="prenume"/>
<input type="submit"  name="edit" value="Edit"/>
</form>

<br />
<table border="0">
<tr>
<th>Nume</th>
<th>Nr. Comenzi</th>
<th>Delete</th>
</tr>
<?php
$query="SELECT Nume,Prenume,ClientID FROM clienti";
$result=$connection->query($query);
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		$output="<tr><td>";
		$output.=$row['Nume']." ".$row['Prenume'];
		$output.="</td><td>";
		$query="SELECT COUNT(*) AS cnt FROM programari WHERE ClientID=".$row['ClientID']."";
		$result1=$connection->query($query);
		$row1=$result1->fetch_assoc();
		$output.=$row1['cnt'];
		$output.="</td><td>";
		$output.="<button><a href='Clienti.php?delete_id=".$row['ClientID']."'>X</a></button>";
		$output.="</td></tr>";
		echo($output);
	}
}

?>
</table>
<br>



<?php include("footer.php"); ?>