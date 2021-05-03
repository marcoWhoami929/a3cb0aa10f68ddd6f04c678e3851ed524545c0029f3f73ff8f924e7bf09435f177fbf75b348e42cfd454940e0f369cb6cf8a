<header class="navigation fixed-top">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand font-tertiary h3" href="inicio"><img src="vistas/modulos/images/logo.png" alt="SFD"></a>
    <buttonIniciar class="navbar-toggler" type="buttonIniciar" data-toggle="collapse" data-target="#navigation"
      aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </buttonIniciar>

    <div class="collapse navbar-collapse text-center" id="navigation">
      <ul class="navbar-nav ml-auto" id="menuPremios">
        <li class="nav-item">
          <a class="nav-link not-active"><b style="color:red" id="participant-number"></b></a>
        </li>
        <li class="nav-item">
          
          <a class="nav-link buttonIniciar" id="iniciarRifa" style="display: none" >COMENZAR</a>
        
        </li>

        <!--
        <li class="nav-item">
          <a class="nav-link" href="premio3.html">PREMIO 3</a>
        </li>
        -->
      </ul>
    </div>
  </nav>
</header>
<style type="text/css" media="screen">
  .buttonIniciar::after, .buttonIniciar::before {
  position: absolute;
  content: "";
  transition: all 0.5s;
}

.buttonIniciar {
  display: inline-block;
  padding: 10px 20px;
  color: white;
  position: absolute;
  top: 50%;
  left: 90%;
  transform: translate(-50%, -50%);
  vertical-align: middle;
  font-family: 'Attractype-Reborn';
  text-decoration: none;
  font-size: 2vw;
  transition: all 0.5s;
  background-color: #BA007C;
}

.buttonIniciar::before {
  bottom: -15px;
  height: 15px;
  width: 100%;
  left: 8px;
  transform: skewX(45deg);
  background-color: #196090;
}
.buttonIniciar::after {
  right: -15px;
  height: 100%;
  width: 15px;
  bottom: -8px;
  transform: skewY(45deg);
  background-color: #124364;
}
.buttonIniciar:active {
  margin-left: 10px;
  margin-top: 10px;
}
.buttonIniciar:active::before {
  bottom: -5px;
  height: 5px;
  left: 3px;
}
.buttonIniciar:active::after {
  right: -5px;
  width: 5px;
  bottom: -3px;
}
.not-active {
  pointer-events: none;
  cursor: default;
  text-decoration: none;
  color: black;
}
</style>
