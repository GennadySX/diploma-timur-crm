<template>
    <div class="row">
        <div class="col-md-12">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                Создать новый
            </button>

            <div class="x_panel">
                <div class="x_content">
                    <!-- start project list -->
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 1%">#</th>
                            <th style="width: 20%">Название</th>
                            <th>Испольнители</th>
                            <th>Статус прогресса</th>
                            <th>Статус</th>
                            <th style="width: 20%">#Изменить</th>
                        </tr>
                        </thead>
                        <tbody v-if="list">
                        <tr v-for="(task, index) in list" :key="index">
                            <td>#</td>
                            <td>
                                <a>{{task.description}}</a>
                                <br />
                                <small>{{task.created_at}}</small>
                                <small>{{task.priority}}</small>
                            </td>
                            <td>
                                <ul class="list-inline" v-if="task.team" >
                                    <li v-for="(executor, i) in task.team" :key="i">
                                        <img :src="executor.user.avatar" class="avatar" :alt="`${executor.user.firstName} ${executor.user.lastName}` ">
                                    </li>
                                </ul>
                            </td>
                            <td class="project_progress">
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="57"></div>
                                </div>
                                <small>57% Complete</small>
                            </td>
                            <td>
                                <button type="button" class="btn btn-success btn-xs">Success</button>
                            </td>
                            <td>
                                <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <!-- end project list -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {API} from "../../../constants/API";

    export default {
        name: "task",
        props: {},
        components: {
        },
        data() {
            return {
                list: null
            }
        },
        created() {
            this.realizeIt();
            //console.log('data', this.list)
        },
        methods: {
            created(data) {this.callList.push(data)},
            realizeIt() {
                axios.get(API.taskList).then(({data}) =>{
                    console.log('task list ', data)
                    this.list = data.list
                })
            }
        }
    }
</script>


