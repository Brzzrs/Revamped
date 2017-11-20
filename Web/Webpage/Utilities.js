
class CoreUtilities {

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
        document.getElementById('dateid').innerHTML = String(data[(new Date().getMonth() + 1)] + " " + new Date().getDate() + ", " + new Date().getFullYear());
      }, 1000);
    }
    else {
      setInterval(function() {
        document.getElementById('timeid').innerHTML = new Date().toLocaleTimeString().replace(/:\d+ /, ' ')
      }, 1000);
    }
  }

}
