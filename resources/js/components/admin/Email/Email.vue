<template>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-3 mail_list_column">
                            <button id="compose" class="btn btn-sm btn-success btn-block" type="button" @click="show()">
                                Написать
                            </button>
                            <a href="#" v-if="list" v-for="(email, index) in list" @click="currentMail = email">
                                <div class="mail_list">
                                    <div class="left"><i class="fa fa-edit"></i>
                                    </div>
                                    <div class="right">
                                        <h3>{{email.name}} <small>{{getDate(email.created_at)}}</small></h3>
                                        <p>{{email.message.toString()}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- /MAIL LIST -->

                        <!-- CONTENT MAIL -->
                        <div class="col-sm-9 mail_view" v-if="currentMail">
                            <div class="inbox-body">
                                <div class="mail_heading row">
                                    <div class="col-md-12">
                                        <strong>Кому: </strong> {{currentMail.name}}
                                        <span>({{currentMail.email}})</span>
                                    </div>
                                    <div class="col-md-4 ">
                                        <p class="date"> {{getDate(currentMail.created_at)}}</p>
                                    </div>
                                    <div class="col-md-12">
                                        <h4>{{currentMail.subject}}</h4>
                                    </div>
                                </div>
                                <div class="sender-info">
                                    <div class="row">

                                    </div>
                                </div>
                                <div class="view-mail">
                                    <p>{{currentMail.message}}</p>
                                </div>
                            </div>

                        </div>
                        <!-- /CONTENT MAIL -->
                    </div>
                </div>
            </div>
        </div>
        <v-modal name="compose">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Отправка почту</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br/>
                    <form class="form-horizontal form-label-left" id="sendEmailForm">

                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Кому</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control" placeholder="пр. Андрей Николаев" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">E-mail*</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control" placeholder="пр. johndoe@mail.com" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Тема</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control" placeholder="пр. Обсуждение проекта" name="subject">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Сообщение</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <textarea class="form-control" rows="5"
                                          placeholder="Введите текст сообщения" name="message"></textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>

                        <div class="form-group row ">
                            <div class="col-md-12 offset-md-3 bottom-content">
                                <button type="submit" class="btn btn-success" @click="sendMail('#sendEmailForm')">Отправить</button>
                                <a class="btn btn-default" @click="hide()">Отменить</a>
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
                list: [],
                currentMail: null
            }
        },
        created() {
           this.realizeIt()
        },
        methods: {
            realizeIt() {
                axios.get(API.emailList).then(({data}) => {
                    console.log('employee list is ', data.list)
                    this.list = data.list
                });
            },
            sendMail(form) {
                axios.post(API.emailCreate, $(form).serialize()).then(({data}) => {
                    console.log('email result', data)
                    if (data.email) {
                        this.list = [data.email, ...this.list]
                    }
                })//.catch(e => alert('Ошибка при отправки почты'));
            },
            show() {
                this.$modal.show('compose');
            },
            hide() {
                this.$modal.hide('compose');
            },
            getDate(date){
                const d = new Date(date)
                return `${this.checkOne(d.getHours())}:${this.checkOne(d.getMinutes())} | ${this.checkOne(d.getDate())}.${this.checkOne(d.getMonth()+1)}.${d.getFullYear()} `
            },
            checkOne(is) {
                if (is < 10 ) {
                    return `0${is}`
                } else {
                    return is
                }
            }
        }
    };
</script>
