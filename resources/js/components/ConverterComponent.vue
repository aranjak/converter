<template>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Online Currency Converter
            </div>
            <div class="controls">
                <select v-model="selected_currency_in">
                    <option v-for="currency in currencies" :value="currency.id">{{currency.code}}</option>
                </select>
                <input type="number" v-model="amount_in" min="0" step="0.01">
                <input type="button" v-on:click="swap" value="Swap" class="btn btn-info">
                <input type="number" v-model="amount_out" min="0" step="0.01">
                <select v-model="selected_currency_out">
                    <option v-for="currency in currencies" :value="currency.id">{{currency.code}}</option>
                </select>
                <input type="button" v-on:click="convert" value="Convert" class="btn btn-success">
            </div>
            <div v-if="errors.length" class="alert alert-danger">
                <ul>
                    <li v-for="error in errors">{{ error }}</li>
                </ul>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th v-for="name in column_names">
                            {{ name }}
                        </th>    
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="history in histories">
                        <td v-for="key in column_codes">
                            {{ history[key] }}
                        </td>
                    </tr>
                </tbody>
            </table>
            
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.getHystory();
        },
        props : ['currencies_str','histories_str'],  
        data() {
            return {
                histories: {},
                selected_currency_in: 1,
                selected_currency_out: 2,
                amount_in: null,
                amount_out: null,
                column_codes: [
                                'code_in',
                                'amount_in',
                                'amount_out',
                                'code_out',                                
                            ],
                column_names: [
                    'Currency In',
                    'Amount In',
                    'Amount Out',
                    'Currency Out',
                ],
                errors: [],
            }
        },  
        computed: {
            currencies: function(){
                return this.currencies_str;
            },
        },
        methods: {
            swap() {
                let amount_in  = this.amount_in;
                let amount_out = this.amount_out;
                this.amount_in = amount_out;
                this.amount_out = "";
                let selected_in = this.selected_currency_in;
                this.selected_currency_in = this.selected_currency_out;
                this.selected_currency_out = selected_in;
            },
            convert(e) {
                if(!this.checkErrors()) {
                    e.preventDefault()
                } else {
                    axios.post('/convert',{
                            currency_in_id: this.selected_currency_in,
                            currency_out_id: this.selected_currency_out,
                            amount_in: this.amount_in,
                        })
                    .then(response => {
                        this.histories = response.data.history;
                        this.amount_out = response.data.amount_out;
                    });
                }
            },
            getHystory() {
                axios.post('history')
				.then(response => {
					this.histories = response.data;
				});
            },
            checkErrors: function(e) {
                this.errors = [];

                if (!this.amount_in) {
                    this.errors.push('Enter Amount In value to convert!');
                }

                if (!this.errors.length) {
                    return true;
                }

                return false;
            } 
        }
    }
</script>
<style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .m-b-md, .controls {
                margin-bottom: 30px;
            }
            ul {
                list-style-type: none;
            }
        </style>