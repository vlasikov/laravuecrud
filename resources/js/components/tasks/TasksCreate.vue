<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-success">Назад</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Создание заявки</div>
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
                            <label class="control-label">Место</label>
                            <select v-model="task.space" class="browser-default custom-select">
                            <option value="db">DataBase</option>
                            <option value="file">File</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Создать</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                task: {
                    name: '',
                    phone: '',
                    text: '',
                    space: 'db',
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newTask = app.task;
                axios.post('/api/v1/tasks', newTask)
                    .then(function (resp) {
                        app.$router.push({path: '/'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your task");
                    });
            }
        }
    }
</script>