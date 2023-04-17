<template>
    <form style="
                            border: none;
                            background-color:#d9e1e6;
                            width: 300px;
                            border-radius: 20px">
        <fieldset style="margin-left: 5%;">
            <legend style="
                    font-size: 12px;
                    margin-bottom: 0px; "> {{ text }} </legend>
            <input v-model="value" placeholder='Введите' style="    
                                    border: none; 
                                    width: 100%; 
                                    border-radius: 20px;
                                    background-color:#d9e1e6;
                                    color:black;
                                    outline:none;
                                    outline-color:#d9e1e6;" name="name">
        </fieldset>
    </form>
</template>

<script>
import { watch } from 'vue';

export default {
    props: [
        'text',
        'type',
        'field',
    ],
    name: "InputComponent",

    data() {
        return {
            value: "",
        };
    },
    mounted() {

        // console.log(this.text)
        // console.log(this.field)
        // console.log('Component mounted.')
    },
    watch: {
        value: function () {
            this.$emit('get_value_from_input', this.field, this.value,);
        },
    }
}
</script>

