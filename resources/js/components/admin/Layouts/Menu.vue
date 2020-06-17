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
                <li><a><i class="fa fa-home"></i> Главный <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/home">Сотрудники</a></li>
                        <li><a href="/home">Отделы</a></li>
                    </ul>
                </li>

                <li><a><i class="fa fa-bookmark"></i> Клиенты <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/home/ring">Компании</a></li>
                        <li><a href="/home/ring">Менеджеры</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-edit"></i> Задачи <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/home/ring">Мои задачи</a></li>
                        <li><a href="/home/ring">Комманда</a></li>
                        <li><a href="/home/ring">Архив</a></li>
                    </ul>
                </li>

                <li><a><i class="fa fa-desktop"></i> Общение <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/home/repair">Чат</a></li>
                        <li><a href="/home/repair">E-mail почта</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-table"></i> Отчеты <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/home/receipt">Истории покупок</a></li>
                        <li><a href="/home/receipt">Доходы</a></li>
                        <li><a href="/home/receipt">Расходы</a></li>
                        <li><a href="/home/receipt">Запрос покупки</a></li>
                    </ul>
                </li>
                <li><a><i class="fa  fa-shopping-bag"></i> Тарифные планы <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/home/sum">Активные тарифы</a></li>
                        <li><a href="/home/sum">Архивные планы</a></li>
                    </ul>
                </li>

            </ul>
        <br/><br/>
        <h3>Параметры</h3>
        <ul class="nav side-menu">
            <li><a href="/home/profile"><i class="fa fa-user"></i> Профиль </a></li>
            <li><a href="#"><i class="fa fa-users"></i> Стать партнером </a></li>
            <li><a href="#"><i class="fa fa-cart-plus"></i> Моя подписка </a></li>
            <li><a href="#"><i class="fa fa-question-circle"></i> Тех поддержка </a></li>
            <li><a href="#"><i class="fa fa-info-circle"></i> О нас </a></li>
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
