const daftar_id = ["1", "2", "3"]

function Report(){
    var report = document.getElementById("report");
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;
    report.innerHTML = '<div class= "container rounded-5 p-4" style = "background-color : #FFFFFF";><b>Thanks for the response!</b><p>The following are your respond :<br> Name : ' + name + ' <br> Email : ' + email + '<br> My Message : </p>' + message + "</div";
}

function Calculate(){
    var jumlah = 0;
    for (var i = 0 ; i < daftar_id.length ; i++){
        jumlah += +document.getElementById(daftar_id[i]).value;
    }
    var result = document.getElementById("result");
    jumlah *= 360
    result.innerHTML = '<p>Sampah yang anda hasilkan per-tahunnya adalah sebanyak:</p><h2>' + jumlah + '</h2>'
}

function Add(){
    var add_section = document.getElementById("add");
    add_section.innerHTML = '<input type="text" class="form-control mt-3" placeholder="" aria-label="Username" aria-describedby="basic-addon1" id="Adder"  style="width: 600px;"><br><button type="button" class="btn rounded m-2" onclick="Save()">Save</button>'
}

function Save(){
    var counter = 4;
    var container = document.getElementById("container-sampah");
    container.innerHTML += '<div class="input-group mb-3"><span class="input-group-text" id="basic-addon1">' + document.getElementById("Adder").value + '</span><input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" id="'+ counter + '"></div>'
    daftar_id.push(String(counter));
    counter++
}