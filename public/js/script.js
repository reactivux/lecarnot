
/*** start Open left menu mobile */
const LeftMenuMobile = document.getElementsByClassName('liv-dropleft-cart');
const ToggleLeftMenu = document.querySelectorAll('.ToggleLeftMenu');
ToggleLeftMenu.forEach(element => {
    element.addEventListener('click', function () {
        LeftMenuMobile[0].classList.toggle('open-cart');
    });
});

/*** start Open right menu mobile */
const RightMenuMobile = document.getElementsByClassName('liv-dropright-cart');
const ToggleRightMenu = document.querySelectorAll('.ToggleRightMenu');
ToggleRightMenu.forEach(element => {
    element.addEventListener('click', function () {
        RightMenuMobile[0].classList.toggle('open-cart');
    });
});

/** Buttons delivery on version mobile */
// Get a reference to the "deliveryMode" element
// const deliveryModeElement = document.querySelector('.deliveryMode');
// // Check if the element exists
// if (deliveryModeElement) {
//     window.addEventListener('scroll', function () {
//         if (window.scrollY > 100) {
//             deliveryModeElement.classList.add('fixedTop');
//         } else {
//             deliveryModeElement.classList.remove('fixedTop');
//         }
//     });
// }



/*** Back to top ***/
// Get a reference to the "back to top" button element
const backToTopButton = document.getElementById('backToTopButton');
// Add a click event listener to the button
backToTopButton.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

// Add a scroll event listener to show/hide the button based on the scroll position
backToTopButton.style.display = 'none';
window.addEventListener('scroll', () => {
    if (document.body.scrollTop > 100) {
        backToTopButton.style.display = 'flex';
    } else {
        backToTopButton.style.display = 'none';
    }
});
/*** end Back to top ***/



// Function to update the class of elementX based on scroll
function updateStickyElementX() {
    const elementX = document.querySelector('.main_menu');
    const scrollY = window.scrollY || window.pageYOffset;
    const logo = document.getElementById('logo');
    // Set a threshold value for when to make elementX sticky (adjust as needed)
    const threshold = 200;
    // Check if the user has scrolled past the threshold
    if (scrollY >= threshold) {
        elementX.classList.remove('sticky-absolute');
        elementX.classList.add('sticky-fixed');
        logo.src = "../img/logo-le-cinq-5-black.webp"; // Change to black logo
    } else {
        elementX.classList.add('sticky-absolute');
        elementX.classList.remove('sticky-fixed');
        logo.src = "../img/logo-le-cinq-5-white.webp"; // Change to white logo
    }

    
}
// Check if the page is the homepage (root URL)
const isHomepage = window.location.pathname === '/';
if (isHomepage) {
    // Add a scroll event listener to update the elementX's class
    window.addEventListener('scroll', updateStickyElementX);
    // Call the function initially to set the initial class
    updateStickyElementX();
}