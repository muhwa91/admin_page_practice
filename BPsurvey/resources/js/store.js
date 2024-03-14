import { createStore } from 'vuex';
import Vuex from 'vuex';
import router from '../js/router.js';
import axios from "axios";

const store = createStore({

    state() {
        return {

        }
    },

    mutations: {
        
    },

    actions: {
        // adminLogin({commit}, {adminId, adminPw}) {
        //     const URL = '/admin';            
        //     const formData = new FormData();
        //     formData.append('admin_number', adminId);
        //     formData.append('admin_password', adminPw);

        //     axios.post(URL, formData, {
        //         headers: {
        //             'Content-Type': 'multipart/form-data',
        //         }
        //     })
        //     .then(res => {
        //         if (res.data.code === "ad01" || res.data.code === "ad02") {
        //             const token = res.data.token;
        //             // Admin token 저장
		// 			commit('setAdminToken', token);
		// 			// 로컬스토리지 내 token 저장
        //             localStorage.setItem('admin_token', token);
		// 			router.push('/admin/index');
        //         }
        //     })
        //     .catch(err => {
        //         alert('네트워크 오류가 발생했습니다. 페이지를 새로고침 후 다시 로그인해주세요');
        //     });
        // }
    }
});

export default store;