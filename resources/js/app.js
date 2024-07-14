/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('admin-lte');

window.Vue = require('vue').default;

import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
import "mdi-icons/css/materialdesignicons.min.css";
import moment from 'moment';

Vue.use(Vuetify);






Vue.filter('momentDate', function(datevalue){
    return moment(datevalue).format('MM-DD-YYYY');
})
Vue.filter('profiledate', function(datevalue){
    return moment(datevalue).format('HH:mm  DD.MM.YYYY');
})
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('admin-dash', require('./components/admin/Dashboard.vue').default);
Vue.component('account-component', require('./components/admin/Account.vue').default);
Vue.component('company-component', require('./components/admin/Company.vue').default);
Vue.component('trainer-component', require('./components/admin/Trainer.vue').default);
Vue.component('manager-component', require('./components/admin/Manager.vue').default);
Vue.component('student-component', require('./components/admin/Student.vue').default);

Vue.component('company-edary', require('./components/manager/Company.vue').default);
Vue.component('man-dash', require('./components/manager/Dashboard.vue').default);
Vue.component('course-component', require('./components/manager/Course.vue').default);
Vue.component('mngstudent-component', require('./components/manager/Student.vue').default);
Vue.component('mngtrainer-component', require('./components/manager/Trainer.vue').default);

Vue.component('reg-student', require('./components/register/Student.vue').default);
Vue.component('reg-company', require('./components/register/Company.vue').default);
Vue.component('reg-trainer', require('./components/register/Trainer.vue').default);

Vue.component('student-course', require('./components/student/studentCourse.vue').default);

Vue.component('company-dash', require('./components/company/Dashboard.vue').default);
Vue.component('course-company', require('./components/company/Course.vue').default);
Vue.component('courses-company', require('./components/company/MyCourses.vue').default);
Vue.component('trainer-company', require('./components/company/Trainer.vue').default);
Vue.component('students-company', require('./components/company/Student.vue').default);


Vue.component('trainer-dash', require('./components/trainer/Dashboard.vue').default);
Vue.component('trainer-course', require('./components/trainer/Course.vue').default);




/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    vuetify : new Vuetify(),
    el: '#app',
});
