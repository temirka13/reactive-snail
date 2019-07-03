<template>
    <div>
        <div v-if="auth">
            <transition name="fade">
                <router-view></router-view>
            </transition>
        </div>
        <div v-else-if="path == '/'">
            <transition name="fade">
                <router-view></router-view>
            </transition>
        </div>
        <div v-else>
            <h1 class="error">Эта страница вам не доступна</h1>
        </div>
        
    </div>
</template>

<script>
    export default {
        data: function(){
            return{
                auth: '',
                path: ''
            }
        },
        mounted() {
            console.log('App Component mounted.')
        },
        created: function(){
            let url = '/auth/';
            Axios.get(url).then((response) => {
                this.auth = response.data;
            });
            this.path = window.location.pathname;
        },
    }
</script>
<style>
.error{
    text-align: center;
    margin-top: 30px;
    opacity: 1;
    animation: loader 1s ease-in-out;
}
@keyframes loader {
  0% {opacity: 0}
  50%{opacity: 0.5}
  100%{opacity: 1}
}
</style>
