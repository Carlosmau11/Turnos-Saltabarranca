
<style>
label {
  color: #ffffff;
  font-size: 14px;
}

.color-input{
  background-color: #ffffff;
}

input {
  transition: 0.5s ease-in-out;
  margin: 10px 0;
  font-size: 18px;
  padding: 5px;
  color: #000000;
  background: #ffffff;
  border: none;
}

button {
  margin: 5px;
  padding: 10px;
  border: none;
  font-size: 10px;
  transition: 0.5s ease-in-out;
}
	form {
  height: 5%;
  display: flex;
  flex-direction: column;
  padding: 0;
  max-width: 300px;
  margin: 5px auto;
  margin-top: 20%;
  margin-left: 3%;
}
form button {
  background: rgb(25, 67, 255);
  width: 100%;
  margin: 5px 0;
  color: white;
}

figure{
  margin-top: 24%;
  margin-bottom: 33%;
}

.clock {
  color: #ffffff;
  padding: 3px;
  display: flex;
  position: relative;
  justify-content: center;
  align-items: center;
  font-weight: bold;
  height: 30%;
  font-size: 24px;
}
.progress-ring {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.progress-ring__circle {
  transition: 0.5s;
  transform: rotate(-90deg);
  transform-origin: 50% 50%;
  stroke: rgb(51, 65, 255);
}

.danger {
  stroke: rgb(243, 17, 28);
  animation: pulse 0.9s ease-in-out infinite;
}

@keyframes pulse {
  0%,
  100% {
    transform: rotate(-90deg) scale(1);
  }
  50% {
    transform: rotate(-90deg) scale(1.05);
  }
  75% {
    transform: rotate(-90deg) scale(0.8);
  }
}

media screen and (min-width: 768px) {
  body {
    display: grid;
    grid-template-areas:
      "head head"
      "clock form"
      "btns ji";
  }
  .clock {
    grid-area: clock;
    height: 100%;
  }h1 {
    grid-area: head;

    align-self: center;
  }


</style>
<nav id="sidebar" class='mx-lt-5 bg-dark' >
		
		<div class="sidebar-list">
				<?php if($_SESSION['login_type'] == 1): ?>

				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Inicio</a>
				<a href="index.php?page=transactions" class="nav-item nav-transactions"><span class='icon-field'><i class="fa fa-list"></i></span> Lista de módulos</a>	
				<a href="index.php?page=windows" class="nav-item nav-windows"><span class='icon-field'><i class="fa fa-square-full"></i></span> Lista de Ventanas</a>	
				<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Usuarios</a>				
				
			<?php else: ?>
				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Inicio</a>
				<a  class="nav-item nav-home"><span class='icon-field'><i class="fa fa-clock"></i></span> Tiempo de espera
				<form action=".">
      				<label for="focusTime">Agregar tiempo</label>
      				<input class="color-input" type="number" value="1" id="focusTime" />
      				<label for="breakTime">Descanso</label>
      				<input class="color-input" type="number" value="1" id="breakTime" />
      				<button type="submit">Guardar</button>
   			</form>
				</a>

        <a  class="nav-item"><span class='icon-field'></span>
        <figure class="clock">
              <div class="mins">0</div>
              <div>:</div>
              <div class="secs">00</div>
              <audio
                src="http://soundbible.com/mp3/service-bell_daniel_simion.mp3"
              ></audio>
              <svg class="progress-ring" height="120" width="120">
                <circle
                  class="progress-ring__circle"
                  stroke-width="8"
                  fill="transparent"
                  r="50"
                  cx="60"
                  cy="60"
                />
              </svg>
        </figure>
				</a>
			<?php endif; ?>
		</div>
</nav>



<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
