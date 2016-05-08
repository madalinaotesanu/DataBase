<?php include("head.php"); 
if($_GET){
	if(isset($_GET['delete_id'])){
		$id=$_GET['delete_id'];
		$query="DELETE FROM servicii WHERE ServiceID=".$id."";
		$connection->query($query);
			$query="DELETE FROM raduceri WHERE ServiceID=".$id."";
		$connection->query($query);
			$query="DELETE FROM angserv WHERE ServiceID=".$id."";
		$connection->query($query);
			$query="DELETE FROM programari WHERE ServiceID=".$id."";
		$connection->query($query);
	}
		if(isset($_GET['delete_rid'])){
		$id=$_GET['delete_rid'];
		$query="DELETE FROM reduceri WHERE ReducereID=".$id."";
		$connection->query($query);
	}
}

if(isset($_POST['adaug'])){
	if($_POST['denumire']!=""&&$_POST['pret']!=0){
		$den=$_POST['denumire'];
		$pret=$_POST['pret'];
		$query="INSERT INTO servicii (Denumire,Pret) VALUES ('".$den."','".$pret."')";
		$connection->query($query);
	}
	
}
	if(isset($_POST['edit'])){
	if($_POST['denumire']!=""&&$_POST['pret']!=0){
		$den=$_POST['denumire'];
		$pret=$_POST['pret'];
		$id=$_POST['id'];
		$query="UPDATE servicii SET Denumire='".$den."',Pret='".$pret."' WHERE ServiceID=".$id."";
		$connection->query($query);
		
	}
	}
	
	if(isset($_POST['adaug2'])){
	if($_POST['val']!=0){
		$id=$_POST['id'];
		$val=$_POST['val'];
		$query="INSERT INTO reduceri (ServiceID,Valoare) VALUES ('".$id."','".$val."')";
		$connection->query($query);
	}
	
}
	if(isset($_POST['edit2'])){
	if($_POST['val']!=0){
		
		$id=$_POST['id'];
		$val=$_POST['val'];
		$query="UPDATE reduceri SET Valoare=".$val." WHERE ReducereID=".$id."";
		$connection->query($query);
	
		
	}
	
}

?>

<form action="Servicii.php" method="post">
Denumire:<input type="text" name="denumire"/>
Pret:<input type="number"  name="pret" value='0' min='0'/>
<input type="submit"  name="adaug" value="+"/>
</form>

<form action="Servicii.php" method="post">
Serviciu:<select name="id">
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
Denumire:<input type="text" name="denumire"/>
Pret:<input type="number"  name="pret" value='0' min='0'/>
<input type="submit"  name="edit" value="Edit"/>
</form>

<br />
<table border="0">
<tr>
<th>Denumire</th>
<th>Pret</th>
<th>Delete</th>
</tr>
<?php
$query="SELECT ServiceID,Denumire,Pret FROM servicii";
$result=$connection->query($query);
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		$output="<tr><td>";
		$output.=$row['Denumire'];
		$output.="</td><td>";
		$output.=$row['Pret'];
		$output.="$</td><td>";
		$output.="<button><a href='Servicii.php?delete_id=".$row['ServiceID']."'>X</a></button>";
		$output.="</td></tr>";
		echo($output);
	}
}

?>
</table>
<br>

<form action="Servicii.php" method="post">
Serviciu:<select name="id">
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
Reducere:<input type="number"  name="val" value='0' min='0'/>
<input type="submit"  name="adaug2" value="+"/>
</form>

<form action="Servicii.php" method="post">
Serviciu:<select name="id">
<?php    
$query="SELECT b.ReducereID,a.Denumire,b.Valoare FROM servicii a INNER JOIN reduceri b ON a.ServiceID=b.ServiceID";
$result=$connection->query($query);
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		$output="<option value='".$row['ReducereID']."'>";
		$output.=$row['Denumire'].":".$row['Valoare'];
		$output.="%</option>";
		echo($output);
	}
}

?>
</select>
Reducere:<input type="number"  name="val" value='0' min='0'/>
<input type="submit"  name="edit2" value="Edit"/>
</form>
<br>
<b>Reduceri:</b>
<table border="0">
<tr>
<th>Denumire</th>
<th>Reducere</th>
<th>Delete</th>
</tr>
<?php
$query="SELECT b.ReducereID,a.Denumire,b.Valoare FROM servicii a INNER JOIN reduceri b ON a.ServiceID=b.ServiceID";
$result=$connection->query($query);
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		$output="<tr><td>";
		$output.=$row['Denumire'];
		$output.="</td><td>";
		$output.=$row['Valoare'];
		$output.="%</td><td>";
		$output.="<button><a href='Servicii.php?delete_rid=".$row['ReducereID']."'>X</a></button>";
		$output.="</td></tr>";
		echo($output);
	}
}

?>
</table>






<?php include("footer.php"); ?>