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
                <li><a href="/home/my-tasks"><i class="fa fa-edit"></i> Задачи </a>
                <li><a><i class="fa fa-bookmark"></i> Клиенты <span class="fa fa-chevron-down"></span></a>
                <li><a><i class="fa fa-bookmark"></i> Сотрудники <span class="fa fa-chevron-down"></span></a></li>
                <li><a href="/home/chat"><i class="fa fa-comments-o"></i> Чат </a> </li>
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
    import {getByRole} from "../../../helpers/roles";

    export default {
        name: 'menubar',
        props: {},
        data() {
            return {
                user: null,
                firstName: 'Имя',
                lastName: 'Фамилия',
                role: null
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
                        this.role = getByRole(data.user.role).title
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
