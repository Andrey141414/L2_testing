<template>
    <div class="container-lg">
        <!-- <div > -->
        <!-- <div class="col-md-8"> -->
        <div class="mt-5">
            <h2 style="text-align: center;">АКТ О ПРОДАЖЕ И ОТПУСКЕ ИЗДЕЛИЙ КУХНИ</h2>
            <div style="
                                    display: flex;
                                    flex-direction: row;
                                    justify-content: space-between;">
                <h2></h2>
                <h5>Форма по ОКУД - 0330511</h5>
            </div>

            
            <!-- <button v-on:click="checkValues">TEST</button> -->
            <div style="
                        display: flex;
                        flex-direction: row;
                        justify-content: space-between;">
                <div>
                    <InputComponent @get_value_from_input="setValue" class="mt-4" field="organization" text="Организация">
                    </InputComponent>
                    <InputComponent @get_value_from_input="setValue" class="mt-4" field="division"
                        text="Структурное подразделение">
                    </InputComponent>
                </div>
                <div>
                    <InputComponent @get_value_from_input="setValue" class="mt-4" field="documentNumber"
                        text="Номер документа"></InputComponent>
                    <!-- изменить тип инпута на date -->
                    <InputComponent @get_value_from_input="setValue" class="mt-4" field="createtAt" text="Дата составления">
                    </InputComponent>
                    <InputComponent @get_value_from_input="setValue" class="mt-4" field="OKPO" text="Код ОКПО">
                    </InputComponent>
                    <InputComponent @get_value_from_input="setValue" class="mt-4" field="OKPD"
                        text="Вид деятельности по ОКДП">
                    </InputComponent>
                </div>
            </div>

            <h5 class="mt-3">Коммисия усановила:</h5>
            <LabelComponent class="mt-3" legend="Наименование" text="Продано за наличный расчет:"></LabelComponent>
            <FirstTableComponent @get_value_from_table="setValueTable" class="mt-3 mb-5"></FirstTableComponent>




            <div style="
                        display: flex;
                        flex-direction: row;">
                <LabelComponent class="mt-5" legend="Наименование"
                    text="Отпущено сотрудникам организации по акту в филиалы и буфеты, мелкорозничную сеть">
                </LabelComponent>
                <InputComponent @get_value_from_input="setValue" field="actNumber"
                    style="height: 70%; margin-left: 1rem; width:120px" class="mt-5" text="№ акта">
                </InputComponent>
                <InputComponent @get_value_from_input="setValue" field="actCreatetAt"
                    style="height: 70%; margin-left: 1rem; width:200px" class="mt-5" text="От"></InputComponent>
            </div>

            <SecondTableComponent @get_value_from_table="setValueTable" class="mt-3 mb-5"></SecondTableComponent>


            <div style="
                    display: flex;
                    flex-direction: row;
                    justify-content: space-between;">
                <div>
                    <h4>Израсходовано на приготовление блюд:</h4>
                    <ThirdTableComponent @get_value_from_table="setValueTable"></ThirdTableComponent>
                </div>
                <div style="margin-right: 20%;">
                    <h3>ИТОГО:</h3>
                    <form style="border: none;background-color:#d9e1e6;width: 400px;border-radius: 20px">
                        <fieldset style="margin-left: 5%;">
                            <legend style="font-size: 12px;margin-bottom: 0; ">Выручка кассы</legend>
                            <p>{{ revenue.toFixed(2) }}</p>
                        </fieldset>
                    </form>
                </div>
            </div>

            <div style="
                                    margin-top: 10%;">
                <h4>Члены Комиссии:</h4>
                <CommissionMembersTableComponent @get_value_from_table="setValueTable"></CommissionMembersTableComponent>
            </div>
            


            <h6 style="
            margin-top: 10%;">Сформировать EXEL документ</h6>
            <input 
             type="file" ref="file" @change="readFile($event)"/>






        </div>
    </div>
    <!-- </div> -->
    <!-- </div> -->
</template>

<script>
import InputComponent from './InputComponent.vue'
import FirstTableComponent from './FirstTableComponent.vue'
import LabelComponent from './LabelComponent.vue'
import SecondTableComponent from './SecondTableComponent.vue'
import ThirdTableComponent from './ThirdTableComponent.vue'
import CommissionMembersTableComponent from './CommissionMembersTableComponent.vue'

import Excel from 'exceljs'
import * as FileSaver from 'file-saver'


export default {

    components: {
        InputComponent,
        FirstTableComponent,
        LabelComponent,
        SecondTableComponent,
        ThirdTableComponent,
        CommissionMembersTableComponent,
    },
    data() {
        return {
           isInput: false,

            inputValues: new Map(
                [
                    ["organization", "456"],
                    ["division", ""],
                    ["documentNumber", ""],
                    ["createtAt", ""],
                    ["OKPO", ""],
                    ["OKPD", ""],
                    ["actCreatetAt", ""],
                    ["actNumber", ""],
                ]),

            revenue: 0.0,
            revenueS: "0.0",
            FirstTable: new Map(),
            SecondTable: null,
            ThirdTable: null,
            CommissionMembersTable: null,

            ExelFile: null,
        };
    },
    watch: {
        FirstTableComponent: function () {
            console.log(1313);
            let str = "";

            new Map([['foo', 3], ['bar', {}], ['baz', undefined]])
                .forEach(element => function () {
                    //let str = "";
                    if (element) {
                        str += element;
                    }
                });
            // this.FirstTableComponent.forEach(element => {
            //     //let str = "";
            //     if(element)
            //     {
            //         str+=element;
            //     }
            // });
            console.log(str);
            //this.$emit('get_value_from_table', this.tableValues);
        },
    },
    methods: {
        setValue(field, value) {

            this.inputValues.set(field, value);
            console.log(this.inputValues);
        },
        setValueTable(table, tableName) {

            this.revenue = 0.0;
            switch (tableName) {
                case "FirstTable": { this.FirstTable = table; }
                    break;
                case "SecondTable": { this.SecondTable = table; }
                    break;
                case "ThirdTable": { this.ThirdTable = table; }
                    break;
                case "CommissionMembersTable": this.CommissionMembersTable = table;
                    break;
                default:
                    break;
            }

            this.revenue = this.calculate(this.FirstTable) + this.calculate(this.SecondTable) + this.calculate(this.ThirdTable);
            this.revenueS = toString(this.revenue.toFixed(2));
        },

        calculate(table) {
            let sum = 0.0

            if (table) {
                table.forEach((element,key) => {
                    
                    if (element && 
                        key.toLowerCase().indexOf("note") == -1 &&
                        key.toLowerCase().indexOf("persent") == -1 ) {
                        sum += Number(element);
                    }
                });
            }
            return sum;
        },
        testing() {
            this.revenue += 0.1;
            this.revenueS = toString(this.revenue.toFixed(2));
            //this.revenue = this.revenue.toFixed(2);

            return;

        },
        readFile(e) {

            // if(this.isInput == false)
            // {
            //     alert('Не все поля заполнены');
            //     return;
            // }
            const file = e.target.files[0];
            const wb = new Excel.Workbook();
            const reader = new FileReader();
            reader.readAsArrayBuffer(file);
            reader.onload = () => {
                const buffer = reader.result;
                console.log('workbook 1212 instance');
                wb.xlsx.load(buffer).then((workbook) => {
                    this.insertValues(workbook.worksheets[0]);
                    this.save(workbook);
                });
            };
        },

        insertValues(worksheet)
        {
           
            worksheet.getCell('A6').value = this.inputValues.get('organization');
            worksheet.getCell('A8').value = this.inputValues.get('division');
            worksheet.getCell('AC15').value = this.inputValues.get('documentNumber');
            worksheet.getCell('AI15').value = this.inputValues.get('createtAt');
            worksheet.getCell('AV6').value = this.inputValues.get('OKPO');
            worksheet.getCell('AV9').value = this.inputValues.get('OKPD');
            worksheet.getCell('F33').value = this.inputValues.get('actNumber');

            worksheet.getCell('H52').value =this.revenue;

            //first table 


            worksheet.getCell('Z27').value = this.FirstTable.get('commonAccounting');
            worksheet.getCell('Z29').value = this.FirstTable.get('houseAccounting');
            worksheet.getCell('Z28').value = this.FirstTable.get('portionAccounting');


            worksheet.getCell('AI27').value = this.FirstTable.get('commonSale');
            worksheet.getCell('AI28').value = this.FirstTable.get('portionSale');
            worksheet.getCell('AI29').value = this.FirstTable.get('houseSale');
            
            worksheet.getCell('AV27').value = this.FirstTable.get('commonNote');
            worksheet.getCell('AV28').value = this.FirstTable.get('portionNote');
            worksheet.getCell('AV29').value = this.FirstTable.get('houseNote');

            //second table 
            worksheet.getCell('Z31').value = this.SecondTable.get('accounting');
            worksheet.getCell('AI31').value = this.SecondTable.get('sale');
            worksheet.getCell('AV31').value = this.SecondTable.get('note');
            

            //third table 
            worksheet.getCell('E41').value = this.ThirdTable.get('saltPersent');
            worksheet.getCell('F39').value = this.ThirdTable.get('spicesPersent');
            worksheet.getCell('X41').value = this.ThirdTable.get('saltSumm');
            worksheet.getCell('X39').value = this.ThirdTable.get('spicesSumm');

           
            worksheet.getCell('A46').value = this.CommissionMembersTable[0].get('post');
            worksheet.getCell('AF46').value = this.CommissionMembersTable[0].get('person');

            
            worksheet.getCell('H48').value = this.CommissionMembersTable[1].get('post');
            worksheet.getCell('AF48').value = this.CommissionMembersTable[1].get('person');

            
            worksheet.getCell('H48').value = this.CommissionMembersTable[2].get('post');
            worksheet.getCell('AF50').value = this.CommissionMembersTable[2].get('person');

            //worksheet.getCell('Z26').value = this.inputValues.get('actNumber');
        },

        save(wb) {
            try {
                // const ws = wb.getWorksheet('стр1 - Tаблица 1');
                // setupWorksheet(ws);
                wb.xlsx.writeBuffer().then((data) => {
                    const blob = new Blob([data]);
                    FileSaver.saveAs(blob, `Document.xlsx`);
                });
            } catch (error) {
                console.log("error");
            }
        },

        checkValues(){
            
           this.isInput = true;

            if(this.FirstTable.size  == 0 ||
            !this.SecondTable||
            !this.ThirdTable||
            !this.CommissionMembersTable||
            !this.inputValues)
            {
                console.log('Error');
               this.isInput = false;
            }

            this.inputValues.forEach((values,keys)=>{
                if(values == null || values == '')
                {
                   this.isInput = false;
                    return;
                }
            })

            this.FirstTable.forEach((values,keys)=>{
                if(values == null || values == '')
                {
                   this.isInput = false;
                    return;
                }
            })

            this.SecondTable.forEach((values,keys)=>{
                if(values == null || values == '')
                {
                   this.isInput = false;
                    return;
                }
            })

            this.ThirdTable.forEach((values,keys)=>{
                if(values == null || values == '')
                {
                   this.isInput = false;
                    return;
                }
            })

            if(this.CommissionMembersTable.size != 3)
            {
                this.isInput = false;
                    return;
            }

            this.CommissionMembersTable.forEach((values,keys)=>{
                if(values == null || values == '')
                {
                   this.isInput = false;
                    return;
                }
            })

            
        },

        numToPr(number){
            const
                h = ['сто', 'двести', 'триста', 'четыреста', 'пятьсот', 'шестьсот', 'семьсот', 'восемьсот', 'девятьсот'],
                t = ['', 'двадцать', 'тридцать', 'сорок', 'пятьдесят', 'шестьдесят', 'семьдесят', 'восемьдесят', 'девяносто'],
                o = ['один', 'два', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'],
                p = ['одиннацать', 'двенадцать', 'тринадцать', 'четырнадцать', 'пятнадцать', 'шестнадцать', 'семнадцать', 'восемнадцать', 'девятнадцать'];
            let str = number.toString(), out = '';

            if(str.length == 1) return o[number-1];
            else if(str.length == 2){
                if(str[0] == 1) out = p[parseInt(str[1])-1];
                else out = (t[parseInt(str[0])-1] + ((str[1]!='0')?(' ' + o[parseInt(str[1])-1]):''));
            }
            else if(str.length == 3){
                out = (h[parseInt(str[0])-1] + ((str[1]!='0')?(' ' + t[parseInt(str[1])-1]):'') + ((str[2]!='0')?(' ' + o[parseInt(str[2])-1]):''));
            }

            let arr = out.split('');
            arr[0] = arr[0].toUpperCase();
            out = arr.join('');
            return out;
        },

        exportExcel: function () {
            const fileName = 'simple.xlsx';

            const wb = new Excel.Workbook();
            const ws = wb.addWorksheet('My Sheet');


            wb.xlsx.load(this.ExelFile).then((workbook) => {
                console.log(13245)
            });

            return;
            ws.getCell('A1').value = 'John Doe';
            ws.getCell('B1').value = 'gardener';
            ws.getCell('C1').value = new Date().toLocaleString();

            const r3 = ws.getRow(3);
            r3.values = [1, 2, 3, 4, 5, 6];

            wb.xlsx
                .writeFile(this.ExelFile.name)
                .then(() => {
                    console.log('file created');
                })
                .catch(err => {
                    console.log(err.message);
                });
            return;
            let filename = './LAW_26677.attach_LAW_26677_11.XLSX';

            var workbook = new ExcelJS.Workbook();
            workbook.xlsx.readFile(filename).then(() => {
                console.log(123456);
            });
            //workbook.xlsx.readFile(filename);


        },
    }
}
</script>
<!-- 
// this.FirstTable = table;
            // console.log("Table");
            
             //console.log(this.FirstTable);
             //console.log(this.SecondTable);
             //console.log(this.ThirdTable);
             //console.log(this.CommissionMembersTable); -->

<!-- <div class="row">
    <div class="col-sm">
        <h4>АКТ О ПРОДАЖЕ И ОТПУСКЕ ИЗДЕЛИЙ КУХНИ</h4>
    </div>

    <div class="col-sm">
        <div style="display: inline-block;" class="mr-0"> <input type="date" placeholder="Дата создания" ></div>
        <div><input placeholder="Номер документа"></div>
    </div>
</div>
<div>
    <input placeholder="Код ОКПО">
</div>

<div>
    <input placeholder="Организация">
</div>

<div>
    <input placeholder="Структурное подразделение">
</div>

<div>
    <input placeholder="Форма по ОКУД">
</div>

<div>
    <input placeholder="Вид деятельности по ОКДП">
</div>

<div>
    <input placeholder="Вид операции">
</div> -->