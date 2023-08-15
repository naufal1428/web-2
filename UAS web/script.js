let filterarray = [];

let galleryarray = [
    {
        id: 1,
        name: "tshirt logo",
        src: "images/tshirt/ts logo front.png",
        desc: "tshirt logo"
    },
    {
        id: 2,
        name: "tshirt flower",
        src: "images/tshirt/ts flower front.png",
        desc: "tshirt flower"
    },
    {
        id: 3,
        name: "tshirt kind",
        src: "images/tshirt/ts kind front.png",
        desc: "tshirt kind"
    },
    {
        id: 4,
        name: "hoodie logo",
        src: "images/sweatshirt/hd logo front.png",
        desc: "hoodie logo"
    },
    {
        id: 5,
        name: "hoodie push",
        src: "images/sweatshirt/hd red front.png",
        desc: "hoodie push"
    },
    {
        id: 6,
        name: "hoodie flower",
        src: "images/sweatshirt/hd flower front.png",
        desc: "hoodie flower"
    }
]

showgallery(galleryarray);

function showgallery(currarray){

    document.getElementById("card").innerText = "";

    for(var i=0; i<currarray.length; i++){
        document.getElementById("card").innerHTML += `
            <div class="col">
            <div class="card" style="width= 100%">
                <a class="product" href="detailTsLogo.html">
                    <img src="${currarray[i].src}" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <b class="card-title">${currarray[i].desc}</b>
                    <p class="card-text">${currarray[i].desc}</p>
                </div>
            </div>
            </div>
        
        `
    }
}

document.getElementById("myinput").addEventListener("keyup", function(){
    let text = document.getElementById("myinput").value;

    filterarray = galleryarray.filter(function(a) {
        if(a.desc.includes(text)) {
            return a.desc;
        }
    })
    if(this.value==""){
        showgallery(galleryarray);
    }
    else{
        if(filterarray==""){
            document.getElementById("para").style.display = 'block';
            document.getElementById("card").innerHTML = "";
        }
        else{
            showgallery(filterarray);
            document.getElementById("para").style.display='none';
        }
    }
})


function cetak() {
    var name = document.getElementById("namejoin").value;
    var outname = document.getElementById("outname");
    var email = document.getElementById("emailjoin").value;
    var outemail = document.getElementById("outemail");
    
    outname.innerHTML = "<br>" + "<b>Hi, </b>" + "<b>" + name + "</b>" + "<b>. Thanks for joining our community!</b>";
    

}