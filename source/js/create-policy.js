

var url_string = window.location.href;
var url = new URL(url_string);
var name = url.searchParams.get("name");
console.log(name);

var str = document.getElementsByClassName('policy').value;

var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "table.php?name=" + name, true);
xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var data = JSON.parse(xmlhttp.responseText);
        console.log(data);
        addTable(data);
    }
};
xmlhttp.send();
var o = 0;
function addTable(data) {

    var i, j;
    var k = 0;
    var l = 0;

    for (i in data.accounts) {
        j = "<tr id = addr" + (l += 1) + "><td class=sno>" + data.accounts[i].sno + "</td>";
        j += "<td><input type=text name=option" + data.accounts[i] + " value='" + data.accounts[i].name + "'></td>";

        if (data.accounts[i].asamee == null) {
            j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src=../assets/images/add.svg width=30px><input name=option" + l + "zasamee type=file id=upload" + k + " class=impAudio accept=audio/* style=display:none></label></td>";
        }
        else {
            j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src=../assets/images/success.svg width=30px><input name=option" + l + "zasamee type=file id=upload" + k + " class=impAudio accept=audio/* style=display:none></label></td>";
        }
        if (data.accounts[i].bengali == null) {
            j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src='../assets/images/add.svg' width='30px'><input name=option" + l + "zbengali type=file id=upload" + k + " class=impAudio accept='audio/*' style='display:none'></label></td>";
        }
        else {
            j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src=../assets/images/success.svg width=30px><input name=option" + l + "zbengali type=file id=upload" + k + " class=impAudio accept=audio/* style=display:none></label></td>";
        }
        if (data.accounts[i].english == null) {
            j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src='../assets/images/add.svg' width='30px'><input name=option" + l + "zenglish type=file id=upload" + k + " class=impAudio accept='audio/*' style='display:none'></label></td>";
        }
        else {
            j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src=../assets/images/success.svg width=30px><input name=option" + l + "zenglish type=file id=upload" + k + " class=impAudio accept=audio/* style=display:none></label></td>";
        }
        if (data.accounts[i].gujarati == null) {
            j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src='../assets/images/add.svg' width='30px'><input name=option" + l + "zgujarati type=file id=upload" + k + " class=impAudio accept='audio/*' style='display:none'></label></td>";
        }
        else {
            j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src=../assets/images/success.svg width=30px><input name=option" + l + "zgujarati type=file id=upload" + k + " class=impAudio accept=audio/* style=display:none></label></td>";
        }
        if (data.accounts[i].hindi == null) {
            j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src='../assets/images/add.svg' width='30px'><input name=option" + l + "zhindi type=file id=upload" + k + " class=impAudio accept='audio/*' style='display:none'></label></td>";
        }
        else {
            j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src=../assets/images/success.svg width=30px><input name=option" + l + "zhindi type=file id=upload" + k + " class=impAudio accept=audio/* style=display:none></label></td>";
        }
        if (data.accounts[i].kannad == null) {
            j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src='../assets/images/add.svg' width='30px'><input name=option" + l + "zkannad type=file id=upload" + k + " class=impAudio accept='audio/*' style='display:none'></label></td>";
        }
        else {
            j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src=../assets/images/success.svg width=30px><input name=option" + l + "zkannad type=file id=upload" + k + " class=impAudio accept=audio/* style=display:none></label></td>";
        }
        if (data.accounts[i].malayalam == null) {
            j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src='../assets/images/add.svg' width='30px'><input name=option" + l + "zmalayalam type=file id=upload" + k + " class=impAudio accept='audio/*' style='display:none'></label></td>";
        }
        else {
            j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src=../assets/images/success.svg width=30px><input name=option" + l + "zmalayalam type=file id=upload" + k + " class=impAudio accept=audio/* style=display:none></label></td>";
        }
        if (data.accounts[i].marathi == null) {
            j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src='../assets/images/add.svg' width='30px'><input name=option" + l + "zmarathi type=file id=upload" + k + " class=impAudio accept='audio/*' style='display:none'></label></td>";
        }
        else {
            j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src=../assets/images/success.svg width=30px><input name=option" + l + "zmarathi type=file id=upload" + k + " class=impAudio accept=audio/* style=display:none></label></td>";
        }
        if (data.accounts[i].oriya == null) {
            j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src='../assets/images/add.svg' width='30px'><input name=option" + l + "zoriya type=file id=upload" + k + " class=impAudio accept='audio/*' style='display:none'></label></td>";
        }
        else {
            j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src=../assets/images/success.svg width=30px><input name=option" + l + "zoriya type=file id=upload" + k + " class=impAudio accept=audio/* style=display:none></label></td>";
        }
        if (data.accounts[i].punjabi == null) {
            j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src='../assets/images/add.svg' width='30px'><input name=option" + l + "zpunjabi type=file id=upload" + k + " class=impAudio accept='audio/*' style='display:none'></label></td>";
        }
        else {
            j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src=../assets/images/success.svg width=30px><input name=option" + l + "zpunjabi type=file id=upload" + k + " class=impAudio accept=audio/* style=display:none></label></td>";
        }
        if (data.accounts[i].tamil == null) {
            j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src='../assets/images/add.svg' width='30px'><input name=option" + l + "ztamil type=file id=upload" + k + " class=impAudio accept='audio/*' style='display:none'></label></td>";
        }
        else {
            j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src=../assets/images/success.svg width=30px><input name=option" + l + "ztamil type=file id=upload" + k + " class=impAudio accept=audio/* style=display:none></label></td>";
        }
        if (data.accounts[i].telugu == null) {
            j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src='../assets/images/add.svg' width='30px'><input name=option" + l + "ztelugu type=file id=upload" + k + " class=impAudio accept='audio/*' style='display:none'></label></td> ";
        }
        else {
            j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src=../assets/images/success.svg width=30px><input name=option" + l + "ztelugu type=file id=upload" + k + " class=impAudio accept=audio/* style=display:none></label></td>";
        }
        j += "</tr>";
        $('#tab_logic').append(j);

        //$('tbody').html("<tr id='#addr'"+ i+1 +">");

        if (data.accounts[i].coverageandroid == null)
        {
          $('.ca').attr("src","../assets/images/upload.svg");
        }else {
          $('.ca').attr("src","../assets/images/success.svg");
        }
        if (data.accounts[i].coverageios == null)
        {
          $('.ci').attr("src","../assets/images/upload.svg");
        }else{
          $('.ci').attr("src","../assets/images/success.svg");
        }

        //header

        if (data.accounts[i].headerandroid == null)
        {
          $('.ha').attr("src","../assets/images/upload.svg");
        }else {
          $('.ha').attr("src","../assets/images/success.svg");
        }
        if (data.accounts[i].headerios == null)
        {
          $('.hi').attr("src","../assets/images/upload.svg");
        }else{
          $('.hi').attr("src","../assets/images/success.svg");
        }

    }



}


function addRoww() {
    var z;
    z = "<tr id = addr" + (x += 1) + "><td class=sno>" + x + "</td>";
    z += "<td><input type=text name=option" + x + " value=''></td>";

    for (; y <= w; y++) {
        z += "<td><label for=upload" + y + "><img class=addAudio" + y + " src=../assets/images/add.svg width=30px><input class=option" + l + "type=file id=upload" + y + " name=impAudio" + y + " accept=audio/* style=display:none></label></td>";

    }
    z += "<td> <button type=button id=delete>Delete</button></td></tr>";
    w += 12;
    y = wz11;
    $('#tab_logic').append(z);
}


//var l = 0;

function addRow(str) {

    var l = parseInt(str);
    var k = l*12;
    //var w = 48;
    if(isNaN(l))
    {
        l=0;
        k=0;
    }

    j = "<tr id = addr" + (l += 1) + "><td>" + l + "</td>";
    j += "<td><input type=text name=option" + l + " value=''></td>";


    j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src=../assets/images/add.svg width=30px><input name=option" + l + "zasamee type=file id=upload" + k + " class=impAudio accept=audio/* style=display:none></label></td>";

    j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src='../assets/images/add.svg' width='30px'><input name=option" + l + "zbengali type=file id=upload" + k + " class=impAudio accept='audio/*' style='display:none'></label></td>";

    j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src='../assets/images/add.svg' width='30px'><input name=option" + l + "zenglish type=file id=upload" + k + " class=impAudio accept='audio/*' style='display:none'></label></td>";

    j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src='../assets/images/add.svg' width='30px'><input name=option" + l + "zgujarati type=file id=upload" + k + " class=impAudio accept='audio/*' style='display:none'></label></td>";

    j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src='../assets/images/add.svg' width='30px'><input name=option" + l + "zhindi type=file id=upload" + k + " class=impAudio accept='audio/*' style='display:none'></label></td>";

    j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src='../assets/images/add.svg' width='30px'><input name=option" + l + "zkannad type=file id=upload" + k + " class=impAudio accept='audio/*' style='display:none'></label></td>";

    j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src='../assets/images/add.svg' width='30px'><input name=option" + l + "zmalayalam type=file id=upload" + k + " class=impAudio accept='audio/*' style='display:none'></label></td>";

    j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src='../assets/images/add.svg' width='30px'><input name=option" + l + "zmarathi type=file id=upload" + k + " class=impAudio accept='audio/*' style='display:none'></label></td>";

    j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src='../assets/images/add.svg' width='30px'><input name=option" + l + "zoriya type=file id=upload" + k + " class=impAudio accept='audio/*' style='display:none'></label></td>";

    j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src='../assets/images/add.svg' width='30px'><input name=option" + l + "zpunjabi type=file id=upload" + k + " class=impAudio accept='audio/*' style='display:none'></label></td>";

    j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src='../assets/images/add.svg' width='30px'><input name=option" + l + "ztamil type=file id=upload" + k + " class=impAudio accept='audio/*' style='display:none'></label></td>";

    j += "<td><label for=upload" + (k += 1) + "><img class=addAudio" + k + " src='../assets/images/add.svg' width='30px'><input name=option" + l + "ztelugu type=file id=upload" + k + " class=impAudio accept='audio/*' style='display:none'></label></td> ";

    j += "</tr>";
    $('#tab_logic').append(j);

}
