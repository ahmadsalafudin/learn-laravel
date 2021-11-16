require('./bootstrap');
// window.Vue = require('vue');

// Vue.component('example-component', require('./components/'))
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);

new Vue({
    el: '#app',
})