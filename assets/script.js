let menu = document.querySelector('#menu-btn')
let navbar = document.querySelector('nav')

menu.onclick = () => {
    navbar.classList.toggle('active')
    menu.classList.toggle('fa-times')
}

window.onscroll = () => {
    navbar.classList.remove('active')
    menu.classList.remove('fa-times')
}

if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href )
}

x = () => {
    let alert = document.getElementById("pazinojums")
    alert.style.display = "none"
}

document.addEventListener('DOMContentLoaded', function() {
    const header = document.querySelector('header')
    const menuBtn = document.getElementById('menu-btn')
    const currentPage = window.location.pathname.split('/').pop() || 'index.php'

    function updateMenuBtnStyles() {
        if (window.scrollY > 150 || currentPage !== 'index.php' || window.innerWidth <= 767) {
            header.classList.add('scrolled')
            menuBtn.classList.add('scrolled')
        } else {
            header.classList.remove('scrolled')
            menuBtn.classList.remove('scrolled')
        }
    }

    updateMenuBtnStyles()

    window.addEventListener('scroll', updateMenuBtnStyles)
})

function toggleContent(button) {
    const expandedContent = document.querySelector('.box .content.expanded')
    if (expandedContent && expandedContent !== button.nextElementSibling) {
        expandedContent.classList.remove('expanded')
        expandedContent.style.display = 'none'
        expandedContent.previousElementSibling.textContent = 'Vairāk'
    }

    const content = button.nextElementSibling;
    if (content.style.display === 'none' || !content.style.display) {
        content.style.display = 'block'
        content.classList.add('expanded')
        button.textContent = 'Mazāk'
    } else {
        content.style.display = 'none'
        content.classList.remove('expanded')
        button.textContent = 'Vairāk'
    }
}

document.querySelectorAll('.box .content').forEach(content => {
    content.style.display = 'none'
})