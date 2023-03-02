<?php 
include  'dbconnection.php';
//Ottieni l'ID utente
$userid=intval($_GET['id']);
$sql = "SELECT id, professore, materia FROM professori WHERE id=:uid";

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
$Professore = $result->professore;
$Materia = $result->materia;

	
	
		}
	}
	?>
 <?php

if(isset($_POST['submit']))
{
//Ottieni l'ID utente
$userid=intval($_GET['id']);
//Imposta i valori
$professore = $_POST['professore'];
$materia = $_POST['materia'];
//Prepara la query per l'esecuzione
$sql="UPDATE professori SET professore=:professore, materia=:materia WHERE id=:uid";

//Prepara la query per l'esecuzione
$query = $dbconnection->prepare($sql);
//Associa i parametri
$query->bindParam(':uid', $userid, PDO::PARAM_INT);
$query->bindParam(':professore',$professore,PDO::PARAM_STR);
$query->bindParam(':materia',$materia,PDO::PARAM_STR);
//Esecuzione della query
$query->execute();
//Messaggio di esecuzione
echo "<script>alert('Record Updated successfully');</script>";
//Re-indirizzone
echo "<script>window.location.href='fetch.php'</script>";
}
	?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Modifica i dati del professore</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form method="POST">
			    			
                            <div class="form-group">
			    				<label for="professore">Professore</label>
			    				<input type="text" name="professore" id="professore" class="form-control input-sm" placeholder="Professore" required="" value="<?php echo $Professore;?>">
			    			</div>
			    			<div class="form-group">
			    				<label for="materia">Materia</label>
			    				<input type="text" name="materia" id="materia" class="form-control input-sm" placeholder="Materia" required="" value="<?php echo $Materia; ?>">
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