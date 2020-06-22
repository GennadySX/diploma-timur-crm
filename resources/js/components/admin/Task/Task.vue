<template>
    <div class="row">
        <div class="col-md-12">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter"
                    @click="show">
                Создать новый
            </button>

            <v-modal name="hello">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Новая задача</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>
                        <form class="form-horizontal form-label-left">

                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Название</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Стоимость (.руб)</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <input type="number" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Приоритетность</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <select name="proirity"  class="form-control ">
                                        <option value="" class="text-danger font-weight-bold" selected >Срочно</option>
                                        <option value="" >Средний</option>
                                        <option value="" >Не срочно</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Статус</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <select name="proirity" id="" class="form-control ">
                                        <option value="" class="text-danger font-weight-bold" selected >Активно</option>
                                        <option value="" >Отложено</option>
                                        <option value="" >Не активно</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Дата окончания</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <date-picker class="w-100" type="date"
                                                 format="DD.MM.YYYY"
                                                 lang="ru-RU"
                                                 v-model="expire_date"></date-picker>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Описание</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="ln_solid"></div>

                            <div class="form-group row ">
                                <div class="col-md-12 offset-md-3 bottom-content">
                                    <button type="submit" class="btn btn-success">Сохранить</button>
                                    <a  class="btn btn-default" @click="hide()">Отменить</a>
                                </div>
                            </div>
                        </form>
                    </div>
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
                            <th>Испольнители</th>
                            <th>Статус прогресса</th>
                            <th>Статус</th>
                            <th style="width: 20%">Изменить</th>
                        </tr>
                        </thead>
                        <tbody v-if="list">
                        <tr v-for="(task, index) in list" :key="index">
                            <td>{{index}}</td>
                            <td>
                                <a>{{task.description}}</a>
                                <br/>
                                <small>{{task.created_at}}</small>
                                <small>{{task.priority}}</small>
                            </td>
                            <td>
                                <ul class="list-inline" v-if="task.team">
                                    <li v-for="(executor, i) in task.team" :key="i">
                                        <img :src="executor.user.avatar" class="avatar"
                                             :alt="`${executor.user.firstName} ${executor.user.lastName}` ">
                                    </li>

                                    <li >
                                        <img src="/public/admin/images/plus.png" class="avatar">
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
                            <td>
                                <button type="button" class="btn btn-success btn-xs">Завершен</button>
                            </td>
                            <td>
                                <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i>  </a>
                                <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
                                <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>  </a>
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
    export default {
        name: "task",
        props: {},
        components: {DatePicker },
        data() {
            return {
                list: null,
                expire_date: new Date()
            }
        },
        created() {
            this.realizeIt();
            //console.log('data', this.list)
        },
        updated(){
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
                })
            },
            progressBar() {
              $('.progress-bar').each(function(index) {
                  $(this).css('width', `${$(this).data('transitiongoal')}%`)
              })
            },
            show() {
                this.$modal.show('hello');
            },
            hide() {
                this.$modal.hide('hello');
            }
        }
    }
</script>

<style lang="sass">
    .vm--modal
        transform: translateY(-50%)
        top: 50%
        height: auto !important
        .x_panel
            margin-bottom: 0 !important
        .bottom-content
            display: flex !important
            justify-content: flex-end !important
</style>
