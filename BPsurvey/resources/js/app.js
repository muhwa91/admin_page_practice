require('./bootstrap');

import { createApp } from 'vue';
import AppComponent from '../components/AppComponent.vue';
// import HeaderComponent from '../components/Layout/HeaderComponent.vue';
// import FooterComponent from '../components/Layout/FooterComponent.vue';
import store from './store.js';
import router from './router.js';
        

const app = createApp({
	components: {
		AppComponent,
		// HeaderComponent,
		// FooterComponent,
	}
})
.use(store)
.use(router)
app.mount('#app')  //마운트 처리