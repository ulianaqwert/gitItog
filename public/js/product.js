let tab = document.querySelectorAll('.tab');
let content = document.querySelectorAll('.tab-hidden')
tab.forEach(item => item.addEventListener('click', event => {
    let id = event.target.getAttribute('data-tab')
    tab.forEach(elem=>elem.classList.remove('active'))
    content.forEach(elem=>elem.classList.add('tab-hidden'))
    item.classList.add('active')
    document.getElementById(id).classList.remove('tab-hidden')
}))

document.querySelector('[data-tab="tab-1"]').classList.add('active')
document.getElementById('tab-1').classList.remove('tab-hidden')