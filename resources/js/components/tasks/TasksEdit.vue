<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-success">Назад</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Редактирование заявки</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Имя</label>
                            <input type="text" v-model="task.name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Телефон</label>
                            <input type="text" v-model="task.phone" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Текст</label>
                            <input type="text" v-model="task.text" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Изменить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.taskId = id;
            axios.get('/api/v1/tasks/' + id)
                .then(function (resp) {
                    app.task = resp.data;
                })
                .catch(function () {
                    alert("Could not load your company")
                });
        },
        data: function () {
            return {
                taskId: null,
                task: {
                    name: '',
                    phone: '',
                    text: '',
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newTask = app.task;
                axios.patch('/api/v1/tasks/' + app.taskId, newTask)
                    .then(function (resp) {
                        app.$router.replace('/');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your task");
                    });
            }
        }
    }
</script>