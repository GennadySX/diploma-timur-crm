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
                <span>{{role}}</span>
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
                        <li><a href="/home/departments">Отделы</a></li>
                    </ul>
                </li>

                <li><a><i class="fa fa-bookmark"></i> Клиенты <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/home/companies">Компании</a></li>
                        <li><a href="/home/manager">Менеджеры</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-edit"></i> Задачи <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/home/my-tasks">Мои задачи</a></li>
                        <li><a href="/home/my-team">Комманда</a></li>
                        <li><a href="/home/task-archive">Архив</a></li>
                    </ul>
                </li>

                <li><a><i class="fa fa-desktop"></i> Общение <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/home/chat">Чат</a></li>
                        <li><a href="/home/emailer">E-mail почта</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-table"></i> Отчеты <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/home/history-purchase">Истории покупок</a></li>
                        <li><a href="/home/income">Доходы</a></li>
                        <li><a href="/home/expense">Расходы</a></li>
                    </ul>
                </li>
                <li><a><i class="fa  fa-shopping-bag"></i> Тарифные планы <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/home/tariff/active">Активные тарифы</a></li>
                        <li><a href="/home/tariff/archive">Архивные планы</a></li>
                    </ul>
                </li>

            </ul>
        <br/><br/>
        <h3>Параметры</h3>
        <ul class="nav side-menu">
            <li><a href="/home/profile"><i class="fa fa-user"></i> Профиль </a></li>
            <li><a href="/home/partner"><i class="fa fa-users"></i> Стать партнером </a></li>
            <li><a href="/home/subscription"><i class="fa fa-cart-plus"></i> Моя подписка </a></li>
            <li><a href="/home/help"><i class="fa fa-question-circle"></i> Тех поддержка </a></li>
            <li><a href="/home/about"><i class="fa fa-info-circle"></i> О нас </a></li>
        </ul>

        </div>
</template>

<script>
    import {API} from "../../../constants/API";
    import {getByRole} from "../../../helpers/roles";

    export default {
        name: 'menubar',
        props: {},
        data() {
            return {
                user: null,
                firstName: 'Имя',
                lastName: 'Фамилия',
                role: null,
            }
        },
        components: {
            getByRole
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
                        this.role = getByRole(data.user.role).title
                    }
                    this.$bus.$emit('user', data.user)
                })
            }
        }
    };
</script>

<style scoped lang="sass">
    .profile_img
        width: 55px
        height: 55px
        object-fit: cover
</style>
