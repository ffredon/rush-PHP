<?php

	$cat_method 	= "POST";
	$cat_target 	= "index.php";

	$cat_db = "data/cat";

	session_start();

	 if (!is_array($cat_data))
 		$cat_data = array();

	$cat_data = unserialize(file_get_contents($cat_db));

	// "Category" Array pattern:

	// Array
	// (
	// 	[0] => (
	// 		[user_tag] 	= "Client-side tag"
	// 		[admin_tag]	= "Server-side tag - DO NOT DISPLAY IT ON CLIENT SIDE"
	// 	)
	// 	...
	// )

	// function make_rolling_list( $array, $name )
	// Take an array and return a string containing html formatted code :
	// <option name=$name size=1> 

	function make_rolling_list( $array, $name )
	{
		$str .= "<select class=list name=" . $name ." size=1>";
		$str .= "<option value=\"\">";		
		foreach ($array as $value)
		{
			$str .= "<option value=" . $value["admin_tag"];
			$str .= ">". $value["user_tag"];			
		}


		$str .= "</select>";
		return $str;
	}




	$str = "<form method=". $cat_method ." action=" . $cat_target .">";
	foreach ($cat_data as $key => $value) {
			$str .= "<span>" . $key . "</span> <br />";
			$str .= make_rolling_list( $value, strtolower($key));
	}
	// $str .= make_rolling_list( $type, "type");
	// $str .= "<br /><span>Region</span> <br />";
	// $str .= make_rolling_list( $region, "region");
	// $str .= "<br /><span>Degré</span> <br />";
	// $str .= make_rolling_list( $degre, "degre");
	// $str .= "<br /><span>Prix</span> <br />";
	// $str .= make_rolling_list( $prix, "prix");
	$str .= "<br /><button type=submit name=submit value=\"cat\">Filtrer</button></form>";

	echo $str;
?>
