<?php 
include  'dbconnection.php';
$succMsg= NULL;
if(isset($_POST['submit'])){
$lezione = $_POST['lezione'];

$sql="INSERT INTO lezioni (lezione) VALUES(:lezione)";
//Prepara la query:
$query = $dbconnection -> prepare($sql);
//Associa i parametri
$query->bindParam(':lezione',$lezione,PDO::PARAM_STR);
//Esegui la query:
$query -> execute();

$lastInsertId = $dbconnection->lastInsertId();
//Controllo l'inserimento dei dati, messaggio e re-indirizzo
if($lastInsertId>0)
{
echo "<script>alert('Lezione inserito con successo');</script>";
echo "<script>window.location.href='lezioni_tab.php'</script>";
 }
else {

echo "Lezione non inserito con successo";

 }
}
?>