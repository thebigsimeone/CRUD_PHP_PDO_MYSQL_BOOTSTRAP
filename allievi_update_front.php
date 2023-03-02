<?php 
include 'dbconnection.php';
//Ottieni l'ID utente
$userid=intval($_GET['id']);
$sql = "SELECT id, nome, cognome, idlezione FROM allievi WHERE id=:uid";

//Prepara la query:
$query = $dbconnection->prepare($sql);
//Associa i parametri
$query->bindParam(':uid',$userid,PDO::PARAM_STR);
//Esegui la query:
$query->execute();
//Assegna i dati estratti dal database (nel passaggio precedente) a una variabile.
$results=$query->fetchAll(PDO::FETCH_OBJ);
//Per l'inizializzazione del numero di serie
$cnt=1;
if($query->rowCount() > 0)
{
//Nel caso in cui la query abbia restituito almeno un record, possiamo echo i record all'interno di un ciclo foreach:
foreach($results as $result)
{
$Nome = $result->nome;
$Cognome = $result->cognome;
$Idlezione = $result->idlezione;	
		}
	}
	?>
<?php

if(isset($_POST['submit']))
{
//Ottieni l'ID utente
$userid=intval($_GET['id']);
//Imposta i valori
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$idlezione = $_POST['idlezione'];
//Query di aggiornamento
$sql="UPDATE allievi SET nome=:nome, cognome=:cognome, idlezione=:idlezione WHERE id=:uid";

//Prepara la query per l'esecuzione
$query = $dbconnection->prepare($sql);
//Associa i parametri
$query->bindParam(':uid', $userid, PDO::PARAM_INT);
$query->bindParam(':nome',$nome,PDO::PARAM_STR);
$query->bindParam(':cognome',$cognome,PDO::PARAM_STR);
$query->bindParam(':idlezione',$idlezione,PDO::PARAM_INT);
//Esecuzione della query
$query->execute();
//Messaggio di esecuzione
echo "<script>alert('Alunno modificato con successo!');</script>";
//Re-indirizzo 
echo "<script>window.location.href='allievi_tab.php'</script>";
}
	?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Modifica i dati dell'alunno</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form method="POST">
                            <div class="form-group">
			    				<label for="nome">Nome</label>
			    				<input type="text" name="nome" id="nome" class="form-control input-sm" placeholder="Nome" required="" value="<?php echo $Nome;?>">
			    			</div>
			    			<div class="form-group">
			    				<label for="cognome">Cognome</label>
			    				<input type="text" name="cognome" id="cognome" class="form-control input-sm" placeholder="Cognome" required="" value="<?php echo $Cognome; ?>">
			    			</div>
                            <div class="form-group">
			    				<label for="idlezione">Id Lezione</label>
			    				<input type="number" min="1" max="10" name="idlezione" id="idlezione" class="form-control input-sm" placeholder="Inserisci il numero della lezione" required="" value="<?php echo $Idlezione;?>">
			    			</div>
                               <input type="submit" name="submit" value="Modifica" class="btn btn-info btn-block">
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
    <style type="text/css">
    	body{
    background-color: #fff;
}
.centered-form{
	margin-top: 60px;
}

.centered-form .panel{
	background: rgba(255, 255, 255, 0.8);
	box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
}
    </style>