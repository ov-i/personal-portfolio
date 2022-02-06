require('./bootstrap');
import Vue from 'vue'
import '@iconify/iconify'
import SectionHeader from "./components/SectionHeader";

Vue.component('sectionheader', SectionHeader)

const app = new Vue({
  el: '#app',
  delimiters: ['<%', '%>'],
  data: () => ({
    dialog: false
  }),
  methods: {
      toggleDialog() {
          this.dialog = !this.dialog
      }
  },
})

const showNavButton = document.querySelector('#show-nav-button');
const mobileNav = document.querySelector('#nav-list')
const closeNav = document.querySelector('#close-nav')

console.log(showNavButton);
closeNav.addEventListener('click', () => {
    mobileNav.classList.add('hidden')
})

showNavButton.addEventListener('click', () => {
    console.log('ok')
    mobileNav.classList.remove('hidden')
})
