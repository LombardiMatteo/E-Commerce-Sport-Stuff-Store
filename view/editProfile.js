const form = document.getElementById("editForm");
const cancel = document.getElementById("cancel");

cancel.onclick = (event) => {
    event.preventDefault();
    window.location = "profile.php";
};
form.onsubmit = editForm;
            
function editForm(event){
    event.preventDefault();

    let data = new FormData(form);
    let x = new XMLHttpRequest();
    x.open("POST", "../actions/editProfileAction.php");
    x.onload = () => {
        const response = JSON.parse(x.response);
        document.getElementById("usernameUsedYet").hidden = true;
        document.getElementById("noData").hidden = true;
        if (response["sign"] === true) {
            // reindirizzamento
            window.location.href = "profile.php";
        } else {
            console.log(response);
            if(response["error"] == 0){
                const errMsg = document.getElementById("noData");
                errMsg.hidden = false;
            } else {
                const errMsg = document.getElementById("usernameUsedYet");
                errMsg.hidden = false;
            }    
        }
    };

    x.onerror = (event) => console.log(event);
    x.send(data);
}