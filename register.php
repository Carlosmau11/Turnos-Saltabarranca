<style>
	/*AQUI DECLARO LA POSICION DEL BOTON DE VOLVER AL INICIO*/
	a.btn.btn-sm.btn-success {
    z-index: 99999;
    margin-left: 3%;
	margin-top: 2%;
	}

	.left-side{
		margin-top: 3%;
	}

	img{
		margin-top: 20.5%;
		width: 50%;
	}

	.img-lateral{
		margin-top: -4%;
		margin-left: 50%;
		width: 50%;
	}
</style>


<?php include "admin/db_connect.php" ?>
<a href="index.php" class="btn btn-sm btn-success"><i class="fa fa-home"></i> Volver al Inicio</a>
<h1 class="text-center text-dark">Seleccione la direccion a la que desee esperar turno</h1>
<div class="left-side">
	<div class="col-md-10 offset-md-1">
		<div class="card">
			<div class="card-body">
				<div class="container-fluid">
					<!--------AQUI DECLARO LOS BOTONES PARA ELEGIR EL TURNO QUE EL USUARIO DESEE ACUDIR--------->
					<form action="" id="new_queue">
						<div class="form-group">
							
							<input type="hidden" id="name" name="name" class="form-control">
						</div>
						<!---------------AQUI DECLARO LA PRESIDENCIA------------------------------->
						<div class="form-group">
							<select name="transaction_id" id="transaction_id" class="custom-select browser-default select2" require>
									<option></option>
									<?php 
										$trans = $conn->query("SELECT * FROM transactions where status = 1 order by name asc");
										while($row=$trans->fetch_assoc()):
									?>
									<option value="<?php echo $row["id"] ?>"><?php echo $row['name'] ?></option>
								<?php endwhile; ?>
							</select>
						</div>
						<!---------------------------------------------------------------------------------------------------->


						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-sm btn-primary col-md-3 float-right">Guardar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<img  src="admin/assets/img/lateral-logos.png" alt="">
<img class="img-lateral" src="admin/assets/img/lateral-logos.png" alt="">


<script>	
	$('.select2').select2({
		placeholder:"Selecciona aquí",
		width:"100%"
	})
	$('#new_queue').submit(function(e){
		e.preventDefault()
		start_load()
			$.ajax({
				url:'admin/ajax.php?action=save_queue',
				method:'POST',
				data:$(this).serialize(),
				error:function(err){
					console.log(err)
					alert_toast("Ocurrió un error",'danger');
					alert_toast("Turno registrado exitósamente",'success');
					end_load()
				},
				success:function(resp){
					if(resp > 0){
						$('#name').val('')
						$('#transaction_id').val('').select2({
							placeholder:"Selecciona aquí",
							width:"100%"
						})
						var nw = window.open("queue_print.php?id="+resp,"_blank","height=500,width=800")
						nw.print()
						setTimeout(function(){
							nw.close()
						},500)
						end_load()
					alert_toast("Queue Registed Successfully",'success');
					}
				}
			})
		
	})


</script>