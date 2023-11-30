const form = document.querySelector('form'),
    registerBtn = form.querySelector('button.register'),
    signInBtn = form.querySelector('button.signin');


form.onsubmit = (e) => {
    e.preventDefault();
}

registerBtn.onclick = () => {
    console.log('this is the register button');

    const xhr = new XMLHttpRequest();

    xhr.open("POST", "api.php/register", true)

    xhr.onload = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {

                } else {
                    console.log(data);
                }
            }
        }
    };

    // Set up a callback for network errors
    xhr.onerror = function () {
        console.log("Network Error");
    };

    let formData = new FormData(form);
    // Send the request
    xhr.send(formData);
}

signInBtn.onclick = () => {
    console.log('this is the sign in button')
}

function checkStatus() {
    
}