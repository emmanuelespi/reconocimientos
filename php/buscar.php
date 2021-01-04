<?php
include('conectar.php');
if($_REQUEST)
{
	$vex = $_REQUEST['vex_id'];
	$query= "select * from tbequipo where vexid='". strtolower($vex)."'";
	$result = mysqli_query($link,$query) or die('ok');
	if(mysqli_num_rows(@$result) > 0) 
	{
		?>
		<div class="col-xs-12" id="formulario-oculto"><br>
		<form class="form-horizontal" action="pdf/generar.php" method="post" target="_blank">
			<div class="form-group">
				<label for="nom-completo" class="control-label">Nombre</label>
				
					<input type="text" class="form-control" id="nom_completo" name="nom_completo" placeholder="Nombre completo" required>
				
					<input type="hidden" class="form-control" id="institucion" name="institucion" value="<?php echo $vex ?>">
				
				<label for="institucion" class="control-label">Nombre del torneo</label>
				
					<select class="form-control" id="nom_torneo" name="nom_torneo" required>
						<option value="" selected>Elige</option>
						<?php
						$query2= "select torneos.* 
								  from tbtorneos as torneos inner join tbequipo as equipos inner join equipos_torneo as equipo_tor 
								  on torneos.id_torneo=equipo_tor.id_torneo and equipos.id_equipo=equipo_tor.id_equipo and equipos.vexid='$vex';";
						$res=mysqli_query($link, $query2);
						while($row=mysqli_fetch_array($res))
						{
						?>
						<option value="<?php echo utf8_encode($row['nombre']); ?>"> <?php echo utf8_encode($row['nombre']);?></option>
						<?php
						}
						?>
					</select>				
			</div>
			<button type="submit" class="btn btn-emma pull-right">Generar</button>
		</form>
	</div>
	<?php
	}
	else
	{
		echo '<br><br><br>
		<div class="col-xs-12" id="Error"><p class="alert alert-danger">No se encontró en la base de datos</p></div>';		
	}
}
?>