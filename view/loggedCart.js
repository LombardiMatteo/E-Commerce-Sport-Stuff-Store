const delForm = document.getElementsByClassName("deleteForm");
const procButton = document.getElementById("proceedCheckout-button");

procButton.onclick = proceedCheckout;
for(let i=0; i<delForm.length; i++) {
    delForm[i].onsubmit = deleteForm;
}

function deleteForm(event) {
    event.preventDefault();
    const target_form = event.target;
    let data = new FormData(target_form);
    let x = new XMLHttpRequest();
    x.open("POST", "../actions/loggedDeleteAction.php");
    x.onload = () => {
        window.location.reload();
    };

    x.onerror = (event) => console.log(event);
    x.send(data);
}

function proceedCheckout(event) {
    event.preventDefault();   
    window.location.href = "checkout.php";
}