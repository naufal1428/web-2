const btnOpen = document.querySelector("#btn-open");
const btnClose = document.querySelector("#btn-close");
const pop = document.querySelector("#popup");

const txt1 = document.querySelector("#name");
const txt2 = document.querySelector("#mail");
const txt3 = document.querySelector("#comment");

btnOpen.disabled = true;

txt1.addEventListener('change', stateHandle);

function stateHandle() {
    if (txt1.value === "" && txt2.value === "" && txt3.value === "") {
        btnOpen.disabled = true; //btnOpen remains disabled
    } else {
        btnOpen.disabled = false; //button is enabled
    }
}

btnOpen.addEventListener('click', () => {
    document.querySelector("#name-out").innerHTML = txt1.value;
    document.querySelector("#mail-out").innerHTML = txt2.value;
    document.querySelector("#comment-out").innerHTML = txt3.value;
    
    pop.show();
    document.querySelector("body").style.overflow = 'hidden';

    txt1.value = '';
    txt2.value = '';
    txt3.value = '';
    alert("Your response has been submited");
})

btnClose.addEventListener('click', () => {
    pop.close();
    document.querySelector("body").style.overflowY = 'scroll';
})

//*==============================================================================

const btnCalculate = document.querySelector("#btn-calculate");
const btnAdd = document.querySelector("#btn-add");
var isAdded = false;

btnCalculate.addEventListener('click', () => {

    const result = document.querySelector(".result");
    const item1 = parseInt(document.querySelector("#item1").value);
    const item2 = parseInt(document.querySelector("#item2").value);
    const item3 = parseInt(document.querySelector("#item3").value);

    if (isAdded) {

        const item4 = parseInt(document.querySelector("#item4").value);
        const hasil = (item1 + item2 + item3 + item4) * 365;
        result.innerHTML = "<br> Total trash per year: " + hasil ;
    }
    else {
        const hasil = (item1 + item2 + item3) * 365;
        result.innerHTML = "<br> Total trash per year: " + hasil ;
    }

})

btnAdd.addEventListener('click', () => {
    
    const result = document.querySelector(".add-box");
    let box = '<input type="text" name="add item" id="add" size="20" maxlength="20"></input>'
    let txt = '<p style="color: red; font-size:10px; margin-top: 5px">*You can only add one item</p>'
    let btn = '<button type="button" id="btn-save">Save</button>'

    result.innerHTML = box + txt + btn;
    
    const btnSave = document.querySelector("#btn-save");

    btnSave.addEventListener('click', () => {

        const addedItem = document.querySelector("#add");
        const result = document.querySelector(".added-box");
        
        let label ="<label>" + addedItem.value + "</label>"
        let box = '<input type="text" name="item" id="item4" size="10" maxlength="10"></input>'

        isAdded = true;

        result.innerHTML = label + box;
        addedItem.value = '';
    });

})