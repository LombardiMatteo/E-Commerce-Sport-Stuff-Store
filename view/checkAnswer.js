const form = document.getElementById("answerForm");
const back = document.getElementById("back");

back.onclick = (event) => {
    event.preventDefault();
    window.location = "login.php";
};
form.onsubmit = answerForm;

function answerForm(event){
    event.preventDefault();

    let data = new FormData(form);
    let x = new XMLHttpRequest();
    x.open("POST", "../actions/checkAnswerAction.php");
    x.onload = () => {
        const response = JSON.parse(x.response);
        document.getElementById("wrongAnswer").hidden = true;
        if (response["check"] === true) {
            console.log(response);
            window.location.href = "resetPassword.php";
        } else {
            console.log(response);
            const errMsg = document.getElementById("wrongAnswer");
            errMsg.hidden = false;   
        }
    };

    x.onerror = (event) => console.log(event);
    x.send(data);
}