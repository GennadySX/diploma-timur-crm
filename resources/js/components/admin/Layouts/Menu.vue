<template>
    <div class="showermenu menu_section">
        <br/>
        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img :src="user && user.avatar ? user.avatar : '/public/admin/images/user.png'" alt="" class="img-circle profile_img">
            </div>
            <div class="profile_info " @click="clickIt($event)">
                <h2>{{firstName}} {{lastName}}</h2>
                <span>Администратор</span>
            </div>
        </div>
        <br/>
        <br/>
            <h3>Меню</h3>
            <ul class="nav side-menu">
                <li>
                    <a><i class="fa fa-home"></i> Главный <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/home/employees">Сотрудники</a></li>
                        <li><a href="/home/clients">Клиенты </a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-edit"></i> Задачи <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/home/my-tasks">Мои задачи</a></li>
                        <li><a href="/home/task-archive">Архив</a></li>
                    </ul>
                </li>

                <li><a><i class="fa fa-desktop"></i> Общение <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/home/chat">E-mail почта</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-table"></i> Отчеты <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/home/income">Бюджет</a></li>
                    </ul>
                </li>

            </ul>
        <br/><br/>
        <h3>Параметры</h3>
        <ul class="nav side-menu">
            <li><a href="/home/profile"><i class="fa fa-user"></i> Профиль </a></li>
            <li><a href="/home/help"><i class="fa fa-question-circle"></i> Тех поддержка </a></li>
            <li><a href="/home/about"><i class="fa fa-info-circle"></i> Информация </a></li>
        </ul>

        </div>
</template>

<script>
    import {API} from "../../../constants/API";

    export default {
        name: 'menubar',
        props: {},
        data() {
            return {
                user: null,
                firstName: 'Имя',
                lastName: 'Фамилия',
            }
        },
        created() {

        },
        mounted() {
            this.getUser()
        },
        methods: {
            getUser(e=null) {
                axios.get(API.user).then(({data}) => {
                    if (data.user) {
                        this.user = data.user
                        this.firstName = data.user.firstName;
                        this.lastName = data.user.lastName
                    }
                    this.$bus.$emit('user', data.user)
                })
            },
        }
    };
</script>

<style scoped lang="sass">
    .profile_img
        width: 55px
        height: 55px
        object-fit: cover
</style>
