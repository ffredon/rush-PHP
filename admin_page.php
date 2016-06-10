<?php
session_start();
function check_admin($login, $paswd)
{
	if ($_SESSION["login"] == NULL || $_SESSION["passwd"] = NULL)
		return false;
  $db = unserialize(file_get_contents("./data/user"));
  foreach ($db as $user)
   if($user["adm"] != NULL && $user["adm"] == "admin")
    return true;
  return false;
}
if (!check_admin($_SESSION['login'], $_SESSION['password']))
{
	header('Location: index.php');
	exit;
}
echo '<link rel="stylesheet" type="text/css" href="css/admin_page.css">';
?>
<div id="all">
	<div id="frame"><a href="./php/logs.php"><h4>Historique des commandes</h4></a></div>
	<div id="modif_account"><a href="./php/droits.php"><h4>Modifier les comptes</h4></a></div>
	<div id="modif_prod"><a href='./php/admprod.php'><h4>Modifier produit</h4></a></div>
	<div id="modif_categorie"><a href="./php/adm_categories.php"><h4>Modifier un categorie</h4></a></div>
	<div id="modif_acceuil"><a href="./index.php"><h4>Retour sur le site</h4></a></div>
</div>