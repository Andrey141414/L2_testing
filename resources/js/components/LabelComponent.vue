<template>
    <form style="
                    border: none;
                    background-color:#d9e1e6;
                    width: 400px;
                    border-radius: 20px">
        <fieldset style="margin-left: 5%;">
            <legend style="
            font-size: 12px;
            margin-bottom: 0; ">{{legend}}</legend>
            

            <p>{{text}}</p>
            <!-- <input
            placeholder='Введите' 
            style="    
                            border: none; 
                            width: 100%; 
                            border-radius: 20px;
                            background-color:#d9e1e6;
                            color:black;
                            outline:none;
                            outline-color:#d9e1e6;" 
                            name="name"
            > -->
        </fieldset>
    </form>
</template>

<script>
export default {
    props: ['legend','text'],
    name: "LabelComponent",
    mounted() {
        console.log('Component mounted.')
    }
}
</script>

