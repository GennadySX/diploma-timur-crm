<template>
    <div >
        <div class="form-group row">
            <label for="position-confirm" class="col-md-4 col-form-label text-md-right">Вы здесь?</label>
            <div class="col-md-6">
                <select name="role" id="position-confirm" class="form-control" v-model="position" required >
                    <option value="0">Выберите вашу должности</option>
                    <option value="employee">Сотрудник</option>
                    <option value="client">Клиент компании</option>
                    <option value="ceo">Владелець компании</option>
                </select>
            </div>
        </div>

        <div v-if="position === 'employee' || position === 'client' " class="form-group row">
            <label for="company" class="col-md-4 col-form-label text-md-right">Выберите компанию</label>
            <div class="col-md-6">
                <select name="role" id="company" class="form-control" required>
                    <option :value="company.id" v-for="(company, index) in companyList" :key="index">{{company.name}}</option>
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
            return {
                companyList: null,
                position: "0"
            }
        },
        created() {

        },
        mounted() {
            this.getCompanies()
        },
        updated() {

        },
        methods: {
            getCompanies() {
                axios.get(API.companyList).then(({data}) => this.companyList = data.list)
            },

        }
    };
</script>
