<template>
    <div class="row">
        <div class="x_panel">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter"
                    @click="show">
                Добавить нового клиента
            </button>

            <div class="x_content d-flex flex-wrap" v-if="list">
                <div class="col-md-4 profile_details" v-for="(x, index ) in list" :key="index">
                    <div class="well profile_view">
                        <div class="">
                            <h4 class="brief"><i>{{x.company.name}}</i></h4>
                            <div class="left col-sm-7">
                                <h2>{{x.user.firstName}} {{x.user.lastName}}</h2>
                                <ul class="list-unstyled">
                                    <li><i class="fa fa-building"></i> Компания: {{x.department.name}} </li>
                                </ul>
                            </div>
                            <div class="right col-sm-5 text-center">
                                <img :src="x.user.avatar" alt="" class="img-circle img-fluid user-avatar">
                            </div>
                        </div>
                        <div class=" bottom text-center">
                            <div class=" col-sm-6 emphasis">
                            </div>
                            <div class=" col-sm-6 emphasis">
                                <button type="button" class="btn btn-success btn-sm"> <i class="fa fa-user">
                                </i> <i class="fa fa-comments-o"></i> </button>
                                <button type="button" class="btn btn-primary btn-sm">
                                    <i class="fa fa-user"> </i>Посмотреть профиль
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    </div>
</template>

<script>
    import {API} from "../../../constants/API";

    export default {
        props: {},
        data() {
            return {
                list: null
            }
        },
        mounted() {
            this.realizeIt()
        },
        methods: {
            realizeIt() {
                axios.get(API.employeeList).then(({data}) => {
                    console.log('employee list is ', data.list)
                 this.list = data.list
                });
            },
            show() {
                this.$modal.show('hello');
            },
            hide() {
                this.$modal.hide('hello');
            }
        }
    };
</script>


<style scoped lang="sass">
    .user-avatar
        width: 120px
        height: 120px
        object-fit: cover
    .profile_view
        width: 100%
        padding: 15px
    .x_content
        display: flex
        flex-wrap: wrap
</style>
