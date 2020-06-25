<template>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Расчет дохода и расхода бюджета</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"><i class="fa fa-wrench"></i></a>
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

                    <div class="col-md-12 col-sm-12  ">

                        <ul class="stats-overview">
                            <li>
                                <span class="name"> Предполагаемый доход </span>
                                <span class="value text-success"> {{fullCost}} </span>
                            </li>
                            <li>
                                <span class="name"> Затраты компании</span>
                                <span class="value text-success"> 150 000 </span>
                            </li>
                            <li class="hidden-phone">
                                <span class="name"> Предполагаемая прибыль</span>
                                <span class="value text-success"> {{(fullCost-150000)}} </span>
                            </li>
                        </ul>
                        <br/>
                        <canvas id="mybarChart" width="765" height="382" style="width: 765px; height: 382px;"></canvas>
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
                list: [],
                fullCost: 0,
            }
        }, created() {
            this.realizeIt()
        },
        methods: {
            realizeIt() {
                axios.get(API.taskListArchive).then(({data}) => {
                    this.list = data.list
                    data.list.map((task, index) => {
                        this.fullCost += task.cost
                    })
                });
            }
        }
    };
</script>
