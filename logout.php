<?php
include 'header.php';
?>

<?php

session_start();
session_unset();
session_destroy();

header("Location: index.php");
exit;
?>

		<h1>
			<p>Déconnexion réussie</p>
		</h1>
</div>
</body>
</html>
