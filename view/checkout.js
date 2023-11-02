const form = document.getElementById("shippingForm");

form.onsubmit = shippingForm;
            
function shippingForm(event){
    event.preventDefault();

    let data = new FormData(form);
    let x = new XMLHttpRequest();
    x.open("POST", "../actions/checkoutAction.php");
    x.onload = () => {
        const response = JSON.parse(x.response);
        document.getElementById("noAddr").hidden = true;
        document.getElementById("noType").hidden = true;
        if (response["check"] === true) {
            window.location.href = "order.php";
        } else {
            console.log(response);
            if(response["error"] == 0){
                const errMsg = document.getElementById("noAddr");
                errMsg.hidden = false;
            } else {
                const errMsg = document.getElementById("noType");
                errMsg.hidden = false;
            } 
        }
    };

    x.onerror = (event) => console.log(event);
    x.send(data);
}