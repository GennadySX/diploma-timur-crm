<template>
    <div class="">
        <div class="row" style="display: block;">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Таблица <small>звонков</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                <tr class="headings d-flex justify-content-between">
                                    <th class="column-title pl-5" >Номер абонента</th>
                                    <th class="column-title text-center" >Коммент</th>
                                    <th class="column-title text-center" >Операции</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr class="even pointer d-flex justify-content-center">
                                    <td class="pl-5">1</td>
                                    <td class="d-flex text-center" >Нет коммента <i class="success fa fa-long-arrow-up"></i></td>
                                    <td class="d-flex text-center ">
                                        <a class="btn btn-primary mr-1" href="new"> <i class="fa fa-pencil"></i> </a>
                                        <a class="btn btn-danger" href="new"> <i class="fa fa-trash"></i> </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "index",
        props: {
            item_list: null
        },
        components: {
        },
        data() {
            return {
                itemList: null
            }
        },
        created() {
            console.log('data', this.itemList)
        },
        methods: {
            created(data) {
                this.callList.push(data)
            },
        }
    }
</script>

<style scoped>
</style>
