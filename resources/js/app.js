import CommentPost from "./components/CommentPost";

require('./bootstrap');
import Vue, { createApp } from 'vue'
import '@iconify/iconify'
import SectionHeader from "./components/SectionHeader";

const app = createApp({
  compilerOptions: {
      delimiters: ["${", "}"]
  },
  data: () => ({
    dialog: false,
    comment_length: 0,
    comment: ''
  }),
  components: {
      SectionHeader,
      CommentPost,
  },
  methods: {
      toggleDialog() {
          this.dialog = !this.dialog
      },
      increaseCounter() {
          this.comment_length = this.comment.length
      }
  },
})

app.component('sectionheader', SectionHeader)
app.component('commentoost', CommentPost)

app.mount('#app')

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
