const form = document.getElementById("emailForm");
const back = document.getElementById("back");

back.onclick = (event) => {
    event.preventDefault();
    window.location = "login.php";
};
form.onsubmit = emailForm;
            
function emailForm(event){
    event.preventDefault();

    let data = new FormData(form);
    let x = new XMLHttpRequest();
    x.open("POST", "../actions/checkEmailAction.php");
    x.onload = () => {
        const response = JSON.parse(x.response);
        document.getElementById("wrongEmail").hidden = true;
        if (response["check"] === true) {
            console.log(response);
            // reindirizzamento
            window.location.href = "forgotPassword.php";
        } else {
            console.log(response);
            const errMsg = document.getElementById("wrongEmail");
            errMsg.hidden = false;   
        }
    };

    x.onerror = (event) => console.log(event);
    x.send(data);
}

