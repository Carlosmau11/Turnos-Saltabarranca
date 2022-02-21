<?php include 'admin/db_connect.php' ?>
<div class="container">
	<div class="col-lg-12">
		<div class="card bg-primary">
			<div class="card-body">
				<h3 class="text-center text-white"><b>Bienvenido Registre Su Turno A Continuación</b></h3>
			</div>
		</div>
		<div class="card mt-4">
			<div class="card-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<a href="index.php?page=register" class="btn btn btn-primary btn-sm col-md-4 float-right">Registra tu turno <i class="fa fa-angle-right">
							</i></a>
						</div>
					</div>
					<hr>
					<h4 class="text-center">Seleccione el apartado "Presidencia" para visualizar los turnos</h4>
					<hr class="divider">
					<div class="row">

						<?php 
						$trans = $conn->query("SELECT * FROM transactions where status = 1 order by name asc");
							while($row=$trans->fetch_assoc()):
						?>
						<div class="col-md-4 mt-4">
						<a href="index.php?page=display&id=<?php echo $row['id'] ?>" class="btn btn btn-primary btn-block "><?php echo ucwords($row['name']); ?> <i class="fa fa-angle-right">
							</i></a>
						</div>
					<?php endwhile; ?>
						
					</div>
				</div>
			</div>
		</div>
		<img src="admin/assets/img/secundario saltabarranca.png" class="avatar" alt="Avatar Image">
	</div>
</div>