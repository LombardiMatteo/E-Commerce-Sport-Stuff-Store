
const form = document.getElementById("registrationForm");

form.onsubmit = registrationForm;
            
function registrationForm(event){
    event.preventDefault();

    let data = new FormData(form);
    let x = new XMLHttpRequest();
    x.open("POST", "../actions/registrationAction.php");
    x.onload = () => {
        const response = JSON.parse(x.response);
        document.getElementById("pswdError").hidden = true;
        document.getElementById("eMailUsedYet").hidden = true;
        document.getElementById("usernameUsedYet").hidden = true;
        document.getElementById("noData").hidden = true;
        if (response["sign"] === true) {
            console.log(response);
            window.location.href = "login.php";
        } else {
            console.log(response);
            let errMsg;
            switch (response["error"]) {
                case 0:
                    errMsg = document.getElementById("passwordError");
                    errMsg.hidden = false;
                    break;
                
                case 1:
                    errMsg = document.getElementById("eMailUsedYet");
                    errMsg.hidden = false;
                    break;
                
                case 2:
                    errMsg = document.getElementById("usernameUsedYet");
                    errMsg.hidden = false;
                    break;

                case 3:
                    errMsg = document.getElementById("noData");
                    errMsg.hidden = false;
                    break;
                
                default:
                    break;
            }
        }
    };

    x.onerror = (event) => console.log(event);
    x.send(data);
}