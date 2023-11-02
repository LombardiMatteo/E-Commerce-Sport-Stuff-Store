const form = document.getElementById("orderForm");
const button = document.getElementById("cancel");

form.onsubmit = orderForm;
button.onclick = cancel;
            
function orderForm(event){
    event.preventDefault();
        
    let data = new FormData(form);
    let x = new XMLHttpRequest();
    x.open("POST", "../actions/orderAction.php");
    x.onload = () => {
        window.location.href = "orderConfirmation.php";
    };

    x.onerror = (event) => console.log(event);
    x.send(data);
}

function cancel(event) {
    event.preventDefault();
    window.location = "../index.php";
}