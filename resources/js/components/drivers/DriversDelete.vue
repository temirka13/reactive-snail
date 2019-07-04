<template id="drivers-delete">
    <div class="container">
        <router-link class="btn btn-xs btn-primary" :to="{path: '/drivers-page'}">
            <span class="glyphicon glyphicon-plus"></span>
            Назад
        </router-link>
        <br>
        <br>
        <h3>Удалить водителя: {{driver.first_name}} {{driver.second_name}}</h3>
        <form v-on:submit.prevent = "deleteDriver">
            <p>Данное действие нельзя отменить</p>
            <button class="btn btn-xs btn-danger" type="submit" name="button">Удалить</button>
        </form>
    </div>
</template>

<script>
export default {
    data: function(){
        return {driver: {
            first_name: '',
            second_name: ''
        }};
    },
    created: function(){
        let url = '/drivers/'+this.$route.params.id+'edit';
        Axios.get(url).then((response) => {
                this.driver = response.data;
        });
    },
    methods: {
        deleteDriver: function(){
            let url = '/drivers/'+this.$route.params.id;
            Axios.delete(url, this.driver).then((response) =>{
                this.$router.push({name: 'DriversList'})
            });
        }
    }
}
</script>