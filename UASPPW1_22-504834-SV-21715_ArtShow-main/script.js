var isShowed = [false, false, false, false];

function showDetail(numId) {
    var moreDetailButton = document.getElementById('show-btn-' + numId);
    var eventDetailDiv = document.getElementById('detail-' + numId);
    isShowed[numId] = !isShowed[numId];
    if (isShowed[numId]) {
        moreDetailButton.innerText = "Hide Detail";
        eventDetailDiv.style.display = 'block';
    }
    else {
        moreDetailButton.innerText = "More Detail";
        eventDetailDiv.style.display = 'none';
    }
}

function orderNow() {
    var notLog = confirm("You need to login first");
    if (notLog) {
        console.log("redirect");
        window.open("login.php", "_self");
    }
}

function submitForm() {
    var name = document.getElementById('form-name').value;
    var email = document.getElementById('form-email').value;
    var type = document.getElementsByName('form-type')[0].value;
    var msg = document.getElementById('form-msg').value;
    var responded = document.getElementsByClassName('responded')[0];
    if (name == '') {
        name = 'Anonymous';
    }
    if (email == '' || msg == '') {
        alert("Please fill your email/message!");
    }
    else {
        responded.innerHTML = `<h4>Thanks for your ${type}, ${name}!</h4><p>We will contact you as soon as possible</p>`;
        responded.style.display = 'block';
    }
}

function showTicket(numId) {
    var ticketTable = document.getElementsByClassName("event-container")[numId].getElementsByClassName('ticket-detail')[0];
    var button = document.getElementsByClassName("event-container")[numId].getElementsByTagName("button")[0];
    if (button.innerText == "Show Ticket") {
        ticketTable.style.display = 'block';
        button.innerText = "Hide Ticket";
    }
    else {
        ticketTable.style.display = 'none';
        button.innerText = "Show Ticket";
    }
}
function buyTicket(numId, row) {
    var price = document.getElementsByClassName("event-container")[numId].getElementsByClassName("ticket-detail")[0].querySelectorAll('[name="ticket-price"]')[row].innerHTML;
    // alert(price);
    var qty = prompt("Enter the number of tickets to be purchased");
    var total = Number(abs(qty))*Number(price);
    if (qty != "" && qty != null) {
        alert("Your total price is " + total);
    }
}

function abs(val) {
    if (val < 0) {
        val *= -1;
    }
    return val;
}