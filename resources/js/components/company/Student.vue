
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
            <template v-slot:top>
              <v-row>
                <v-col><v-spacer></v-spacer></v-col>
                <v-col cols="2" class="text-center mb-2">
                    <v-btn fab small @click="newUserDialog=true"><v-icon color="#0c8676">mdi-plus</v-icon></v-btn>
                </v-col>
              </v-row>
            </template>
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
  <v-dialog v-model="newUserDialog" persistent max-width="450">
      <v-card>
        <v-card-title></v-card-title>
        <v-card-text>
          <v-form ref='city' v-model="valid">
            <v-row>
              <v-col>
                <v-select :items="courses" item-text="name" item-value="id" placeholder="إختر حقيبة" prepend-icon="mdi-briefcase" v-model="course_id" color="#0c8676" :rules="nameRules"></v-select>
                <v-text-field v-model="name" placeholder="    الإسم" prepend-icon="mdi-account" color="#0c8676" :rules="nameRules"></v-text-field>
                <v-text-field v-model="phone" dir="ltr" suffix="05" counter="8" type="phone" placeholder="  الجـوال " prepend-icon="mdi-phone" color="#0c8676" :rules="
                  [
                    () => !!phone || '  الحقل مطلــوب ',
                    () => !!phone && phone.length == 8 || 'الرجاء مراجعة رقم الهاتف',
                    () => !!phone && !isNaN(parseFloat(phone)) && isFinite(phone) || 'رقم هاتف غير صحيح',
                  ]
                "></v-text-field>
                <v-text-field v-model="national" placeholder="  السجل المدني " counter="10" prepend-icon="mdi-palm-tree" color="#0c8676" :rules="
                 [
                    () => !!national || 'الحقل مطلــوب ',
                    () => !!national && national.length == 10 || '',
                    () => !!national && !isNaN(parseFloat(national)) && isFinite(national) || 'رقم السجل غير صحيح',

                  ]
                "></v-text-field>
                <v-select v-model="age" :items="ageCategory" placeholder="   الفئة العمريه" prepend-icon="mdi-account" color="#0c8676" :rules="nameRules"></v-select>
              </v-col>
            </v-row>
          </v-form>
        </v-card-text>
        <v-card-actions>
           <v-btn
          color="grey darken-1"
          text
          @click="newUserDialog = false"
        >
          إلغاء
        </v-btn>
        <v-spacer></v-spacer>
        <v-btn
          color="teal"
          :disabled="!valid"
          class="white--text"
          @click="createuser()"
        >
          <!-- <v-icon>
            mdi-plus
          </v-icon> -->
          إشتــــراك
        </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
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
      props: ['company'],
      data () {
        return {
          valid:false,
          nameRules: [
            v => !!v || 'الخانه مطلوبة',
          ],
          newUserDialog: false,
          phone:'',
          name:'',
          national:'',
          p:'TL6xamkE9NuekepH',
          psdf:'TL6xamkE9NuekepH',
          ageCategory: [
            {text: 'الإبتدائي ', value: 'إبتدائي'},
            {text: 'المتوسط ', value: 'المتوسط'},
            {text: 'الثانوي ', value: 'الثانوي'},
            {text: 'الجامعي ', value: 'الجامعي'},
            {text: 'أخرى ', value: 'أخرى'},
          ],
          age:'',
          courses:[],
          course_id:'',
          users:[],
          headers:[
            {text: 'الإسم ', value: 'name'},
            {text: 'الجوال', value: 'user.phone'},
            {text: 'السجل المدني', value: 'national'},
            {text: 'الحقيبة', value: 'company_course.course.name'},
            // {text: 'الجهة المنفذه ', value: 'company_course.company.name'},
            {text: 'المدرب', align: 'center', value: 'company_course.trainer.name'},
            {text: ' ريال سعودي ', align: 'center', value: 'company_course.cost'},
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
        this.getCourses();
      },
      methods:{
        getUsers(){
          let self =this;
            axios
          .get(`/api/companyStudents?company_id=${self.company}`)
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
        getCourses(){
          let self =this;
            axios
          .get(`/api/companycourses?company_id=${self.company}`)
          .then((res) => {this.courses = res.data;})
          .finally(this.loading=false);
        },
         createuser(){
          if (this.password === this.cpassword) {
            let self = this;
            axios
            .post(`/api/student`,{
              name: this.name,
              password: this.password,
              national: this.national,
              phone: this.phone,
              course_id: this.course_id,
              company_id: self.company,
              age:this.age,
            })
            .then((res) => {
              this.snackbar=true;
              this.color = res.data.color;
              this.text = res.data.text;
              this.getUsers();
              // }
            }).catch((error) => {
                this.snackbar=true;
                this.color = 'error';
                this.text = 'تعذر إكمال العملية'
            }).finally(this.newUserDialog=false);
          } else {
              this.snackbar=true;
            this.color = 'error';
            this.text = 'كلمة المرور غير متطابقة'
          }
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
