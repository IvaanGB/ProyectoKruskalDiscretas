<?php
$e = 0;
if(isset($_POST['send']))
{
	$vertex=$_POST['vertex'];
	$v=$_POST['v'];
	$e=$_POST['e'];
	if(isset($_POST['i'])) $i=$_POST['i'];
	else $i=1;
	if(isset($_POST['sedge'])) $sedge=$_POST['sedge'];
	else $sedge=[];
	if(isset($_POST['dedge'])) $dedge=$_POST['dedge'];
	else $dedge=[];
	if(isset($_POST['weight'])) $weight=$_POST['weight'];
	else $weight=[];
}
?>
<!doctype html>
<html>
<head>
	<?php include 'template/include.php';?>
</head>
<body>
	<?php include 'template/header.php';?>

	<div class="container1">
			<div class="barra">
				<div class="row">
			<div class="col-xs-4 col-xs-offset-2 text-center">
				<div class="adyacencia">
				<center><h3><b>Tabla de Adyacencia</b></h3></center>
			</div>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>#</th>
							<?php
							for($j = 1; $j <= $v; $j++)
								echo "<th>".$vertex[$j]."</th>";
							?>
						</tr>
					</thead>
					<tbody>
						<?php
						for($j = 1; $j <= $v; $j++)
						{
							echo "<tr>";
							echo "<th>".$vertex[$j]."</th>";
							for($k = 1; $k <= $v; $k++)
							{
								$array[$j][$k] = 0;
								for($l = 1; $l < $i; $l++)
									if($sedge[$l] == $j && $dedge[$l] == $k) $array[$j][$k] += 1;
								for($l = 1; $l < $i; $l++)
									if($dedge[$l] == $j && $sedge[$l] == $k) $array[$j][$k] += 1;
								echo "<th>".$array[$j][$k]."</th>";
							}
							echo "</tr>";
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
		</div>
			<div class="col-xs-4 text-center">
				<?php
				if($e)
				{
					echo '<div class="form-top">';
					echo '<h3 class="text-center">Ingrese cada dato de <b>Conexión</b></h3>';
					echo '</div>';
					echo '<div class="form-bottom">';
					if($i==$e) echo '<form role="form" action="result.php" method="post">';
					else echo '<form role="form" action="edge.php" method="post">';
					echo '<div class="form-group">';
					for ($j = 1; $j < $i ; $j++)
					{ 
						echo '<input type="hidden" name="sedge['.$j.']" value="'.$sedge[$j].'">';
						echo '<input type="hidden" name="dedge['.$j.']" value="'.$dedge[$j].'">';
						echo '<input type="hidden" name="weight['.$j.']" value="'.$weight[$j].'">';
					}
					echo '<label for="sedge['.$i.']">Conexión: ' . $i . '</label>';
					echo '<select class="form-control" name="sedge['.$i.']">';
					echo '<option value="" disabled selected="selected">Origen: </option>';
					for($j = 1; $j <= $v; $j++)
					{
						echo '<option value="'.$j.'">'.$vertex[$j].'</option>';
					}
					echo '</select>';
					echo '</div>';
					echo '<div class="form-group">';
					echo '<label class="sr-only" for="dedge['.$i.']">Conexión: ' . $i . '</label>';
					echo '<select class="form-control" name="dedge['.$i.']">';
					echo '<option value="" disabled selected="selected">Destino: </option>';
					for($j = 1; $j <= $v; $j++)
					{
						echo '<option value="'.$j.'">'.$vertex[$j].'</option>';
					}
					echo '</select>';
					echo '</div>';
					echo '<div class="form-group">';
					echo '<label class="sr-only" for="weight['.$i.']">Conexión: ' . $i . '</label>';
					echo '<input type="number" name="weight['.$i.']" placeholder="Peso" class="form-control">';
					echo '</div>';
					for($j = 1; $j <= $v; $j++)
					{
						echo '<input type="hidden" name="vertex['.$j.']" value="'.$vertex[$j].'">';
					}
					$i++;
					echo '<input type="hidden" name="i" value="'.$i.'">';
					echo '<input type="hidden" name="v" value="'.$v.'">';
					echo '<input type="hidden" name="e" value="'.$e.'">';
					echo '<button type="submit" name="send" class="btn btn-primary">Next</button><br><br>';
					echo '</form>';
					echo '</div>';
				}
				?>
			</div>
		</div>

</body>