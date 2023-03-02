<?php 
include  'dbconnection.php';
//Ottieni l'ID utente
$userid=intval($_GET['id']);
$sql = "SELECT id, lezione FROM lezioni WHERE id=:uid";

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
$Lezione = $result->lezione;	
		}
	}
	?>
 <?php

if(isset($_POST['submit']))
{
//Ottieni l'ID utente
$userid=intval($_GET['id']);
//Imposta i valori
$lezione = $_POST['lezione'];
//Query di aggiornamento
$sql="UPDATE lezioni SET lezione=:lezione WHERE id=:uid";

//Prepara la query per l'esecuzione
$query = $dbconnection->prepare($sql);
//Associa i parametri
$query->bindParam(':uid', $userid, PDO::PARAM_INT);
$query->bindParam(':lezione',$lezione,PDO::PARAM_STR);

//Esecuzione della query
$query->execute();
//Messaggio di esecuzione
echo "<script>alert('Lezione modificata con successo!');</script>";
//Re-indirizzone
echo "<script>window.location.href='index.php'</script>";
}
	?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Modifica la lezione</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form method="POST">
			    			
                            <div class="form-group">
			    				<label for="lezione">Lezione</label>
			    				<input type="text" name="lezione" id="lezione" class="form-control input-sm" placeholder="Lezione" required="" value="<?php echo $Lezione;?>">
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