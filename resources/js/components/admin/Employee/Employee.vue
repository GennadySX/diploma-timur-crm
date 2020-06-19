<template>
    <div class="row">
        <div class="x_panel">
            <div class="x_content d-flex flex-wrap" v-if="list">
                <div class="col-md-4 profile_details" v-for="(x, index ) in list" :key="index">
                    <div class="well profile_view">
                        <div class="">
                            <h4 class="brief"><i>{{x.company.name}}</i></h4>
                            <div class="left col-sm-7">
                                <h2>{{x.user.firstName}} {{x.user.lastName}}</h2>
                                <p><strong>Должности: </strong>{{x.role.name}}</p>
                                <ul class="list-unstyled">
                                    <li><i class="fa fa-building"></i> Отдел: {{x.department.name}} </li>
                                </ul>
                                <p>{{x.user.about}}</p>
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
            }
        }
    };
</script>


<style scoped lang="sass">
    .user-avatar
        width: 120px
        height: 120px
    .profile_view
        width: 100%
        padding: 15px
    .x_content
        display: flex
        flex-wrap: wrap
</style>
