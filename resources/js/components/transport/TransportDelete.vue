<template id="transport-delete">
    <div class="container">
        <router-link class="btn btn-xs btn-primary" :to="{path: '/transport-page'}">
            <span class="glyphicon glyphicon-plus"></span>
            Назад
        </router-link>
        <br>
        <br>
        <h3>Удалить транспорт: {{transport.model}} {{transport.status}}</h3>
        <form v-on:submit.prevent = "deleteTransport">
            <p>Данное действие нельзя отменить!</p>
            <button class="btn btn-xs btn-danger" type="submit" name="button">Удалить</button>
        </form>
    </div>
</template>

<script>
export default {
    data: function(){
        return {transport: {
            model: '',
            status: ''
        }};
    },
    created: function(){
        let url = 'http://127.0.0.1:8000/transport/'+this.$route.params.id+'edit';
        Axios.get(url).then((response) => {
                this.transport = response.data;
        });
    },
    methods: {
        deleteTransport: function(){
            let url = 'http://127.0.0.1:8000/transport/'+this.$route.params.id;
            Axios.delete(url, this.transport).then((response) =>{
                this.$router.push({name: 'TransportList'})
            });
        }
    }
}
</script>