<template>
    <div>
        <div class="form-group center-block">
            <router-link :to="{name: 'createTask'}" class="btn btn-success">Создать заявку</router-link>
        </div>
 
        <div class="panel panel-default">
            <div class="panel-heading">Заявки</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr style="word-break: break-all;">
                        <th width="180px">Имя</th>
                        <th width="180px">Телефон</th>
                        <th>Текст</th>
                        <th width="80px">Место</th>
                        <!-- <th width="100">&nbsp;</th> -->
                    </tr>
                    </thead>
                    <tbody>
                    <tr style="word-break: break-all;" v-for="task, index in tasks">
                        <!-- console.log(task); -->
                        <td>{{ task.name }}</td>
                        <td>{{ task.phone }}</td>
                        <td>{{ task.text }}</td>
                        <td>{{ task.space }}</td>
                        <!-- кнопки удаления и редактирования -->
                        <!-- <td>
                            <router-link :to="{name: 'editTask', params: {id: task.id}}" class="btn btn-sm btn-danger">
                                Edit
                            </router-link>
                            <a href="#"
                               class="btn btn-sm btn-danger my-2"
                               v-on:click="deleteEntry(task.id, index)">
                                Delete
                            </a>
                        </td> -->
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data: function () {
            return {
                tasks: [],
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/v1/tasks')
                .then(function (resp) {
                    app.tasks = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load tasks");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/v1/tasks/' + id)
                        .then(function (resp) {
                            app.tasks.db.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete task");
                        });
                }
            }
        }
    }
</script>