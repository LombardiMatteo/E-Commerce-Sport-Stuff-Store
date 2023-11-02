const form = document.getElementsByClassName("addForm");
for(let i=0; i<form.length; i++) {
    form[i].onsubmit = addForm;
}

            
function addForm(event){
    event.preventDefault();
    const target_form = event.target;
    let data = new FormData(target_form);
    let x = new XMLHttpRequest();
    x.open("POST", "../actions/addToCartAction.php");
    x.onload = () => {
        console.log(x.response);
        const response = JSON.parse(x.response);
        if (response["added"] === true) {
            console.log(response);
            const msg = document.getElementById("check_msg");
            msg.innerText = response["msg"];
            msg.style.display = "block";
            setTimeout(() => {
                msg.style.display = "none";
            }, 1500);
        } else {
            console.log(response);
            const msg = document.getElementById("check_msg");
            msg.innerText = response["msg"];
            msg.style.display = "block";
            setTimeout(() => {
                msg.style.display = "none";
            }, 1000);   
        }
    };

    x.onerror = (event) => console.log(event);
    x.send(data);
}