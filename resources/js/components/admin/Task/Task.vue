<template>
    <div class="row">
        <div class="col-md-12">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter"
                    @click="show()">
                Создать новый
            </button>

            <v-modal name="task">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Новая задача</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>
                        <form class="form-horizontal form-label-left" id="newTask">

                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Название</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <input type="text" name="name" class="form-control" v-model="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Стоимость (.руб)</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <input type="number" name="cost" class="form-control" v-model="cost">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Приоритетность</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <select name="proirity" class="form-control " value="a" v-model="proirity">
                                        <option value="a" class="text-danger font-weight-bold" selected>Срочно</option>
                                        <option value="b">Средний</option>
                                        <option value="c">Не срочно</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Статус</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <select name="status" id="s" class="form-control " value="p" v-model="status">
                                        <option value="p" class="text-danger font-weight-bold" selected>Активно</option>
                                        <option value="s">Отложено</option>
                                        <option value="e">Не активно</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Дата окончания</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <date-picker class="w-100" type="date"
                                                 format="DD.MM.YYYY"
                                                 lang="ru-RU"
                                                 name="expire_date"
                                                 v-model="expire_date"></date-picker>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Описание</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <input type="text" class="form-control" name="description" v-model="description">
                                </div>
                            </div>
                            <div class="ln_solid"></div>

                            <div class="form-group row ">
                                <div class="col-md-12 offset-md-3 bottom-content">
                                    <button class="btn btn-success" @click="createTask('newTask', $event)">Сохранить
                                    </button>
                                    <a class="btn btn-default" @click="hide()">Отменить</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </v-modal>

            <v-modal name="confirmRemove">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Убрать исполнителя</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <h3 class="text-center">Вы действительно хотите убрать исполнителя ?</h3>
                        <br/>

                        <div class="col-12 d-flex justify-content-around text-center">
                            <button type="submit" class="btn btn-danger" @click="removeFromTask()">Да</button>
                            <a class="btn btn-default" @click="hide('confirmRemove')">Отменить</a>
                        </div>
                    </div>
                </div>
            </v-modal>

            <v-modal name="removeTask">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Удаление задачи</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <h3 class="text-center">Вы действительно хотите удалить задачу ?</h3>
                        <br/>

                        <div class="col-12 d-flex justify-content-around text-center">
                            <button class="btn btn-danger" @click="deleteTask($event)">Да</button>
                            <a class="btn btn-default" @click="hide('confirmRemove')">Отменить</a>
                        </div>
                    </div>
                </div>
            </v-modal>

            <v-modal name="userTask">
                <div class="x_content ">
                    <div class="x_title">
                        <h2>Список сотрудников</h2>
                        <div class="clearfix"></div>
                    </div>
                    <ul class="list-unstyled top_profiles scroll-view " v-if="userList">
                        <li class="media event" v-for="(user, index) in userList" :key="index" @click="userAdd(user)">
                            <a class="pull-left border-aero profile_thumb">
                                <img :src="user.avatar" class="avatar-x">
                            </a>
                            <div class="media-body">
                                <a class="title" href="#">{{user.firstName}} {{user.lastName}}</a>
                                <p>Сотрудник</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </v-modal>

            <v-modal name="taskEdit"
                     height="auto"
            >
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Загрузите файл</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="">
                        <vue-dropzone
                            v-on:vdropzone-sending="sendingEvent"
                            ref="myVueDropzone"
                            id="dropzone"
                            :options="dropzoneOptions"
                            @ma
                        ></vue-dropzone>
                    </div>
                </div>
            </v-modal>

            <v-modal name="taskView"
                     height="auto"
            >
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Просмотр файлов</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="" v-if="currentTask && currentTask.file">
                        <a class="btn btn-app" v-for="(file, index) in currentTask.file" :key="file.id" :href="file.path">
                            <i class="fa fa-inbox"></i>  {{file.name}}
                            <br>

                        </a>
                    </div>

<!--                    <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Скачать файл</button>-->
                </div>
            </v-modal>

            <div class="x_panel">
                <div class="x_content">
                    <!-- start project list -->
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 1%">#</th>
                            <th style="width: 20%">Название</th>
                            <th class="text-center">Стоимость</th>
                            <th class="text-center">Приоритетность</th>
                            <th>Испольнители</th>
                            <th>Статус прогресса</th>
                            <th class="text-center">Выберете действие</th>
                            <th>Статус</th>
                        </tr>
                        </thead>
                        <tbody v-if="list">
                        <tr v-for="(task, index) in list" :key="index" >
                            <td>{{index}}</td>
                            <td>
                                <a>{{task.name}}</a>
                                <br/>
                                <small>{{task.description}}</small>
                            </td>
                            <td class="text-center">
                                <strong>{{task.cost}} руб</strong>
                            </td>
                            <td class="text-center">
                                <strong class="text-danger " v-if="task.priority === 'a'">Срочно</strong>
                                <strong class="text-warning " v-else-if="task.priority === 'b'">Средний</strong>
                                <strong class="text-primary  " v-else>Не срочно</strong>
                            </td>
                            <td>

                                <ul class="list-inline" v-if="task.team">
                                    <li v-for="(executor, i) in task.team" :key="i">
                                        <img :src="executor.user.avatar" class="avatar"
                                             :alt="`${executor.user.firstName} ${executor.user.lastName}` "
                                             @click="userCard(task, executor)">
                                    </li>

                                    <li>
                                        <img src="/public/admin/images/plus.png" class="add-user avatar"
                                             @click="userAddCard(task)">
                                    </li>
                                </ul>
                            </td>
                            <td class="project_progress">
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar"
                                         data-transitiongoal="57"></div>
                                </div>
                                <small>{{index*5+10}}% сделано</small>
                            </td>

                            <td class="x-change">
                                <a href="#" class="btn btn-primary btn-xs"
                                @click="taskView(task)"
                                ><i class="fa fa-eye"></i> </a>
                                <a href="#" class="btn btn-info btn-xs" @click="taskEdit(task)"><i
                                    class="fa fa-pencil"></i> </a>
                                <a href="#" class="btn btn-danger btn-xs" @click="taskRemove(task)"><i
                                    class="fa fa-trash-o"></i> </a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-success btn-xs" @click="finishIt(task)">Завершить</button>
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
    import DatePicker from 'vue2-datepicker';
    import 'vue2-datepicker/index.css';
    import 'vue2-datepicker/locale/ru';
    import vue2Dropzone from 'vue2-dropzone'
    import 'vue2-dropzone/dist/vue2Dropzone.min.css'
    export default {
        name: "task",
        props: {},
        components: {
            DatePicker,
            vueDropzone: vue2Dropzone
        },
        data() {
            return {
                list: null,
                expire_date: new Date(),
                userList: null,
                activeUserList: null,
                currentTask: null,
                currentUser: null,
                name: '',
                cost: '',
                description: '',
                proirity: 'a',
                status: 'p',
                dropzoneOptions: {
                    url: API.fileCreate,
                    thumbnailWidth: 100,
                    maxFilesize: 5,
                    headers: { "My-Awesome-Header": "header value" }
                }
            }
        },
        created() {
            this.realizeIt();
            //console.log('data', this.list)
        },
        mounted() {
        },
        updated() {
            const file = { size: 123, name: "Icon", type: "image/png" };
            this.progressBar()
        },
        methods: {
            created(data) {
                this.callList.push(data)
            },
            realizeIt() {
                axios.get(API.taskList).then(({data}) => {
                    console.log('task list ', data)
                    this.list = data.list
                    this.userList = data.userList
                })
            },
            createTask(idForm, e) {
                e.preventDefault()
                axios.post(API.newTask, {
                    name: this.name,
                    cost: this.cost,
                    description: this.description,
                    proirity: this.proirity,
                    status: this.status,
                }).then(({data}) => {
                    window.location.reload()
                })
            },
            userCard(task, executor) {
                this.currentTask = task
                this.currentUser = executor;
                console.log('executor is', executor)
                this.$modal.show('confirmRemove')
            },
            userAddCard(task) {
                console.log('task userAddCard', task)
                this.$modal.show('userTask')
                this.currentTask = task
            },
            userAdd(user) {
                axios.post(API.taskAddUser, {
                    task_id: this.currentTask.id,
                    executor_id: user.id,
                }).then(({data}) => {
                    console.log('result ', data)
                    if (data.is) {
                        data.is.user = user
                        this.currentTask.team = [...this.currentTask.team, data.is]
                    }
                })
                this.$modal.hide('userTask')
            },
            taskEdit(task) {
                this.currentTask = task
                this.show('taskEdit')


            },
            taskRemove(task) {
                this.currentTask = task
                this.$modal.show('removeTask');
            },
            deleteTask(e) {
                e.preventDefault()
                window.location.href = API.taskRemove + this.currentTask.id
            },
            removeFromTask() {
                axios.post(API.taskRemoveUser, {
                    task_id: this.currentTask.id,
                    executor_id: this.currentUser.executor_id,
                })
                this.list.map((taskX, index) => {
                    if (taskX.id === this.currentTask.id) {
                        taskX.team = taskX.team.filter(t => t.id !== this.currentUser.id)
                    }
                })
                this.hide('confirmRemove')
            },
            progressBar() {
                $('.progress-bar').each(function (index) {
                    $(this).css('width', `${$(this).data('transitiongoal')}%`)
                })
            },
            taskView(task) {
                this.currentTask = task
                this.$modal.show('taskView');

            },
            show(is = null) {
                this.$modal.show(is ? is : 'task');
            },
            hide(is = null) {
                this.$modal.hide(is ? is : 'task');
            },
            sendingEvent (file, xhr, formData) {
                formData.append('model', 'App\\Tasks');
                formData.append('model_id', this.currentTask.id);
                formData.append('filename', file.name);
            },
            finishIt(task) {
                axios.post(API.taskFinish, {id: task.id}).then(res => {
                    window.location.reload()
                })
            }
        }
    }
</script>

<style lang="sass">
        .x-change
            display: flex !important
            justify-content: center !important

        .vm--modal
            transform: translateY(-50%)
            top: 50%
            height: auto !important
            .x_panel
                margin-bottom: 0 !important
            .bottom-content
                display: flex !important
                justify-content: flex-end !important
        img.avatar
            cursor: pointer
            object-fit: cover
            transition: box-shadow 0.3s ease-in-out
            &:hover
                box-shadow: 0 0 5px deepskyblue
        .add-user
            transition: filter 0.5s ease-in-out
            &:hover
                filter: invert(100%)
        .top_profiles
            padding: 10px !important
            max-height: 400px
            overflow-y: scroll
            .media
                transition: background 0.4s ease-in-out
                cursor: pointer
                &:last-child
                    margin-bottom: 20px !important
                &:hover
                    background: rgba(#2d3748, 0.2)
                .profile_thumb
                    padding: 0 !important
                    .avatar-x
                        object-fit: cover
                        width: 50px
                        height: 50px
                        border-radius: 50%

</style>

<style lang="scss">
    .taskEdit {

    .dropzone-custom-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }
    }
</style>
