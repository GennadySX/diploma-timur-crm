<template>
    <div>
    <div v-if="!isEdit" class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Ваши данные </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                               <div class="p-2">
                                   <a class="dropdown-item" href="#">Действие 1</a>
                               </div>
                                <div>
                                    <a class="dropdown-item" href="#">Действие 1</a>
                                </div>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-md-3 col-sm-3  profile_left">
                        <div class="profile_img">
                            <div id="crop-avatar">
                                <!-- Current avatar -->
                                <img class="img-responsive avatar-view" :src="user && user.avatar ? user.avatar : '/public/admin/images/picture.jpg' "
                                     alt="Avatar" title="Change the avatar">
                            </div>
                        </div>
                        <h3>{{firstName}} {{lastName}}</h3>

                        <ul class="list-unstyled user_data">
                            <li><i class="fa fa-map-marker user-profile-icon"></i> Казань, Россия </li>

                            <li>
                                <i class="fa fa-briefcase user-profile-icon"></i> Администратор
                            </li>

                            <li class="m-top-xs">
                                <i class="fa fa-building user-profile-icon"></i>
                                <a href="http://cg-eshield.ru/" target="_blank">ЭнергоЩит</a>
                            </li>
                        </ul>
                        <br/>

                        <a @click="editPage(true)"

                           class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Изменить данные</a>
                        <br/>



                    </div>
                    <div class="col-md-9 col-sm-9 ">


                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab"
                                                                          data-toggle="tab" aria-expanded="true">
                                    Последние обновления
                                </a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab"
                                                                    data-toggle="tab" aria-expanded="false">Мои задачи</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2"
                                                                    data-toggle="tab" aria-expanded="false">Обо мне</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane active " id="tab_content1"
                                     aria-labelledby="home-tab">

                                    <!-- start recent activity -->
                                    <ul class="messages">
                                        <li>
                                            <img src="/public/admin/images/img.jpg" class="avatar" alt="Avatar">
                                            <div class="message_date">
                                                <h3 class="date text-info">24</h3>
                                                <p class="month">May</p>
                                            </div>
                                            <div class="message_wrapper">
                                                <h4 class="heading">Desmond Davison</h4>
                                                <blockquote class="message">Raw denim you probably haven't heard of them
                                                    jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro
                                                    keffiyeh dreamcatcher synth.
                                                </blockquote>
                                                <br/>
                                                <p class="url">
                                                    <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                                    <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc
                                                    </a>
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <img src="/public/admin/images/img.jpg" class="avatar" alt="Avatar">
                                            <div class="message_date">
                                                <h3 class="date text-error">21</h3>
                                                <p class="month">May</p>
                                            </div>
                                            <div class="message_wrapper">
                                                <h4 class="heading">Brian Michaels</h4>
                                                <blockquote class="message">Raw denim you probably haven't heard of them
                                                    jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro
                                                    keffiyeh dreamcatcher synth.
                                                </blockquote>
                                                <br/>
                                                <p class="url">
                                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                                    <a href="#" data-original-title="">Download</a>
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <img src="/public/admin/images/img.jpg" class="avatar" alt="Avatar">
                                            <div class="message_date">
                                                <h3 class="date text-info">24</h3>
                                                <p class="month">May</p>
                                            </div>
                                            <div class="message_wrapper">
                                                <h4 class="heading">Desmond Davison</h4>
                                                <blockquote class="message">Raw denim you probably haven't heard of them
                                                    jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro
                                                    keffiyeh dreamcatcher synth.
                                                </blockquote>
                                                <br/>
                                                <p class="url">
                                                    <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                                    <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc
                                                    </a>
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <img src="/public/admin/images/img.jpg" class="avatar" alt="Avatar">
                                            <div class="message_date">
                                                <h3 class="date text-error">21</h3>
                                                <p class="month">May</p>
                                            </div>
                                            <div class="message_wrapper">
                                                <h4 class="heading">Brian Michaels</h4>
                                                <blockquote class="message">Raw denim you probably haven't heard of them
                                                    jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro
                                                    keffiyeh dreamcatcher synth.
                                                </blockquote>
                                                <br/>
                                                <p class="url">
                                                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                                                    <a href="#" data-original-title="">Download</a>
                                                </p>
                                            </div>
                                        </li>

                                    </ul>
                                    <!-- end recent activity -->

                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content2"
                                     aria-labelledby="profile-tab">

                                    <!-- start user projects -->
                                    <table class="data table table-striped no-margin">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Project Name</th>
                                            <th>Client Company</th>
                                            <th class="hidden-phone">Hours Spent</th>
                                            <th>Contribution</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>New Company Takeover Review</td>
                                            <td>Deveint Inc</td>
                                            <td class="hidden-phone">18</td>
                                            <td class="vertical-align-mid">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-success"
                                                         data-transitiongoal="35"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>New Partner Contracts Consultanci</td>
                                            <td>Deveint Inc</td>
                                            <td class="hidden-phone">13</td>
                                            <td class="vertical-align-mid">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-danger"
                                                         data-transitiongoal="15"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Partners and Inverstors report</td>
                                            <td>Deveint Inc</td>
                                            <td class="hidden-phone">30</td>
                                            <td class="vertical-align-mid">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-success"
                                                         data-transitiongoal="45"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>New Company Takeover Review</td>
                                            <td>Deveint Inc</td>
                                            <td class="hidden-phone">28</td>
                                            <td class="vertical-align-mid">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-success"
                                                         data-transitiongoal="75"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!-- end user projects -->

                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content3"
                                     aria-labelledby="profile-tab">
                                    <p class="p-3">{{user.about}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <div v-if="isEdit">
         <profile-edit
          :profile_data="user"
         ></profile-edit>
     </div>
    </div>
</template>

<script>
    import ProfileEdit from "./ProfileEdit";
    export default {
        name: 'profile',
        props: {},
        data() {
            return {
                user: null,
                firstName: 'Имя',
                lastName: 'Фамилия',
                isEdit: false

            }
        },
        created() {

        },
        components: {
            ProfileEdit
        },
        mounted() {
            this.$bus.$on('user', (user) => {
                if (user) {
                    this.user = user
                    this.firstName = user.firstName;
                    this.lastName = user.lastName
                }
            })
        },
        methods: {
            editPage(is) {
                this.isEdit = is
            }
        }
    };
</script>


<style lang="sass" scoped>
    .dropdown-menu
        padding: 10px
    #tab_content3
        padding: 15px
</style>
