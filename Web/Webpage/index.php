<?php
class JSONgetter {
  var $JSON;

  public function GetTask($option) {
    $this->JSON = json_decode(file_get_contents("../WebResources/settings.json"));
    if ($option === "oemmarketing") {
      echo (string)$this->JSON->tasks->oemmarketing;
    }
    if ($option === "techsupport") {
      echo (string)$this->JSON->tasks->techsupport;
    }
    if ($option === "webprogramming") {
      echo (string)$this->JSON->tasks->webprogramming;
    }
    if ($option === "everyone") {
      echo (string)$this->JSON->tasks->everyone;
    }
  }

}
?>



<html>

<head>
  <title>ITEAM</title>
  <script src="../WebResources/Libs/React/react.js"></script>
  <script src="../WebResources/Libs/React/react-dom.js"></script>
  <script src="./Utilities.js"></script>
  <script src="https://fb.me/JSXTransformer-0.13.3.js"></script>
  <link rel="stylesheet" href="../WebResources/Libs/Materialize/css/materialize.min.css">
  <link rel="stylesheet" href="./style.css">

  <script type="text/jsx">
    new CoreUtilities("date").getFormattedData();
    new CoreUtilities("time").getFormattedData();
  </script>

</head>

<body class="white">

  <div id="navbar">
    <nav>
      <div class="nav-wrapper blue darken-1">
        <a href="#" class="brand-logo center"><img id="iTeamLogo" src="../WebResources/Images/iTeamLogoBlue.png"></a>
        <div id="navsections">
          <div id="datediv" class="left"><h4 id="dateid"></h4></div>
          <div id="timediv" class="right"><h4 id="timeid"></h4></div>
        </div>
      </div>
    </nav>
  </div>

  <div id="tasks">
    <center>
      <br>
      <div class="container">
        <div class="row">
          <div class="col s12 card-panel blue darken-1 white-text">
          <div class="col s12 card-panel blue accent-4 white-text">
            <h4>OEM & Marketing/Sales</h4>
            <h5 id="oemmarkid">
              <script type="text/javascript">
              setInterval(function () {
                document.getElementById("oemmarkid").innerHTML = '<?php $core = new JSONgetter(); $core->GetTask("oemmarketing"); ?>';
              }, 0);
              </script>
            </h5>
          </div>
          <div class="col s12 card-panel blue accent-4 white-text">
            <h4>Tech Support</h4>
            <h5 id="techid">
              <script type="text/javascript">
              setInterval(function () {
                document.getElementById("techid").innerHTML = '<?php $core = new JSONgetter(); $core->GetTask("techsupport"); ?>';
              }, 0);
              </script>
            </h5>
          </div>
          <div class="col s12 card-panel blue accent-4 white-text">
            <h4>Web/Programming</h4>
            <h5 id="webproid">
              <script type="text/javascript">
              setInterval(function () {
                document.getElementById("webproid").innerHTML = '<?php $core = new JSONgetter(); $core->GetTask("webprogramming"); ?>';
              }, 0);
              </script>
            </h5>
          </div>
          <div class="col s12 card-panel blue accent-4 white-text">
            <h4>Everyone</h4>
            <h5 id="everyid">
              <script type="text/javascript">
              setInterval(function () {
                document.getElementById("everyid").innerHTML = '<?php $core = new JSONgetter(); $core->GetTask("everyone"); ?>';
              }, 0);
              </script>
            </h5>
          </div>
        </div>
      </div>
      </div>
    </center>
  </div>

</body>

</html>
