const defaultNav = document.getElementById('default-nav');
const formNav = document.getElementById('form-nav');
const searchSwitcher = document.getElementById('search-switcher');

const burgerButtons = document.querySelectorAll('.burger');
const sideBar = document.getElementById('sidebar');

const sideBarBackground = document.getElementById('sidebar-bg');

const categoryButton = document.getElementById('category-button');
const profileButton = document.getElementById('profile-button');
const categorySection = document.getElementById('category-section');
const profileSection = document.getElementById('profile-section');

searchSwitcher.addEventListener('click', function() {
    defaultNav.classList.remove('flex');
    defaultNav.classList.add('hidden');
    formNav.classList.remove('hidden');
    formNav.classList.add('flex');
});

burgerButtons.forEach(burgerButton => burgerButton.addEventListener('click', function() {
    sideBar.classList.remove('hidden');
    sideBar.classList.add('flex');
}));

sideBarBackground.addEventListener('click', function() {
    sideBar.classList.remove('flex');
    sideBar.classList.add('hidden');
});

categoryButton.addEventListener('click', function() {
    profileButton.classList.remove('selected-grey');
    categoryButton.classList.add('selected-grey');
    profileSection.classList.add('hidden');
    categorySection.classList.remove('hidden');
})

profileButton.addEventListener('click', function() {
    categoryButton.classList.remove('selected-grey');
    profileButton.classList.add('selected-grey');
    categorySection.classList.add('hidden');
    profileSection.classList.remove('hidden');
})
