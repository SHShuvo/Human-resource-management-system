import './bootstrap';

window.Vue = require('vue');

import { Form, HasError, AlertError } from 'vform';
window.Form=Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

import moment from 'moment'
window.moment=moment;

Vue.filter('rdate',function(mdate){
  return moment(mdate).format('MMM Do YYYY');
});

window.Fire=new Vue();

import swal from 'sweetalert2'
window.swal=swal;

const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

window.toast=toast;

import DatePicker from 'vue2-datepicker'
window.DatePicker=DatePicker;

import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '4px'
})

import VueRouter from 'vue-router';
Vue.use(VueRouter);

let routes = [
    { path: '/admin', component: require('./components/newAdmin.vue').default,
      children:[
          { path: 'set-working-days', component:require('./components/settings/Set-working-days.vue').default},
          { path: 'settings-general', component:require('./components/settings/Settings-general.vue').default},
          { path: 'holiday-list', component:require('./components/settings/Holiday-list.vue').default},
          { path: 'add-department', component:require('./components/settings/AddDepartment.vue').default},
          { path: 'view-department', component:require('./components/settings/ViewDepartment.vue').default},
          { path: 'add-employee', component:require('./components/employee/AddEmployee.vue').default},
          { path: 'view-employee', component:require('./components/employee/ViewEmployee.vue').default},
         
      ]
    },
  ]

const router = new VueRouter({
    mode:'history',
    routes // short for `routes: routes`
}) 

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
