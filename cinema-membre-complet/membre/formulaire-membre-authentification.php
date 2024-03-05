<style type="text/css">
	form 
	{
		position:relative;
		border-radius:20px;
		padding:20px;
		border:solid 2px #0494ed;
		width:400px;
		background-color:#76c6f7;
		color: #004a77;
		font-weight : bold;
	}
	form label
	{
		display:inline-block;
		width: 100px;
	}
	form input[type=submit]
	{
		position:absolute;
		top:30px;
		right:20px;
	}
	form div
	{
		position:relative;
	}
</style>

<form method="post" action="membre/traitement-authentification-membre.php">

	<div>
		<label for="pseudonyme">Pseudonyme</label>
		<input type="text" id="pseudonyme" name="pseudonyme" value=""/>
	</div>
	<div>
		<label for="motdepasse">Mot de passe</label>
		<input type="password" id="motdepasse" name="motdepasse" value=""/>
	</div>
	<input type="submit" name="membre-authentification" value="Me connecter"/>
	
</form>