
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

Vue.component('example-component', require('./components/ExampleComponent.vue'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});

let addFileButton = document.getElementById('add-file-button');
let firstFileInput = document.getElementById('music_file[0]');
let fileInputIndex = 0;

addFileButton.addEventListener('click', addFileInput);

function addFileInput(event) {
    fileInputIndex++;
    let musicFileID = 'music_file[' + fileInputIndex + ']';
    let fileInputElem = document.createElement('input');
    let fileInputLabelElem = document.createElement('input');
    fileInputElem.setAttribute('type', 'file');
    fileInputElem.setAttribute('name', musicFileID);
    fileInputElem.setAttribute('id', musicFileID);
    fileInputLabelElem.setAttribute('for', musicFileID);
    fileInputLabelElem.textContent = 'Music file' + (fileInputIndex + 1);

    document.body.appendChild(fileInputElem);
}

function insertAfter(newNode, referenceNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}
