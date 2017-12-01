<?php
class JSONgetter {
  var $JSON;

  public function GetData($option, $data) {
    $this->JSON = json_decode(file_get_contents("../WebResources/settings.json"));
    if ($option === "oemmarketing") {
      if ($data === "task") {
        echo (string)$this->JSON->tasks->oemmarketing->task;
      }
      if ($data === "due") {
        echo (string)$this->JSON->tasks->oemmarketing->due;
      }
    }
    if ($option === "techsupport") {
      if ($data === "task") {
        echo (string)$this->JSON->tasks->techsupport->task;
      }
      if ($data === "due") {
        echo (string)$this->JSON->tasks->techsupport->due;
      }
    }
    if ($option === "webprogramming") {
      if ($data === "task") {
        echo (string)$this->JSON->tasks->webprogramming->task;
      }
      if ($data === "due") {
        echo (string)$this->JSON->tasks->webprogramming->due;
      }
    }
    if ($option === "everyone") {
      if ($data === "task") {
        echo (string)$this->JSON->tasks->everyone->task;
      }
      if ($data === "due") {
        echo (string)$this->JSON->tasks->everyone->due;
      }
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
      <div class="nav-wrapper blue darken-3">
        <a href="#" class="brand-logo center"><img id="iTeamLogo" src="../WebResources/Images/iTeamLogoWhite.png"></a>
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
          <div class="col s12 card-panel blue darken-3 white-text">
            <h3>Tasks</h3>
            <div class="col s12 card-panel blue accent-4 white-text">
              <h4>OEM & Marketing/Sales</h4>
              <h5 id="oemmarkid">
                <script type="text/javascript">
                setInterval(function () {
                  document.getElementById("oemmarkid").innerHTML = '<?php $core = new JSONgetter(); $core->GetData("oemmarketing", "task"); ?>';
                }, 0);
                </script>
              </h5>
              <h5 id="oemdue">
                <script type="text/javascript">
                setInterval(function () {
                  document.getElementById("oemdue").innerHTML = 'Due: <?php $core = new JSONgetter(); $core->GetData("everyone", "due"); ?>';
                }, 0);
                </script>
              </h5>
            </div>
            <div class="col s12 card-panel blue accent-4 white-text">
              <h4>Tech Support</h4>
              <h5 id="techid">
                <script type="text/javascript">
                setInterval(function () {
                  document.getElementById("techid").innerHTML = '<?php $core = new JSONgetter(); $core->GetData("techsupport", "task"); ?>';
                }, 0);
                </script>
              </h5>
              <h5 id="techdue">Due:
                <script type="text/javascript">
                setInterval(function () {
                  document.getElementById("techdue").innerHTML = 'Due: <?php $core = new JSONgetter(); $core->GetData("everyone", "due"); ?>';
                }, 0);
                </script>
              </h5>
            </div>
            <div class="col s12 card-panel blue accent-4 white-text">
              <h4>Web/Programming</h4>
              <h5 id="webproid">
                <script type="text/javascript">
                setInterval(function () {
                  document.getElementById("webproid").innerHTML = '<?php $core = new JSONgetter(); $core->GetData("webprogramming", "task"); ?>';
                }, 0);
                </script>
              </h5>
              <h5 id="webdue">Due:
                <script type="text/javascript">
                setInterval(function () {
                  document.getElementById("webdue").innerHTML = 'Due: <?php $core = new JSONgetter(); $core->GetData("everyone", "due"); ?>';
                }, 0);
                </script>
              </h5>
            </div>
            <div class="col s12 card-panel blue accent-4 white-text">
              <h4>Everyone</h4>
              <h5 id="everyid">
                <script type="text/javascript">
                setInterval(function () {
                  document.getElementById("everyid").innerHTML = '<?php $core = new JSONgetter(); $core->GetData("everyone", "task"); ?>';
                }, 0);
                </script>
              </h5>
              <h5 id="everydue">Due:
                <script type="text/javascript">
                setInterval(function () {
                  document.getElementById("everydue").innerHTML = 'Due: <?php $core = new JSONgetter(); $core->GetData("everyone", "due"); ?>';
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
