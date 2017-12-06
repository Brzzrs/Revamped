function loadJSON(callback) {

    var xobj = new XMLHttpRequest();
        xobj.overrideMimeType("application/json");
    xobj.open('GET', '../WebResources/settings.json', true); // Replace 'my_data' with the path to your file
    xobj.onreadystatechange = function () {
          if (xobj.readyState == 4 && xobj.status == "200") {
            // Required use of an anonymous callback as .open will NOT return a value but simply returns undefined in asynchronous mode
            callback(xobj.responseText);
          }
    };
    xobj.send(null);
 }

class JSONgetter{

  constructor(team, data) {
    this.team = team;
    this.data = data;
    this.json = null;
  }

  GetJSON() {
    loadJSON(function(response) {
      this.json = JSON.parse(response);
    });
  }

}


class TimeDate {

  constructor(option) {
    this.option = option;
  }

  getFormattedData() {
    if (this.option == "date") {
      return this.FormatOption([
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December"
      ], this.option);
    }
    else {
      return this.FormatOption("NULL", this.option);
    }
  }

  FormatOption(data, option) {
    if (option == "date") {
      setInterval(function() {
        document.getElementById("dateid").innerHTML = String(data[(new Date().getMonth())] + " " + new Date().getDate() + ", " + new Date().getFullYear());
      }, 0);
    }
    else {
      setInterval(function() {
        document.getElementById("timeid").innerHTML = new Date().toLocaleTimeString().replace(/:\d+ /, ' ')
      }, 0);
    }
  }

}

class TaskDue {

  constructor(dueid, taskid, json) {
    this.dueid = dueid;
    this.taskid = taskid;
    this.json = json;
  }

  GetTask() {
    console.log("taskid: " + this.taskid);
    console.log("json: " + this.json);
    const taskid = this.dueid;
    const json = this.json;
    setInterval(function () {
      if (json != "N/A") {
        document.getElementById(taskid).innerHTML = json;
      }
    }, 0);
  }

  GetDue() {
    console.log("dueid: " + this.dueid);
    console.log("json: " + this.json);
    const dueid = this.dueid;
    const json = this.json;
    setInterval(function () {
      if (json != "N/A") {
        document.getElementById(dueid).innerHTML = 'Due: ' + json;
      }
    }, 0);
  }

}
