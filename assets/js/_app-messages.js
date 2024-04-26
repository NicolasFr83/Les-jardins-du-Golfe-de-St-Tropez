const contactFormSent = document.getElementById('js-contact-form-sent');

if (contactFormSent) {
    setTimeout(() => {
        contactFormSent.classList.add('hide-message')
    }, 3000);
}

const OpinionSent = document.getElementById('js-opinion-sent');

if (OpinionSent) {
    setTimeout(() => {
        OpinionSent.classList.add('hide-message')
    }, 3000);
}