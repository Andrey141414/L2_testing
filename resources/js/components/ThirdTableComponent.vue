<!-- style="
    border-collapse: separate;
    border-spacing: 20px 0;" -->
<template>
    <table style="border: 1px solid ;"  class="not-even" >
        <thead style="border: 1px solid ;" >
            <tr>
               
                <th  class="even">Наименование</th>
                <th class="not-even">Процент к обороту</th>
                <th class="even">Сумма</th>
            </tr>
        </thead>
        
        <tbody>
            <tr>
                <td class="even">
                    <div contenteditable>Специй</div>
                </td>
                <td  class="not-even">
                    <div contenteditable id="spicesPersent" @input="onInput">-</div>
                </td>
                <td class="even">
                    <div contenteditable id="spicesSumm" @input="onInput">-</div>
                </td>
            </tr>
            <tr>
                <td class="even">
                    <div contenteditable>Соли</div>
                </td>
                <td  class="not-even">
                    <div contenteditable id="saltPersent" @input="onInput">-</div>
                </td>
                <td class="even">
                    <div contenteditable id="saltSumm" @input="onInput">-</div>
                </td>
            </tr>
            
        </tbody>
    </table>

</template>



<script>


export default {
    components:{},
    data(){
        return{
            name: "ThirdTable",
            tableValues: new Map(
            [
            ["saltPersent", ""],
            ["saltSumm", ""],
            ["spicesPersent", ""],
            ["spicesSumm", ""],
        ]),
        }
    },
    //props: ['text','type'],
    name: "ThirdTableComponent",
    mounted() {
       
    },
    methods: {
        onInput(e) {
            let field = e.target.id;
            let value = e.target.innerText;
            this.tableValues.set(field,value);
            this.$emit('get_value_from_table', this.tableValues,this.name);
           
        },
    },
}
</script>

<style scoped>
.even{
    text-align: center;
    padding-left: 40px;
    padding-right: 40px;
    background-color:#ccd0d1;
}
.not-even{
    
    text-align: center;
    padding-left: 40px;
    padding-right: 40px;
    background-color: #d9e1e5;
}
input{
    outline-color:#d9e1e6;
    outline:none;
    background-color:#010b12;
}
</style>