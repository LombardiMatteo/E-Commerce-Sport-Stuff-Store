const form = document.getElementById("loginForm");

form.onsubmit = loginForm;
            
function loginForm(event){
    event.preventDefault();

    let data = new FormData(form);
    let x = new XMLHttpRequest();
    x.open("POST", "../actions/loginAction.php");
    x.onload = () => {
        const response = JSON.parse(x.response);
        document.getElementById("noData").hidden = true;
        document.getElementById("loginError").hidden = true;
        if (response["logged"] === true) {
            window.location.href = "home.php";
        } else {
            console.log(response);
            if(response["error"] == 0){
                const errMsg = document.getElementById("noData");
                errMsg.hidden = false;
            } else {
                const errMsg = document.getElementById("loginError");
                errMsg.hidden = false;
            } 
        }
    };

    x.onerror = (event) => console.log(event);
    x.send(data);
}

function showPassword() {
    const checkbox = document.getElementById("showpassword");
    const pass = document.getElementById("password");
    if (checkbox.checked) {
        pass.type = "text";
    } else {
        pass.type = "password";
    }
}