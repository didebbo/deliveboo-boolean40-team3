/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');

// const app = new Vue({
//     el: '#app',
//     render: h => h(App),
// });

const deleteButtons = document.querySelectorAll(".btn-delete");
const inputDeleteID = document.getElementById("delete-id");

deleteButtons.forEach(
  (elm) => {
    elm.addEventListener("click", function () {
      console.log(this.getAttribute("data-id"));
      inputDeleteID.value = this.getAttribute("data-id");
    });
  }
);