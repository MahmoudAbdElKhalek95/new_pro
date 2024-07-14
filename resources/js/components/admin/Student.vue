
<template>
<v-container >
<v-row class="justify-content-center bg-light">
  <v-col cols="12" class="justify-content-center">
    <v-card class="col-12" elevation="4">
      <v-card-title>  حسـابات المتدربين</v-card-title>
      <v-card-text>
         <v-data-table
            :headers="headers"
            :items="users"
            :items-per-page="8"
            class="elevation-2"
          >
            <template v-slot:item.created_at="{ item }">{{item.created_at | profiledate}}</template>
            <template v-slot:item.isActive="{ item }">
                <!-- <v-chip v-model="item.isActive" @change="changeState(item.isActive, item.id)"></v-chip> -->
                <v-chip color="teal" text-color="white"  small v-if="item.isActive == true"  @click="changeState(false, item.id)">نشــط</v-chip>
                <v-chip class="ma-2" color="pink" text-color="white"  small v-else @click="changeState(true, item.id)">غير نشــط</v-chip>
            </template>
          </v-data-table>
      </v-card-text>
    </v-card>
  </v-col>
  <v-snackbar
      v-model="snackbar"
      :bottom="true"
      :left="false"
      :color="color"
      :right="false"
      :timeout="timeout"
      :top="false"
      :vertical="false"
       class="text-center"
       >
      <span style="margin-right: 25% !important; color:white !important; font-size:16px !important">{{ text }}</span>
    </v-snackbar>
</v-row>
<!-- </v-row> -->
</v-container>

</template>
<script>
    export default {
      data () {
        return {
          users:[],
          headers:[
            {text: 'الإسم ', value: 'name'},
            {text: 'الجوال', value: 'phone'},
            {text: 'السجل المدني', value: 'student.national'},
            {text: 'الحقيبة', value: 'student.company_course.course.name'},
            {text: 'الجهة المنفذه ', value: 'student.company_course.company.name'},
            {text: 'المدرب', align: 'center', value: 'student.company_course.trainer.name'},
            {text: ' ريال سعودي ', align: 'center', value: 'student.company_course.cost'},
          ],
          snackbar: false,
          mode: '',
          timeout: 6000,
          text: 'Hello, I\'m a snackbar',
          color: '',
        }
      },
      mounted() {
        this.getUsers();
      },
      methods:{
        getUsers(){
            axios
          .get(`/api/studentcourse`)
          .then((res) => {this.users = res.data;})
          .finally(this.loading=false);
        },
         changeState(sts,id){
          // console.log(id,sts);
           axios
          .put(`/api/changestatus`,{userid : id, new_status: sts})
          .then((res) => {
            this.getUsers();
            this.snackbar=true;
            this.color = res.data.color;
            this.text = res.data.text;
            })
          .finally(this.loading=false);
        },
      }
    }
</script>
<style>
.v-data-table table td {
  align-content: center !important;
  align-self: auto;
  font-size: 13px !important;
  text-align: center;
  /* padding: 7px !important; */
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
    "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji",
    "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
}

.v-data-table table th {
  font-size: 16px !important;
  background-color: #0c8676 !important;
  color: #fff !important;
}
</style>
