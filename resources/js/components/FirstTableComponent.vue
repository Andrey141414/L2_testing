<!-- style="
    border-collapse: separate;
    border-spacing: 20px 0;" -->
<template>
    <table style="border: 1px solid ;" class="not-even">
        <thead>
            <tr>
                <th class="not-even">Наименование</th>
                <th class="even">По учетным ценам производства</th>
                <th class="not-even">По ценам продажи</th>
                <th class="even">Примечание</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="not-even">Общие блюда</td>
                <td class="even"> 
                    <div contenteditable id="commonAccounting" @input="onInput">-</div>
                </td>
                <td class="not-even">
                    <div contenteditable id="commonSale" @input="onInput">-</div>
                </td>
                <td class="even">
                    <div contenteditable id="commonNote" @input="onInput">-</div>
                </td>
            </tr>
            <tr>
                <td class="not-even">Порционные блюда</td>
                <td class="even">
                    <div contenteditable id="portionAccounting" @input="onInput">-</div>
                </td>
                <td class="not-even">
                    <div contenteditable id="portionSale" @input="onInput">-</div>
                </td>
                <td class="even">
                    <div contenteditable id="portionNote" @input="onInput">-</div>
                </td>
            </tr>
            <tr class="pl-3">
                <td class="not-even">Обеды на дом</td>
                <td class="even">
                    <div contenteditable id="houseAccounting" @input="onInput">-</div>
                </td> 
                <td class="not-even">
                    <div contenteditable id="houseSale" @input="onInput">-</div>
                </td>
                <td class="even">
                    <div contenteditable id="houseNote" @input="onInput">-</div>
                </td>
            </tr>
        </tbody>
    </table>
</template>



<script>


export default {
    components: {},
    //props: ['text','type'],
    name: "FirstTableComponent",
    data() {
        return {

        name: "FirstTable",
        tableValues: new Map(
            [
            ["commonAccounting", ""],
            ["commonSale", ""],
            ["commonNote", ""],

            ["portionAccounting", ""],
            ["portionSale", ""],
            ["portionNote", ""],

            ["houseAccounting", ""],
            ["houseSale", ""],
            ["houseNote", ""],
        ]),
        };
    },
    methods: {
        onInput(e) {
            let field = e.target.id;
            let value = e.target.innerText;
            this.tableValues.set(field,value);
            this.$emit('get_value_from_table', this.tableValues,this.name);
        },
    },
    watch: {
        tableValues: function () {},
    },
    mounted() {
        //console.log('Component mounted.', vm.$options.name )
    }
}
</script>

<style scoped>
.even {
    text-align: center;
    padding-left: 20px;
    padding-right: 20px;
    background-color: #ccd0d1;
}

.not-even {

    text-align: center;
    padding-left: 20px;
    padding-right: 20px;
    background-color: #d9e1e5;
}

input {
    outline-color: #d9e1e6;
    outline: none;
    background-color: #010b12;
}
</style>