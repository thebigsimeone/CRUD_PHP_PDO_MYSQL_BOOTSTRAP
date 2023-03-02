
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Inserisci un nuovo alunno</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form method="POST" action="allievi_insert_back.php">
			    			
                            <div class="form-group">
			    				<label for="nome">Nome</label>
			    				<input type="text" name="nome" id="nome" class="form-control input-sm" placeholder="Nome" required="">
			    			</div>
			    			<div class="form-group">
			    				<label for="cognome">Cognome</label>
			    				<input type="cognome" name="cognome" id="cognome" class="form-control input-sm" placeholder="Cognome" required="">
			    			</div>
			    			<div class="form-group">
			    				<label for="idlezione">Id lezione</label>
			    				<input type="number" min="1" max="10" name="idlezione" id="idlezione" class="form-control input-sm" placeholder="Inserisci l'id della lezione" required="">
			    			</div>
                               <input type="submit" name="submit" value="Invia" class="btn btn-info btn-block">
			    		
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>