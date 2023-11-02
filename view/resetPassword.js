const form = document.getElementById("resetPasswordForm");
const back = document.getElementById("back");

back.onclick = (event) => {
    event.preventDefault();
    window.location = "login.php";
};
form.onsubmit = resetPasswordForm;
            
function resetPasswordForm(event){
    event.preventDefault();

    let data = new FormData(form);
    let x = new XMLHttpRequest();
    x.open("POST", "../actions/resetPasswordAction.php");
    x.onload = () => {
        const response = JSON.parse(x.response);
        document.getElementById("pswdError").hidden = true;
        if (response["check"] === true) {
            console.log(response);
            window.location = "login.php";
        } else {
            console.log(response);
            const errMsg = document.getElementById("pswdError");
            errMsg.hidden = false;   
        }
    };

    x.onerror = (event) => console.log(event);
    x.send(data);
}
