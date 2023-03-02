<?php 
include  'dbconnection.php';
if(isset($_REQUEST['del']))
{
//Ottieni ID riga
$uid=intval($_GET['del']);
//Qyery di cancellazione
$sql = "DELETE FROM lezioni WHERE id=:id";
// Prepara la query per l'esecuzione
$query = $dbconnection->prepare($sql);
//Associa i parametri
$query-> bindParam(':id',$uid, PDO::PARAM_STR);
//Esecuzione della query
$query -> execute();
//Messaggio di avvenuta eliminazione
echo "<script>alert('Lezione eliminato con successo!');</script>";
//Re indirizzamento della pagina precedente
echo "<script>window.location.href='lezioni_tab.php'</script>";
}
?>
  