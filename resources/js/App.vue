<template>
    <div>
        <navbar :app="this"></navbar>
        <div class="container mt-3">
            <router-view :app="this"></router-view>
        </div>
    </div>
</template>
<script>
import Navbar from './components/Navbar.vue'
export default {
    components: {
        Navbar
    },
    mounted() {
        this.init();
    },
    data() {
        return {
            user: null,
            req: axios.create({
                baseUrl: BASE_URL
            })
        }
    },
    methods: {
        init() {
            this.req.get("auth/init").then(response => {
              this.user = response.data;
            });
        }
    }
};
</script>