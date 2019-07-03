<template id="driver">
    <div class="container">
        <router-link class="btn btn-xs btn-primary" :to="{path: '/drivers-page'}">
            <span class="glyphicon glyphicon-plus"></span>
            Назад
        </router-link>
        <br>
        <br>
        <div class="driver-card col-md-6">
            <h3>Водитель</h3>
            <hr>
            <h5>Имя: <strong>{{ driver.first_name}}</strong></h5>
            <h5>Фамилия: <strong>{{ driver.second_name}}</strong></h5>
            <h5>Транспорт: <strong>{{ driver.transport}}</strong></h5>
        </div>
        <br>
    </div>
</template>

<script>
export default {
    data: function(){
        return {
            driver: {
                first_name: '',
                second_name: '',
            }
        };
    },
    created: function(){
        let url = '/drivers/'+this.$route.params.id;
        Axios.get(url).then((response) => {
            this.driver = response.data;
            console.log(response.data)
        });
    },
}
</script>
<style>
.driver-card{
    padding: 10px;
    border-radius: 3px;
    box-shadow: 0px 5px 15px rgba(41, 41, 41, 0.25);
}
</style>
