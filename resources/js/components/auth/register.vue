<template>
    <div >
        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Вы здесь?</label>

            <div class="col-md-6">
                <select name="role" id="" class="form-control" required>
                    <option value="">Выберите вашу должности</option>
                    <option value="employee">Сотрудник</option>
                    <option value="client">Клиент компании</option>
                    <option value="ceo">Владелець компании</option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
    import {API} from "../../constants/API";

    export default {
        name: 'register',
        props: {},
        data() {
            return {}
        },
        created() {

        },
        mounted() {

        },
        updated() {

        },
        methods: {
            getCompanyList() {
                axios.get(API.companyList).then(res => {
                    console.log('company list is', res)
                })
            }
        }
    };
</script>
