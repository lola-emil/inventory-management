document.querySelectorAll("input[type='number']")
.forEach(val => 

val.addEventListener("keypress", function (evt) {
    if (evt.key === 'e' || evt.key === '+' || evt.key === '-') {
        evt.preventDefault();
    }
}));