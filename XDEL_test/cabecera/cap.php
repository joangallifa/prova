		<div class="navbar navbar-default navbar-fixed-top bg-faded">
			<div class="container">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
					<div class="navbar-brand navbar-left logoNET">
						<img src="cabecera/media/logo_lanet.svg" alt="Logo laNET" />
					</div>
				
				<div class="login navbar-collapse collapse">
					<span class="login_username"><?php 
						echo (!$usuari->nom?'':$usuari->nom).' '.(!$usuari->cognoms?'':$usuari->cognoms);				
					?></span>
					<a href="//srv.net.fje.edu/lg/lf.php" class="logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
