/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';

import 'flowbite';

const navbarBtn = document.querySelector(".close-profile-bar");
const profileMenu = document.querySelector(".profile-menu");

navbarBtn.addEventListener("click", () => {
    let results = profileMenu.classList.contains('invisible');
    if(results){
        profileMenu.classList.remove('invisible');
        profileMenu.classList.add('visible');
    } else {
        profileMenu.classList.remove('visible');
        profileMenu.classList.add('invisible');
    }
});