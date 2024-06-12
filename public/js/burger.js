let visible = true;
document.querySelector('.burger').addEventListener('click', function () {
    // console.log(visible)
    document.querySelector('.info__ul').classList.toggle('header__open_burger')
    // document.querySelector('.nav__info').classList.toggle('header__open_burger')
})