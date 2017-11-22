<?php
	function sederhana($a, $v) //tidak mengandung sisi ganda atau gelang
	{
		$x = true;
		for($i = 1; $i <= $v; $i++)
		{
			for($j = 1; $j <= $v; $j++)
			{
				if($i == $j  && $a[$i][$j] > 0) $x = false; //jika ada edge gelang
				if($a[$i][$j] > 1) $x = false; //jika ada edge ganda
			}
		}
		return $x;
	}
	function complete($a, $v) //setiap pasang vertices selalu memiliki 1-buah edge
	{
		$x = true;
		for($i = 1; $i <= $v; $i++)
		{
			for($j = 1; $j <= $v; $j++)
			{
				if($i != $j  && $a[$i][$j] != 1) $x = false;
			}
		}
		return $x;
	}
	function cycle($a, $v, $e)
	{
		if($e != $v) return false;
		$x = true;
		for($i = 1; $i <= $v; $i++)
		{
			$b[$i] = 0;
			for($j = 1; $j <= $v; $j++)
			{
				if($i != $j  && $a[$i][$j] == 1) $b[$i]++;
			}
		}
		for($i = 1; $i <= $v; $i++) if($b[$i] != 2) $x = false;
		return $x;
	}
	function wheel($a, $v, $e)
	{
		if($v < 4) return false;
		if($e != (($v-1)*2)) return false;
		for($i = 1; $i <= $v; $i++)
		{
			$b[$i] = 0;
			for($j = 1; $j <= $v; $j++)
			{
				if($i != $j  && $a[$i][$j] == 1) $b[$i]++;
			}
		}
		$roda = $pusat = 0;
		for($i = 1; $i <= $v; $i++)
		{
			if($b[$i] == 3) $roda++;
			else if($b[$i] == ($v-1)) $pusat++;
		}
		if($roda == ($v-1) && $pusat == 1) return true;
		else if($v == 4 && $roda == 4 && $pusat == 0) return true; //pengecualian untuk roda vertex 4
		else return false;
	}
?>