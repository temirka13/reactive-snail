<template id="transport">
    <div class="container">
        <router-link class="btn btn-xs btn-primary" :to="{path: '/transport-page'}">
            <span class="glyphicon glyphicon-plus"></span>
            Назад
        </router-link>
        <br>
        <br>
        <h3>Транспорт</h3>
        <h5>Модель: <strong>{{ transport.model}}</strong></h5>
        <h5>Статус: <strong>{{ transport.status}}</strong></h5>
        <br>
        <span class="glyphicon glyphicon-arrow-left"></span>
    </div>
</template>

<script>
export default {
    data: function(){
        return {transport: {
            model: '',
            status: '',
        }};
    },
    created: function(){
        let url = 'http://127.0.0.1:8000/transport/'+this.$route.params.id;
        Axios.get(url).then((response) => {
            this.transport = response.data;
        });
    },
}
</script>

