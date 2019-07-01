<template id="driver">
    <div class="container">
        <router-link class="btn btn-xs btn-primary" :to="{path: '/drivers-page'}">
            <span class="glyphicon glyphicon-plus"></span>
            Назад
        </router-link>
        <br>
        <br>
        <h3>Водитель</h3>
        <h5>Имя: <strong>{{ driver.first_name}}</strong></h5>
        <h5>Фамилия: <strong>{{ driver.second_name}}</strong></h5>
        <br>
        <span class="glyphicon glyphicon-arrow-left"></span>
    </div>
</template>

<script>
export default {
    data: function(){
        return {driver: {
            first_name: '',
            second_name: '',
        }};
    },
    created: function(){
        let url = 'http://127.0.0.1:8000/drivers/'+this.$route.params.id;
        Axios.get(url).then((response) => {
            this.driver = response.data;
        });
    },
}
</script>

