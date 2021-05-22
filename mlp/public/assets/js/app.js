const app = {
    init: function() {

        document.querySelector('.link-card').addEventListener("click", app.giftCardToggleHandler);

    },

    giftCardToggleHandler : function(event) {
        event.preventDefault();
        console.log('Function giftCardToggleHandler initialized');

        let giftCardElement = document.querySelector('.gift-card');
        giftCardElement.classList.toggle('invisible');

    },

}

document.addEventListener('DOMContentLoaded', app.init);