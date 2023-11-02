const form = document.getElementById("changePasswordForm");
const back = document.getElementById("back");

back.onclick = (event) => {
    event.preventDefault();
    window.location = "profile.php";
};
form.onsubmit = changePasswordForm;
            
function changePasswordForm(event){
    event.preventDefault();

    let data = new FormData(form);
    let x = new XMLHttpRequest();
    x.open("POST", "../actions/changePasswordAction.php");
    x.onload = () => {
        const response = JSON.parse(x.response);
        document.getElementById("oldPassError").hidden = true;
        document.getElementById("newPassError").hidden = true;
        if (response["check"] === true) {
            console.log(response);
            window.location = "profile.php";
        } else {
            console.log(response);
            if(response["error"] == 0){
                const errMsg = document.getElementById("oldPassError");
                errMsg.hidden = false;
            } else {
                const errMsg = document.getElementById("newPassError");
                errMsg.hidden = false;
            }   
        }
    };

    x.onerror = (event) => console.log(event);
    x.send(data);
}