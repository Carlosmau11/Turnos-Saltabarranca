<?php include 'db_connect.php' ?>
<style>

.btn{
    margin-right: 50%;
}

 .col-md-4{
     margin-right: -16%;
 } 

 /******************************************************************************/


h1 {
  margin: 15px 0;
  font-weight: 900;
  font-size: 28px;
  text-align: center;
}

input {
  transition: 0.5s ease-in-out;
  margin: 10px 0;
  font-size: 18px;
  padding: 5px;
  background: rgba(0, 0, 0, 0.11);
  border: none;
}

button {
  margin: 5px;
  padding: 10px;
  border: none;
  font-size: 18px;
  transition: 0.5s ease-in-out;
}

  

.start {
  background-color:  #008000;
  color: white;
  margin-left: 21.5%;
  margin-top: 5%;
}
.break {
  background: rgb(0, 199, 116);
  color: #000000;
}
.reset {
  background-color: #007BFF;
  color: #ffffff;

}
.pause {
  background-color: #007BFF;
  color: #ffffff;
}
.resume {
  background: rgb(131, 10, 252);
  color: white;
}


</style>

<div class="containe-fluid">

	<div class="row">
		<div class="col-lg-12">
			
		</div>
	</div>

	<div class="row mt-3 ml-3 mr-3">
			<div class="col-lg-12">
    			<div class="card">
    				<div class="card-body">
    				<h1><?php echo "Bienvenido de nuevo ". $_SESSION['login_name']."!"  ?></h1>
    				</div>
    				<hr>
    				
    		      </div>
                </div>
	</div>
<hr>
<?php if($_SESSION['login_type'] == 2): ?>
<?php 


?>
<script>
    function queueNow(){
            $.ajax({
                url:'ajax.php?action=update_queue',
                success:function(resp){
                    resp = JSON.parse(resp)
                    $('#sname').html(resp.data.name)
                    $('#squeue').html(resp.data.queue_no)
                    $('#window').html(resp.data.wname)
                }
            })
    }


</script>
<div class="row">
    <div class="col-md-4 text-center">
        <a href="javascript:void(0)" class="btn btn-primary" onclick="queueNow()">Siguiente turno</a>
    </div>
<div class="col-md-4">
    <div class="card">
        <div class="card-header bg-primary text-white"><h3 class="text-center"><b>Atendiendo turno</b></h3></div>
            <div class="card-body">
                <h3 class="text-center" id="squeue">Sin turnos</h3>
                <hr class="divider">
                <h5 class="text-center" >Siguientes turnos</h5>
                <hr class="divider">
            </div>
        </div>
    </div>
</div>


   
      <button class="start">Iniciar</button>
      <button class="reset">Reiniciar</button>
      <button class="pause">Pausar</button>
<?php endif; ?>


</div>



    <script src="assets/js/setting.js"></script>
    <script src="assets/js/timmer.js"></script>
    <script src="assets/js/progress.js"></script>
