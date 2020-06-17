<template>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Форма личного данных <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <br/>
                    <form enctype="multipart/form-data" id="sendForm" data-parsley-validate
                          class="form-horizontal form-label-left" action="/dashboard/profile/update"
                          method="post">
                        <div class="form-group">
                            <div class="container xnb">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg"
                                               name="avatar" @change="avatarChange"/>
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview"
                                             :style="{
                                            backgroundImage: 'url('+this.profile_data.avatar+')'
                                             }">
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ФИО <span
                                class="required">* </span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" required="required" name="CustomerFio"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span
                                class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <span class="fa fa-at form-control-feedback right" aria-hidden="true"></span>
                                <input type="tel" id="email" name="email" required="required"
                                       data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12"
                                >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="phone">Телефон<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                                <input type="tel" id="phone" name="Number" required="required"
                                       data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12"
                                >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="CustomerName">Название <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <input type="tel" id="CustomerName" name="CustomerName" required="required"
                                       data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12"
                                >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="CustomerName">Номер комнаты (ИНН) <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <input type="tel" id="CustomerInn" name="CustomerInn" required="required"
                                       data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12"
                                >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="Chief">Руководитель подразделения <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <input type="tel" id="Chief" name="Chief" required="required"
                                       data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12"
                                >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="Value">Ежемесячная плата за линию <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <input type="tel" id="Value" name="Value" required="required"
                                       data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12"
                                >
                            </div>
                        </div>


                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <a href="/dashboard">
                                    <button type="submit" class="btn btn-success send_profile" @click="send($event)">
                                        сохранить
                                    </button>
                                </a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {API} from "../../../constants/API";

    export default {
        name: "edit",
        props: {
            profile_data: null
        },
        data() {
            return {
                avatar: '/public/uploads/user.png',
                formData: {},
            }
        },
        mounted() {},
        methods: {
            async send(e) {
                e.preventDefault();
                const form = $('#sendForm').serializeArray();
                Object.keys(form).map((key, index) => this.formData[form[key]['name']] = form[key]['value']);
                await axios.post('/home/profile/update', this.formData).then(res => (res.data.status) ?
                    window.location.reload()
                    : alert('Ошибка! ', res.data.mess))
            },

            async avatarChange(e) {
                let avatar = new FormData();
                avatar.append('avatar', e.target.files[0]);

                if (e.target.files && e.target.files[0])
                    await axios.post(API.userAvatar, avatar).then(({data}) => {
                        data.img ?  this.profile_data.avatar = data.img : alert('Запрос обновление картинки произошла сбой')
                    })
            },

        }
    }
</script>

<style lang="css" scoped>
    .xnb {
        max-width: 400px;
        margin: 0px auto;
    }

    .avatar-upload {
        position: relative;
        max-width: 205px;
        margin: 50px auto;
    }

    .avatar-upload .avatar-edit {
        position: absolute;
        right: 12px;
        z-index: 1;
        top: 10px;
    }

    .avatar-upload .avatar-edit input {
        display: none;
    }

    .avatar-upload .avatar-edit input + label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #FFFFFF;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
    }

    .avatar-upload .avatar-edit input + label:hover {
        background: #f1f1f1;
        border-color: #d6d6d6;
    }

    .avatar-upload .avatar-edit input + label:after {
        content: "\f040";
        font-family: 'FontAwesome';
        color: #757575;
        position: absolute;
        top: 10px;
        left: 0;
        right: 0;
        text-align: center;
        margin: auto;
    }

    .avatar-upload .avatar-preview {
        width: 192px;
        height: 192px;
        position: relative;
        border-radius: 100%;
        border: 6px solid #F8F8F8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }

    .avatar-upload .avatar-preview > div {
        width: 100%;
        height: 100%;
        border-radius: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>
