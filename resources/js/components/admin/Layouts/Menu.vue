<template>
    <div class="showermenu menu_section">
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
            <li><a href="#"><i class="fa fa-user"></i> Профиль </a></li>
            <li><a href="#"><i class="fa fa-users"></i> Стать партнером </a></li>
            <li><a href="#"><i class="fa fa-cart-plus"></i> Моя подписка </a></li>
            <li><a href="#"><i class="fa fa-question-circle"></i> Тех поддержка </a></li>
            <li><a href="#"><i class="fa fa-info-circle"></i> О нас </a></li>
        </ul>

        </div>
</template>

<script>
    export default {
        name: 'menubar',
        props: {
        },
    };
</script>
