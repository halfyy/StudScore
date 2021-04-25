<?php
	$fn = $_POST['fac'];
	$mysqli = new mysqli("StudScore", "root", "root", "facs");
	$query = "CREATE TABLE `".$fn."` (`id` INT UNIQUE AUTO_INCREMENT NOT NULL, `subject` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL)";
	$result = $mysqli->query($query);
	for($i=1;$i<100;$i++){
		if(isset($_POST['subject'.$i])){
    		$query = "INSERT INTO `".$fn."`(`subject`) VALUES ('".$_POST['subject'.$i].")";
    		$result = $mysqli->query($query);
		}

	}
	for($i=1;$i<100;$i++){
		if(isset($_POST['col'.$i])){
    		$query = "ALTER TABLE `".$fn."` ADD COLUMN `".$_POST['col'.$i]."` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL";
    		$result = $mysqli->query($query);
		}

	}

	for($i=1;$i<100;$i++){
		for($j=1;$j<100;$j++){
				if(isset($_POST['act'.$i.'col'.$j])){
	    		$query = "INSERT INTO `".$fn."`(`".$_POST['col'.$j]."`) VALUES ('".$_POST['act'.$i.'col'.$j].")";
	    		$result = $mysqli->query($query);
			}
		}

	}

	$mysqli->close();
?>