<!-- style="
    border-collapse: separate;
    border-spacing: 20px 0;" -->
<template>
    <table  style="border: 1px solid ;" class="not-even" >
        <thead>
            <tr>
                <th class="even">По учетным ценам производства</th>
                <th class="not-even">По ценам продажи</th>
                <th class="even">Примечание</th>
            </tr>
        </thead>
        
        <tbody>
            <tr>
                <td class="even"> 
                    <div contenteditable id="accounting" @input="onInput">-</div>
                </td>
                <td class="not-even">
                    <div contenteditable id="sale" @input="onInput">-</div>
                </td>
                <td class="even">
                    <div contenteditable id="note" @input="onInput">-</div>
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
            name: "SecondTable",
            tableValues: new Map(
            [
            ["accounting", ""],
            ["sale", ""],
            ["note", ""],
        ]),
        }
    },
    //props: ['text','type'],
    name: "SecondTableComponent",
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