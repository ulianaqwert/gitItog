document.querySelector('.modal__entrance').addEventListener('click', (e) => {
    let error = 0;
    let street = document.querySelector('.street')
    let house = document.querySelector('.house')
    if (street.value === '') {
        error++
    }

    else if (house.value === '') {
        error++
    }

    if (error > 0) {
        document.querySelector('.modal__entrance').insertAdjacentHTML('beforebegin', '<p style="color: red;">Заполните все необходимые поля</p>')
    }

})

let tab = document.querySelectorAll('.tab');
let content = document.querySelectorAll('.tab-hidden')
tab.forEach(item => item.addEventListener('click', event => {
    let id = event.target.getAttribute('data-tab')
    tab.forEach(elem => elem.classList.remove('active'))
    content.forEach(elem => elem.classList.add('tab-hidden'))
    item.classList.add('active')
    console.log(id)
    document.getElementById(id).classList.remove('tab-hidden')
}))
document.querySelector('[for="del"]').classList.add('active')
document.getElementById('tab-1').classList.remove('tab-hidden')



let modalWrapperAddress = document.querySelector('.modal-wrapper-address')
let modalCloseAddress = document.querySelector('.closedAddress')
let form = document.querySelector('.ajax_deleteAddress')
let closeModalWindowAddress = () => {
    modalWrapperAddress.style.display = 'none'
}
document.addEventListener('click', (e) => {
    if (e.target.classList.contains('deleteAddress')) {
        modalWrapperAddress.style.display = 'block'
        let id = e.target.getAttribute('data-address')
        // console.log(id)
        // let form = document.querySelector('.ajax_deleteAddress')
        form.setAttribute('action', 'http://bougie/deleteAddress/' + id)
        form.setAttribute('data-id', id)
    }
})
modalCloseAddress.onclick = function () {
    closeModalWindowAddress()
}
modalWrapperAddress.addEventListener('click', (event) => {
    if (event.target == event.currentTarget)
        closeModalWindowAddress()
})
document.addEventListener('keyup', (e) => {
    if (e.code == 'Escape')
        closeModalWindowAddress()
})




