<?php
include("../WebResources/ChromePhp.php");
class JSONgetter {
  var $JSON;

  public function GetData($data) {
    $option = filter_input(INPUT_COOKIE, "team");
    ChromePhp::log("[PHP] Grabbed Cookie Data: '" . $option . "'");
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
    setcookie("team", "", time() - 60 * 60 * 24 * 30);
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
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <link rel="stylesheet" href="../WebResources/Libs/Materialize/css/materialize.min.css">
  <link rel="stylesheet" href="./style.css">

  <script type="text/javascript">
    //TimeDate Parameters for constructor = option
    //TaskDue Parameters for constructor = dueid, taskid, json
    new TimeDate("date").getFormattedData();
    new TimeDate("time").getFormattedData();

    function CreateCookie(name, value, days) {
      var expires;
      var date = new Date();
      date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
      expires = "; expires=" + date.toGMTString();
      document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
    }

    function GetDue(dueid, team) {
      CreateCookie("team", team, 1);
      const json = '<?php $core = new JSONgetter(); $core->GetData("due"); ?>';
      new TaskDue(dueid, null, json).GetDue();
    }
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
                GetDue("oemdue", "oemmarketing");
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
              <h5 id="techdue">
                <script type="text/javascript">
                setInterval(function () {
                  const due = '<?php $core = new JSONgetter(); $core->GetData("techsupport", "due"); ?>';
                  if (due != "N/A") {
                    document.getElementById("techdue").innerHTML = 'Due: ' + due;
                  }
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
              <h5 id="webdue">
                <script type="text/javascript">
                setInterval(function () {
                  const due = '<?php $core = new JSONgetter(); $core->GetData("webprogramming", "due"); ?>';
                  if (due != "N/A") {
                    document.getElementById("webdue").innerHTML = 'Due: ' + due;
                  }
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
              <h5 id="everydue">
                <script type="text/javascript">
                setInterval(function () {
                  const due = '<?php $core = new JSONgetter(); $core->GetData("everyone", "due"); ?>';
                  if (due != "N/A") {
                    document.getElementById("everydue").innerHTML = 'Due: ' + due;
                  }
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
