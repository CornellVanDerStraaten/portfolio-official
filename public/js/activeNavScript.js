let currentLocation = location.href;
let menuItem = document.getElementById('headerNav').querySelectorAll('a');
let menuLength = menuItem.length;
for ( let i = 0; i < menuLength; i++){
    if(menuItem[i].href === currentLocation) {
        menuItem[i].className += ' header__link--active';
    }
}