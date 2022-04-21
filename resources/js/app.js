require('./bootstrap');

import { createApp } from 'vue'
import '@iconify/iconify'
import SectionHeader from "./components/SectionHeader";

const app = createApp({
  compilerOptions: {
      delimiters: ["${", "}"]
  },
  data: () => ({
    dialog: false,
    comment: '',
    commentLength: 0,
  }),
  components: {
      SectionHeader,
  },
  methods: {
      toggleDialog() {
          this.dialog = !this.dialog
      },
      increaseCounter() {
          if (!this.comment.trim().length)
              this.commentLength = 0

          this.commentLength = this.comment.trim().length
      }
  },
})

app.component('sectionheader', SectionHeader)
app.mount('#app')

const showNavButton = document.querySelector('#show-nav-button');
const mobileNav = document.querySelector('#nav-list')
const closeNav = document.querySelector('#close-nav')

closeNav.addEventListener('click', () => {
    mobileNav.classList.add('hidden')
})

showNavButton.addEventListener('click', () => {
    console.log('ok')
    mobileNav.classList.remove('hidden')
})
