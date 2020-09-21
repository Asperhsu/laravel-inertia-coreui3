// require('./bootstrap');

import 'core-js/stable'
import Vue from 'vue'
import VueMeta from 'vue-meta'
import CoreuiVue from '@coreui/vue'
import { InertiaApp } from '@inertiajs/inertia-vue'
import App from './Layouts/App';
import store from './store/index'

Vue.config.performance = true;
Vue.mixin({ methods: { $route: window.route } })
Vue.use(InertiaApp);
Vue.use(VueMeta);
Vue.use(CoreuiVue);

const app = document.getElementById('app');
const appName = document.title;

new Vue({
    store,
    metaInfo: {
        titleTemplate: title => title ? `${title} - ${appName}` : appName
    },
    render: h => h(InertiaApp, {
        props: {
            initialPage: JSON.parse(app.dataset.page),
            resolveComponent: name => import(`@/Pages/${name}`).then(module => {
                if (!module.default.layout) {
                    module.default.layout = App
                }

                return module.default;
            }),
        }
    })
}).$mount(app);
