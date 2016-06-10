<?php

	$cat_db = "../data/cat";

	session_start();

	if(!file_exists($cat_db))
		file_put_contents($cat_db, "");

 	if ($_GET["user_tag"])
 		list($group, $tag) = explode('-', $_GET["user_tag"]);

	 if (!is_array($cat_data))
 		$cat_data = array();

	$cat_data = unserialize(file_get_contents($cat_db));

 	if ($_GET["submit"] == "delete")
 	{
 		foreach ($cat_data[$group] as $key => $value) {
			if ($tag == $value)
				unset($cat_value[$key]);
 		}
 	}

 	if ($_GET["submit"] == "add")
 	{

 	}

 	if ($_GET["submit"] == "modify")
 	{

 	}


 	echo "<table>";
 	echo "<tr><td>Categorie</td><td>Modifier</td><td>Supprimer</td></tr>";
 	foreach ($cat_data as $cat_group => $cat) {

 		echo "<tr><strong>" . $cat_group . "</strong></tr>";
 		foreach ($cat as $value)
 		{
 			echo "<tr>";
 			echo "<form method=\"GET\" target=\"adm_categories.php\">";
			echo "<td><input type=\"input\" name=tag value=" . $cat_group . "-". $value["user_tag"] . "/></td>";
			echo "<td><input type=\"submit\" name=\"submit\" value=\"modify\" /></td>";
			echo "<td><input type=\"submit\" name=\"submit\" value=\"delete\" /></td>";
			echo "</form>";
			echo "</tr>";
 		}
 	}
	echo "</table>";
?>
