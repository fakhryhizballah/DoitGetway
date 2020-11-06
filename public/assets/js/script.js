// $('.item').on('click', function(){
//     $('.Bottom-Menu').removeClass('active');
// $(this).addClass('active');
// })

const currentLocation = location.href;
const menuItem = document.querySelectorAll('.item');
const menuLength = menuItem.length
for (let i = 0; i < menuLength; i++) {
    if (menuItem [i].href === currentLocation) {
        menuItem[i].className = "item active"
    }
    
}