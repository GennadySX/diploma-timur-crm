<template>
    <div class="about">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Шаблоны необходимые для работы </h2>
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
                                <span class="name timur-font"> Пример договора </span>
                                <br>
                                <a class="btn btn-primary" target="_blank"

                                   href="/document/dogovor.docx"
                                >Скачать </a>
                            </li>
                            <li>
                                <span class="name timur-font"> Реквизиты </span>
                                <br>
                                <a class="btn btn-primary" target="_blank"

                                   href="/document/rek.docx"
                                >Скачать </a>
                            </li>
                            <li>
                                <span class="name timur-font"> Карта партнера </span>
                                <br>
                                <a class="btn btn-primary" target="_blank"

                                   href="/document/vizit.docx"
                                >Скачать </a>
                            </li>
                        </ul>
                        <br/>


                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {},
    };
</script>


<style lang="scss">
    .timur-font {

        font-size: 20px !important;

    }
</style>
