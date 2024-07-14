
<template>
<v-container >
<v-row class="justify-content-center bg-light">
  <v-col cols="12" class="justify-content-center">
    <v-card class="col-12" elevation="3">

      <v-card-title>
        لــوحة التحــــكم
      </v-card-title>
      <v-card-text>
        <v-row>
          <v-col class="col-md-4 col-sm-12">
            <v-card elevation="3">
              <v-card-title class="bg-teal">الجهات</v-card-title>
              <v-card-text class="text-center mt-3">
                    <v-progress-circular
                      :size="120"
                      :width="10"
                      color="teal"
                      value="100"
                    > <h4>{{ stats.companies }}</h4></v-progress-circular>
              </v-card-text>
            </v-card>
          </v-col>
          <v-col class="col-md-4 col-sm-12">
            <v-card elevation="3">
              <v-card-title class="bg-pink">المدربين</v-card-title>
              <v-card-text class="text-center mt-3">
                    <v-progress-circular
                      :size="120"
                      :width="10"
                      color="pink"
                      value="100"
                    > <h4>{{ stats.trainers }}</h4></v-progress-circular>
              </v-card-text>
            </v-card>
          </v-col>
           <v-col class="col-md-4 col-sm-12">
            <v-card elevation="3">
              <v-card-title class="bg-purple">المتدربين</v-card-title>
              <v-card-text class="text-center mt-3">
                    <v-progress-circular
                      :size="120"
                      :width="10"
                      color="purple"
                      value="100"
                    > <h4>{{ stats.students }}</h4></v-progress-circular>
              </v-card-text>
            </v-card>
          </v-col>
        </v-row>
      </v-card-text>
    </v-card>
  </v-col>
 <!-- <v-col cols="12" class="justify-content-center">
    <v-card class="col-12" elevation="3">

      <v-card-title>
        أحدث الطــــلبات
      </v-card-title>
      <v-card-text>
         <v-data-table
            :headers="headers"
            :items="courses"
            :items-per-page="8"
            class="elevation-2"
          >
            <template v-slot:item.created_at="{ item }">{{item.created_at | profiledate}}</template>
          </v-data-table>
      </v-card-text>
    </v-card>
  </v-col> -->
</v-row>

<!-- </v-row> -->
</v-container>

</template>
<script>
    export default {
      data () {
        return {
          stats: [], 
          courses: [],
          headers:[
            {text: 'الإسم ', value: 'name'},
            {text: 'الجوال', value: 'phone'},
            {text: 'السجل المدني', value: 'student.national'},
            {text: 'الحقيبة', value: 'student.company_course.course.name'},
            {text: 'الجهة المنفذه ', value: 'student.company_course.company.name'},
            {text: 'المدرب', align: 'center', value: 'student.company_course.trainer.name'},
            {text: ' ريال سعودي ', align: 'center', value: 'student.company_course.cost'},
          ], 
        }
      },
      mounted() {
        this.getStats();
        this.getorders();
      },
      methods:{
        getStats(){
             axios
          .get(`/api/adminstats`)
          .then((res) => {this.stats = res.data;})
          .finally(this.loading=false);
        },
        getorders(){
          axios
          .get(`/api/studentcourse`)
          .then((res) => {this.courses = res.data;})
          .finally(this.loading=false);
        }
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
  background-color: #5c110e !important;
  color: #fff !important;
}
</style>
