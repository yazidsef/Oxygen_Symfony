/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/admin/main-admin.scss';
import './styles/admin/course.scss';
import './styles/admin/table.scss';
import './styles/admin/modal-course.scss';

// start the Stimulus application
import './bootstrap';
function updateImage(url, modalId) {
    const imgElement = document.querySelector(`#${modalId} #preview-image`);
    if (url.trim() === '') {
        imgElement.src = imgElement.dataset.defaultUrl;
    } else {
        imgElement.src = url;
    }
}
function getModalIdFromUrl() {
    const fragment = window.location.hash.substring(1); // Exclude the leading #
    return fragment;
}
document.addEventListener('DOMContentLoaded', function() {
    const imageUrlInput = document.querySelector('#image-url-input');

    imageUrlInput.addEventListener('input', function(event) {
        const imageUrl = event.target.value;
        const modalId = getModalIdFromUrl();
        updateImage(imageUrl, modalId);
    });
});




