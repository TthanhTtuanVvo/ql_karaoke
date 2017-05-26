<?php
	$gia_tri = 0;
	$r = $db->select("tgp_online_daily","");
	while ($row = $db->fetch($r))
	$gia_tri += $row["bo_dem"];

	$x = 8 - strlen($gia_tri);
	for ($i = 1; $i <= $x; $i++)
	{
	$gia_tri = "0" . $gia_tri;
	}

	for ($i = 0; $i < strlen($gia_tri); $i++)
	{
	    //echo "<img src='".$domain."/images/count/".$gia_tri[$i].".jpg' >";
        echo $gia_tri[$i];
    }
?>