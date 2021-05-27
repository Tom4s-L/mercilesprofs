/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';
import './images/dark.svg';
import './images/yoda.svg';

// start the Stimulus application
// import './bootstrap';


const app = {
    init: function() {

        if (document.querySelector('.link-card')) {
            document.querySelector('.link-card').addEventListener("click", app.giftCardToggleHandler);
        }

        document.querySelector('.print-btn').addEventListener("click", app.printToPdf);
        
    },

    giftCardToggleHandler : function(event) {
        event.preventDefault();
        console.log('Function giftCardToggleHandler initialized');

        let giftCardElement = document.querySelector('.gift-card');
        giftCardElement.classList.toggle('invisible');

    },

    printToPdf : function(event) {
        event.preventDefault();
        console.log('ok');
        
        var printContents = document.querySelector('#posts').innerHTML;    
        var originalContents = document.body.innerHTML;  

        document.body.innerHTML = printContents;     
        window.print();     
        document.body.innerHTML = originalContents;
    },

}

document.addEventListener('DOMContentLoaded', app.init);


