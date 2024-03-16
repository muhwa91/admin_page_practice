import { createWebHistory, createRouter } from 'vue-router';
import AppComponent from '../components/AppComponent.vue';
import IndexComponent from '../components/IndexComponent.vue'
import UserLoginComponent from '../components/User/UserLoginComponent.vue';
import UserRegisterComponent from '../components/User/UserRegisterComponent.vue';
import AdminLoginComponent from '../components/Admin/AdminLoginComponent.vue';
import AdminIndexComponent from '../components/Admin/AdminIndexComponent.vue';

const routes = [
	{
		path: '/',
		component: IndexComponent
	},
	{
		path: '/login',
		component: UserLoginComponent
	},
	{
		path: '/register',
		component: UserRegisterComponent
	},
	{
		path: '/admin',
		component: AdminLoginComponent,
	},
	{
		path: '/admin/index',
		component: AdminIndexComponent
	},
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

export default router;