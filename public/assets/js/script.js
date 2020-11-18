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

const flashError = $(".flash-Error").data("flashdata");
console.log(flashError);
if (flashError) {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: flashError,
    })
}

const flashSuccess = $(".flash-Success").data("flashdata");
console.log(flashSuccess);
if (flashSuccess) {
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: flashSuccess,
    })
}