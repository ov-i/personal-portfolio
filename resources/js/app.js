require('./bootstrap');
import Vue from 'vue'

const app = new Vue({
  el: '#app',
  delimiters: ['<%', '%>'],
  data: () => ({
    msg: 'Hello world!'
  })
})