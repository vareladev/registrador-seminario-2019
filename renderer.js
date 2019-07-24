// This file is required by the index.html file and will
// be executed in the renderer process for that window.
// All of the Node.js APIs are available in this process.
const remote = require('electron').remote;
const app = remote.app;
var fs = require('fs')

document.getElementById("registrar").addEventListener("click", function (evt) {
    evt.preventDefault()
    var filepath = app.getPath("desktop") + "/data.csv";
    var carnet = document.getElementById("carnet").value
    var current_datetime = new Date()
    var dislplayText = current_datetime.getFullYear() + "-" + (current_datetime.getMonth() + 1) + "-" + current_datetime.getDate() + " " + current_datetime.getHours() + ":" + current_datetime.getMinutes() + ":" + current_datetime.getSeconds() 
    var content = `${carnet},${current_datetime.getTime()}\n`;
    var list = document.getElementById("list");
    
    fs.appendFile(filepath, content, (err) => {
        if (err) {
            alert("An error ocurred updating the file" + err.message);
            console.log(err);
            return;
        }
        var row = document.createElement("tr")
        var columnCarnet = document.createElement("td")
        var columnTime = document.createElement("td")
        columnCarnet.innerHTML = carnet
        columnTime.innerHTML = dislplayText

        row.appendChild(columnCarnet)
        row.appendChild(columnTime)

        list.insertBefore(row, list.childNodes[0]);

        // Clean carnet 
        document.getElementById("carnet").value = ""
    });
});