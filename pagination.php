<?php
// Cette page est incluse dans une autre. $item est recu par GET sur une autre page
	include('connexion/connexion.php'); // to change on your side
	$sql = "SELECT item FROM table";
	$req = $bdd->query($sql);
	$rows = $req->fetchAll();
	//items per page
	$items = 16;
	// $nums = floor(count($rows) / $items) + 1;
	//
	$count=1;
	$num = 1;
	$numReg = 1;
	$lastPage= false;
	echo '<div align="center"><p>';
	foreach ($rows as $row) {
		if ($count === 1) {
			$item = $row['item'];
		}
		if ($lastPage) {
			echo '<a itemprop="url" href="'.$item'.html" style="margin-right:5px">'.$num.'</a>';
			break;
		}
		if ($count === $items) {
			echo '<a itemprop="url" href="'.$item'.html" style="margin-right:5px">'.$num.'</a>';
			$count = 1;
			$num++;
			if ((count($rows) - $numReg) < ($items)) {
				$lastPage = true;
			}
		}else {
			$count++;
		}

		$numReg++;
	}	
	echo '</p></div>';
	echo '<table><tr>' ;

	$i=0;
	$count=1;
	$verif=false;
	// var_dump($rows);
	foreach ($rows as $row)
	{
	
	$lientableau = ucfirst($row['item']);

	if ($item !== '' && !$verif) {
		$verif = true;
	}

	if ($item === '' || $verif) {
		echo'<td><a href="'.$item.'.html">'.$lientableau.'</td>';
		$i=$i+1;
		if($i===4) { $i=0 ;  echo '</tr><tr>' ; }
		$count++;
		if ($count > 16) {
			break;
		}
	}
	
	}
	echo '</tr></table>' ;
?>
