<?php 
include  'dbconnection.php';
$succMsg= NULL;
if(isset($_POST['submit'])){
$professore = $_POST['professore'];
$materia = $_POST['materia'];

$sql="INSERT INTO professori (professore, materia) VALUES(:professore,:materia)";
//Prepara la query:
$query = $dbconnection -> prepare($sql);
//Associa i parametri
$query->bindParam(':professore',$professore,PDO::PARAM_STR);
$query->bindParam(':materia',$materia,PDO::PARAM_STR);
//Esegui la query:
$query -> execute();

$lastInsertId = $dbconnection->lastInsertId();
//Controllo l'inserimento dei dati, messaggio e re-indirizzo
if($lastInsertId>0)
{
echo "<script>alert('Professore inserito con successo');</script>";
echo "<script>window.location.href='professore_tab.php'</script>";
 }
else {

echo "Professore non inserito con successo";
 }
}
?>