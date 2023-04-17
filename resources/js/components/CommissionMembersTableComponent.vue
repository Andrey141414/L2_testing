<template>
    <table style="border: 1px solid ;">
        <thead style="border: 1px solid ;">
            <tr>

                <th class="even">Должность</th>
                <th class="even">ФИО</th>

            </tr>
        </thead>

        <tbody>
            
            
            <tr v-for="(row, index) in tableValues" >
                <td class="even">
                    <div contenteditable @input="onInput(index,'post',$event)">-</div>
                </td>
                <td class="even" >
                    <div contenteditable @input="onInput(index,'person',$event)"></div>
                </td>

            </tr>
        </tbody>
    </table>

    <button style="margin-right:2rem;" v-on:click="addRow()" class="btn btn-secondary btn-sm mt-2"> Добавить </button>
    <button v-on:click="deleteRow()" class="btn btn-secondary btn-sm pl-2 mt-2"> Убрать </button>

   
</template>
    
    
    
<script>


export default {
    components: {},
    //props: ['text','type'],
    name: "CommissionMembersTableComponent",

    data() {
        return {
            name: "CommissionMembersTable",
            tableValues:[
            ],
            
        }

    },
    mounted() {
       
       
    },

    methods:
    {
        addRow() {
            if(this.tableValues.length <3)
            {
                this.tableValues.push(new Map([["person", "-"],["post", "-"],]));
            }
        },																	

        deleteRow() {
            if(this.tableValues.length > 0)
            {
                this.tableValues.pop();
            }
           
            
        },
        onInput(index,field,e) {
            let value = e.target.innerText;
            let raw = this.tableValues[index];
            raw.set(field,value);
            console.log(this.tableValues[index]);
            this.$emit('get_value_from_table', this.tableValues,this.name);
           
            
        },
    },
    

}
</script>
    
<style scoped>
.even {

    width: 300px;
    text-align: center;
    padding-left: 40px;
    padding-right: 40px;
    background-color: #ccd0d1;
}

.not-even {
    width: 300px;

    text-align: center;
    padding-left: 40px;
    padding-right: 40px;
    background-color: #d9e1e5;
}

input {
    outline-color: #d9e1e6;
    outline: none;
    background-color: #010b12;
}
</style>