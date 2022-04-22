<style>


body {
	color: #fff;
	font-family: 'Roboto', sans-serif;
}

h5{
	font-size: 25px;
}

h4{
	font-size: 25px;
	background-color: orange;
}

h3{
	font-size: 18px;
	background-color: red;
}

h3.text-center-2{
	font-size: 18px;
	color: #000000;
	background-color: yellow;
}

h2{
	font-size: 20px;
}


.contenedor {
	width: 36%;
	margin-left: 25px;
	max-width: 1200px;
	padding: 60px 0;


	/*AQUI ORDENO LAS COLUMNAS DE LOS TURNOS*/
	display: grid;
	grid-template-columns: 2fr, 1fr;
}

.titulo {
	font-size: 24px;
	padding: 20px 0;
}

.contenedor-conciertos{
	display: grid;
	grid-template-columns: repeat(2, 1fr);
	gap: 20px;
}

.card {
	border-radius: 10px;
	min-height: 180px;
	font-weight: bold;
	padding: 20px;
	position: relative;
	overflow: hidden;
	background-size: cover;
	background-position: center center;

	
}

.card .textos {
	height: 100%;
	
	
}

.clock {
  display: flex;
  position: relative;
  justify-content: center;
  align-items: center;
  font-weight: bold;
  height: 30%;
  font-size: 24px;
}

@media screen and (max-width: 900px) {
	
}

@media screen and (max-width: 700px) {
	
}

@media screen and (max-width: 600px) {

}


/*--------------------------------------------------------------------------------------*/

	.left-side{
		position: absolute;
		width: calc(40%);
		height: calc(100%);
		left: 0;
		top:0;
		background: #ffffffc7;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.right-side{
		position: absolute;
		width: calc(60%);
		height: calc(100%);
		right: 0;
		top:0;
		background: white;
	}
	.slideShow{
		display: flex;
		justify-content: center;
		align-items: center;
		width: calc(100%);
		height: calc(100%);
		padding: auto;
	}
	.slideShow img,.slideShow video{
		max-width: calc(100%);
		max-height: calc(100%);
		opacity: 0;
		transition: all .5s ease-in-out;
	}
	.slideShow video{
		width: calc(100%);
	}
	a.btn.btn-sm.btn-success {
    z-index: 99999;
    position: fixed;
    left: 1rem;
}

</style>
<?php include "admin/db_connect.php" ?>

<?php 

/**PRESIDENCIA */
$tname = $conn->query("SELECT * FROM transactions where id = 6")->fetch_array()['name'];
function nserving(){
	include "admin/db_connect.php";

	$query = $conn->query("SELECT q.*,t.name as wname FROM queue_list q inner join transaction_windows t on t.id = q.window_id where date(q.date_created) = '".date('Y-m-d')."' and q.transaction_id = '".$_GET['id']."' and q.status = 1 order by q.id desc limit 1  ");
	if($query->num_rows > 0){
		foreach ($query->fetch_array() as $key => $value) {
			if(!is_numeric($key))
			$data[$key] = $value;
		}
		return json_encode(array('status'=>1,"data"=>$data));
	}else{
		return json_encode(array('status'=>0));

	}
	$conn->close();
}

/**CATASTRO */
$tname2 = $conn->query("SELECT * FROM transactions where id = 7")->fetch_array()['name'];
function nserving2(){
	include "admin/db_connect.php";

	$query = $conn->query("SELECT q.*,t.name as wname FROM queue_list q inner join transaction_windows t on t.id = q.window_id where date(q.date_created) = '".date('Y-m-d')."' and q.transaction_id = '".$_GET['id']."' and q.status = 1 order by q.id desc limit 1  ");
	if($query->num_rows > 0){
		foreach ($query->fetch_array() as $key => $value) {
			if(!is_numeric($key))
			$data[$key] = $value;
		}
		return json_encode(array('status'=>1,"data"=>$data));
	}else{
		return json_encode(array('status'=>0));

	}
	$conn->close();
}

$tname3 = $conn->query("SELECT * FROM transactions where id = 8")->fetch_array()['name'];
function nserving3(){
	include "admin/db_connect.php";

	$query = $conn->query("SELECT q.*,t.name as wname FROM queue_list q inner join transaction_windows t on t.id = q.window_id where date(q.date_created) = '".date('Y-m-d')."' and q.transaction_id = '".$_GET['id']."' and q.status = 1 order by q.id desc limit 1  ");
	if($query->num_rows > 0){
		foreach ($query->fetch_array() as $key => $value) {
			if(!is_numeric($key))
			$data[$key] = $value;
		}
		return json_encode(array('status'=>1,"data"=>$data));
	}else{
		return json_encode(array('status'=>0));

	}
	$conn->close();
}



?>


<a href="index.php" class="btn btn-sm btn-success"><i class="fa fa-home"></i> Volver al inicio</a>
<div class="contenedor">
		<div class="contenedor-conciertos">
			<div class="card">
				<div class="textos">
					<h4 class="text-center text-white"><b><?php echo strtoupper($tname) ?></b></h4>
					<h3 class="text-center"><b>Ocupado con turno</b></h3>
					<h5 class="text-center" id="squeue"></h5>
					<h3 class="text-center-2"><b>Turnos en espera</b></h3>
					<h5 class="text-center" id="next"></h5>
					<hr class="divider">
				</div>
			</div>
			</div>
			<!---------------------------------------------------------------------------->
		</div>
	</div>

<div class="right-side">
	<?php
	$uploads = $conn->query("SELECT * FROM file_uploads order by rand() ");
	$slides = array();
	while($row= $uploads->fetch_assoc()){
		$slides[] = $row['file_path'];
	}
	?>
	<div class="slideShow">
		
	</div>
</div>

<script>
	var slides = <?php echo json_encode($slides) ?>;
	var scount = slides.length;
		if(scount > 0){
				$(document).ready(function(){
					render_slides(0)
				})
		}
	function render_slides(k){
		if(k >= scount)
			k = 0;
		var src = slides[k]
		k++;
		var t = src.split('.');
		var file ;
			t = t[1];
			if(t == 'mp4'){
				file = $("<video id='slide' src='admin/assets/uploads/"+src+"' onended='render_slides("+k+")' autoplay='true'></video>");
			}else{
				file = $("<img id='slide' src='admin/assets/uploads/"+src+"' onload='slideInterval("+k+")' />" );
			}
			console.log(file)
			if($('#slide').length > 0){
				$('#slide').css({"opacity":0});
				setTimeout(function(){
						$('.slideShow').html('');
				$('.slideShow').append(file)
				$('#slide').css({"opacity":1});
				if(t == 'mp4')
					$('video').trigger('play');

				
				},500)
			}else{
				$('.slideShow').append(file)
				$('#slide').css({"opacity":1});

							}
				
	}
	function slideInterval(i=0){
		setTimeout(function(){
		render_slides(i)
		},2500)

	}
	
	$(document).ready(function(){
		var queue = '';
		var renderServe = setInterval(function(){
			$.ajax({
				url:'admin/ajax.php?action=get_queue',
				method:"POST",
				data:{id:'<?php echo 6?>'},
				success:function(resp){
					resp = JSON.parse(resp)
					$('#squeue').html(resp.data.queue_no)
				}
			})
			
		},1500)
	})

	$(document).ready(function(){
		var queue = '';
		var renderServe = setInterval(function(){
			$.ajax({
				url:'admin/ajax.php?action=waiting_queue',
				method:"POST",
				data:{id:'<?php echo 6?>'},
				success:function(resp){
					resp = JSON.parse(resp)
					$('#next').html(resp.data.queue_no)
				}
			})
			
		},1500)
	})

	/****************************************************************** */
	$(document).ready(function(){
		var queue = '';
		var renderServe = setInterval(function(){
			$.ajax({
				url:'admin/ajax.php?action=get_queue',
				method:"POST",
				data:{id:'<?php echo 7?>'},
				success:function(resp){
					resp = JSON.parse(resp)
					$('#squeue2').html(resp.data.queue_no)
				}
			})
			
		},1500)
	})

	$(document).ready(function(){
		var queue = '';
		var renderServe = setInterval(function(){
			$.ajax({
				url:'admin/ajax.php?action=waiting_queue',
				method:"POST",
				data:{id:'<?php echo 7?>'},
				success:function(resp){
					resp = JSON.parse(resp)
					$('#next1').html(resp.data.queue_no)
				}
			})
			
		},1500)
	})

	/****************************************************************** */
	$(document).ready(function(){
		var queue = '';
		var renderServe = setInterval(function(){
			$.ajax({
				url:'admin/ajax.php?action=get_queue',
				method:"POST",
				data:{id:'<?php echo 8?>'},
				success:function(resp){
					resp = JSON.parse(resp)
					$('#squeue3').html(resp.data.queue_no)
				}
			})
			
		},1500)
	})

	$(document).ready(function(){
		var queue = '';
		var renderServe = setInterval(function(){
			$.ajax({
				url:'admin/ajax.php?action=waiting_queue',
				method:"POST",
				data:{id:'<?php echo 8?>'},
				success:function(resp){
					resp = JSON.parse(resp)
					$('#next2').html(resp.data.queue_no)
				}
			})
		},1500)
	})
</script>