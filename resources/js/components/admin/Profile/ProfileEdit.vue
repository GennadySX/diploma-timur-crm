<template>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Форма личных данных <small></small></h2>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstName">Имя <span
                                class="required">* </span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="firstName" required="required" name="firstName"
                                       class="form-control col-md-7 col-xs-12"
                                    :value="profile_data.firstName"
                                >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastName">Фамилия <span
                                class="required">* </span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="lastName" required="required" name="lastName"
                                       class="form-control col-md-7 col-xs-12"
                                       :value="profile_data.lastName"
                                >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="middleName">Отчество <span
                                class="required">* </span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="middleName" required="required" name="middleName"
                                       class="form-control col-md-7 col-xs-12"
                                       :value="profile_data.middleName"
                                >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span
                                class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <span class="fa fa-at form-control-feedback right" aria-hidden="true"></span>
                                <input type="tel" id="email" name="email" disabled
                                       data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12"
                                       :value="profile_data.email"
                                >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="gender">Пол<span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <select name="gender" id="gender" class="form-control col-md-7 col-xs-12" data-validate-length-range="8,20"
                                        :value="profile_data.gender"
                                >
                                    <option value="x">Не выбран поль</option>
                                    <option value="m">Мужчина</option>
                                    <option value="f">Женщина</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="birthday">Дата рождения<span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <input type="date" id="birthday" name="birthday" class="form-control col-md-7 col-xs-12"
                                       :value="profile_data.birthday"
                                >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="about">Обо мне<span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <textarea  id="about" name="about" class="form-control col-md-7 col-xs-12" placeholder="Введите текст...">{{profile_data.about}}</textarea>
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
                Object.keys(form).map((key, index) => key !== 'file' ? this.formData[form[key]['name']] = form[key]['value'] : null);
                await axios.post(API.userUpdate, this.formData).then(({data}) => data.updated ? window.location.reload() : alert('Ошибка сервера'));
            },

            async avatarChange(e) {
                let avatar = new FormData();
                avatar.append('avatar', e.target.files[0]);

                if (e.target.files && e.target.files[0])
                    await axios.post(API.userUpdateAvatar, avatar).then(({data}) => {
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
