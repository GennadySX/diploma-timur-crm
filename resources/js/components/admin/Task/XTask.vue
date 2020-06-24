<template>
    <div class="row">
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

        <div class="col-md-12">
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
                                </ul>
                            </td>
                            <td class="project_progress">
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar"
                                         data-transitiongoal="100"></div>
                                </div>
                                <small>100% сделано</small>
                            </td>

                            <td class="x-change">
                                <a href="#" class="btn btn-primary btn-xs"
                                   @click="taskView(task)"
                                ><i class="fa fa-eye"></i> </a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning btn-xs">Завершена</button>
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
                axios.get(API.taskListArchive).then(({data}) => {
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
