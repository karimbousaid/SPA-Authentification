import Home from './components/Home.vue';
import Register from './components/Register.vue';
import Login from './components/Login.vue';



export default [
    {
        path : '/',
        component : Home,
        name : 'home'
    },
    {
        path : '/register',
        component : Register,
        name : 'Register'
    },
    {
        path : '/login',
        component : Login,
        name : 'Login'
    }
]