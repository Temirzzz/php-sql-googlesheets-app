let name = document.querySelector('.name-input');
let lastname = document.querySelector('.lastname-input');
let age = document.querySelector('.age-input');


document.querySelector('.btn-save').onclick = (e) => {
    e.preventDefault();
    if (name.value == '' || lastname.value == '' || age.value == '') {
        inputCheck();
        return false;
    }
    if (age.value == NaN) {
        console.log('Не число');

    }
    else {
        fetch("./insert.php", {
            method: "POST",
            body: JSON.stringify({
                'name': name.value.trim(),
                'lastname': lastname.value.trim(),
                'age': age.value.trim()
            })
        })
            .then(response => response.text())
            .then(response => {
                console.log(response);
                if (response == 1) {
                    succsess();
                }
            })
    }
}

document.querySelector('.btn-load').onclick = (e) => {
    e.preventDefault();

    fetch("./googlesheets.php", {
        method: "POST"
    })
        .then(response => response.text())
        .then(response => {
            console.log('Sent');
        })

}

// ------------------------ chips -----------------------------

function succsess() {
    let chips = document.createElement('div');
    chips.classList.add('chips');
    let message = document.createTextNode("Данные успешно сохранены!");
    chips.appendChild(message);
    let chiepsField = document.querySelector('.chieps-field');
    chiepsField.appendChild(chips);

    setTimeout(() => {
        chips.remove();
    }, 3000)
}

function inputCheck() {
    let chips = document.createElement('div');
    chips.classList.add('chips');
    let message = document.createTextNode("Заполните все поля!");
    chips.appendChild(message);
    let chiepsField = document.querySelector('.chieps-field');
    chiepsField.appendChild(chips);

    setTimeout(() => {
        chips.remove();
    }, 3000)
}