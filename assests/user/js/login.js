document.getElementById('login-btn').addEventListener('click', function() {
    document.getElementById('login-form').classList.add('active-form');
    document.getElementById('register-form').classList.remove('active-form');
    var button = document.getElementById("login-btn");
    button.style.backgroundColor = "brown";
    button.style.borderColor = "white";
    button.style.color = "white";
    var button = document.getElementById("register-btn");
    button.style.backgroundColor = "white";
    button.style.borderColor = "brown";
    button.style.color = "brown";

});

document.getElementById('register-btn').addEventListener('click', function() {
    document.getElementById('register-form').classList.add('active-form');
    document.getElementById('login-form').classList.remove('active-form');
    var button = document.getElementById("register-btn");
    button.style.backgroundColor = "brown";
    button.style.borderColor = "white";
    button.style.color = "white";
    var button = document.getElementById("login-btn");
    button.style.backgroundColor = "white";
    button.style.borderColor = "brown";
    button.style.color = "brown";
});