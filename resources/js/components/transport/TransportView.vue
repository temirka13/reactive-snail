<template id="transport">
    <div class="container">
        <router-link class="btn btn-xs btn-primary" :to="{path: '/transport-page'}">
            <span class="glyphicon glyphicon-plus"></span>
            Назад
        </router-link>
        <br>
        <br>
        <div class="transport-card col-md-6">
            <h3>Транспорт</h3>
            <hr>
            <h5>Модель: <strong>{{ transport.model}}</strong></h5>
            <h5>Статус: <strong>{{ transport.status}}</strong></h5>
            <h5>Водитель: <strong>{{ transport.driver}}</strong></h5>
        </div>
        <br>
    </div>
</template>

<script>
export default {
    data: function(){
        return {
            transport: {
                model: '',
                status: '',
            }
        };
    },
    created: function(){
        let url = '/transport/'+this.$route.params.id;
        Axios.get(url).then((response) => {
            this.transport = response.data;
        });
    },
}
</script>
<style>
.transport-card{
    padding: 10px;
    border-radius: 3px;
    box-shadow: 0px 5px 15px rgba(41, 41, 41, 0.25);
}
</style>

