<template>
    <div class="row">
        <div class="col-md-12">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter"
                    @click="show">
                Добавить нового клиента
            </button>
            <v-modal name="client">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Новый клиент</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>
                        <form class="form-horizontal form-label-left col-md-12" id="clientForm">

                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Имя*</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <input type="text" class="form-control" name="firstName" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Фамилия*</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <input type="text" class="form-control"  name="lastName">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Отчество</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <input type="text" class="form-control" name="middleName">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Компания</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <input type="text" class="form-control" name="company">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Телефон*</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <input type="text" class="form-control" name="phone">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">E-mail*</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <input type="text" class="form-control" name="email">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Описание</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <input type="text" class="form-control" name="description">
                                </div>
                            </div>

                            <div class="ln_solid"></div>

                            <div class="form-group row ">
                                <div class="col-md-12 offset-md-3 bottom-content">
                                    <button  class="btn btn-success"
                                    @click="createClient($event)"
                                    >Создать</button>
                                    <a  class="btn btn-default" @click="hide()">Отменить</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </v-modal>

            <div class="x_content d-flex flex-wrap" v-if="list">
                <div class="col-md-4 profile_details" v-for="(user, index ) in list" :key="index">
                    <div class="well profile_view">
                        <div class="">
                            <h4 class="brief"><i>{{user.company}}</i></h4>
                            <div class="left col-sm-7">
                                <h2>{{user.firstName}} {{user.lastName}}</h2>
                                <ul class="list-unstyled">
                                    <li><i class="fa fa-building mr-2"></i> <strong>Компания</strong>: {{user.company}} </li>
                                    <li><i class="fa fa-phone mr-2"></i> <strong>Телефон</strong>: {{user.phone}} </li>
                                    <li><i class="fa fa-at mr-2"></i> <strong>E-mail почта</strong>: {{user.email}} </li>
                                </ul>
                                <span class="text-muted">{{user.description}}</span>
                            </div>
                            <div class="right col-sm-5 text-center">
                                <img :src="user.avatar" alt="" class="img-circle img-fluid user-avatar">
                            </div>
                        </div>
                        <div class=" bottom text-center">
                            <div class=" col-sm-6 emphasis">
                            </div>
                            <div class="col-sm-6 operator-btn-list">
                                <button type="button" class="btn btn-danger btn-sm" @click="removeIt(user)"> <i class="fa fa-trash"></i> </button>
<!--                                <button type="button" class="btn btn-primary btn-sm"> <i class="fa fa-pencil"></i> </button>-->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                axios.get(API.clientList).then(({data}) => {
                    console.log('employee list is ', data.client)
                 this.list = data.client
                });
            },
            createClient(e) {
                e.preventDefault()
              const ms = $("#clientForm").serialize();
              axios.post(API.clientCreate, ms).then(res => {
                  if (res.data && res.data.client) {
                      this.list = [...this.list, res.data.client]
                      this.hide()
                  }
              })
            },
            removeIt(user) {
              window.location.href = '/x/s/client/delete/'+user.id
            },
            show() {
                this.$modal.show('client');
            },
            hide() {
                this.$modal.hide('client');
            }
        }
    };
</script>


<style scoped lang="sass">
    .operator-btn-list
        display: flex !important
        justify-content: flex-end !important
    .user-avatar
        width: 120px
        height: 120px
        object-fit: cover
    .profile_view
        width: 100%
        padding: 15px
    .client-form
            width: 100% !important
    .x_content
        display: flex
        flex-wrap: wrap
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
