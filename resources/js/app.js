import './bootstrap';

AOS.init();

document.querySelectorAll('[data-aos]').forEach(e => {
    e.setAttribute('data-aos-duration', 1000);
});
