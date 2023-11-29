const form = document.getElementById("form"),
    registerBtn = form.querySelector("button.register"),
    signUpBtn = form.querySelector("button.signup");

form.onsubmit = (e) => {
    e.preventDefault();
}

registerBtn.onclick = () => {
    window.alert("this is the regigster button");
}

signUpBtn.onclick = () => {
    window.alert("this is the sign up button");
}