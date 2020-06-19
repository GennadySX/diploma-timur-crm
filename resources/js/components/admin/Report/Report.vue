<template>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Консультирование новых партнеров по контрактам</h2>
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

                    <div class="col-md-12 col-sm-12  ">

                        <ul class="stats-overview">
                            <li>
                                <span class="name"> Предполагаемый бюджет </span>
                                <span class="value text-success"> 2300 </span>
                            </li>
                            <li>
                                <span class="name"> Всего потрачено</span>
                                <span class="value text-success"> 2000 </span>
                            </li>
                            <li class="hidden-phone">
                                <span class="name"> Предполагаемая продолжительность проекта</span>
                                <span class="value text-success"> 20 </span>
                            </li>
                        </ul>
                        <br />

                        <div id="mainb" style="height:350px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
        },
    };
</script>
