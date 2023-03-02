<?php 
include  'dbconnection.php';
$succMsg= NULL;
if(isset($_POST['submit'])){
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$idlezione = $_POST['idlezione'];

$sql="INSERT INTO allievi (nome, cognome, idlezione) VALUES(:nome,:cognome,:idlezione)";
//Prepara la query:
$query = $dbconnection -> prepare($sql);
//Associa i parametri
$query->bindParam(':nome',$nome,PDO::PARAM_STR);
$query->bindParam(':cognome',$cognome,PDO::PARAM_STR);
$query->bindParam(':idlezione',$idlezione,PDO::PARAM_STR);
//Esegui la query:
$query -> execute();

$lastInsertId = $dbconnection->lastInsertId();
//Controllo l'inserimento dei dati, messaggio e re-indirizzo
if($lastInsertId>0)
{
echo "<script>alert('Allievo inserito con successo');</script>";
echo "<script>window.location.href='allievi_tab.php'</script>";
 }
else {

echo "Allievo non inserito";
 }
}
?>