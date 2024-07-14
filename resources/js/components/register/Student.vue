
<template>
<v-container >
<v-row class="justify-content-center">
  <v-col cols="12" class="justify-content-center">
    <v-card class="col-12" elevation="4">
      <v-card-title>  مرحــبا بك في منصة آرام </v-card-title>
        <v-card-text>
       
          <v-row> 
            <v-col cols="4">
              <v-select :items="companies" item-text="name" placeholder="الرجاء اختيار جهة منفذه" item-value="id" color="teal" v-model="company_id" @change="getCourses"></v-select>
            </v-col></v-row>
          <v-row>
            <v-col cols="4" v-for="cor in courses" key="id">
              <v-card  class="text-center" elevation="3" img="../img/case2.jpg" @click="newStudent(cor)">
                <v-card-title class="white--text justify-center"><h4>{{cor.course.name}}</h4></v-card-title>
                <v-card-text class="teal--text"> <v-icon color="teal">mdi-briefcase</v-icon></v-card-text>
              </v-card>
            </v-col>
          </v-row>
        </v-card-text>
    </v-card>
    <v-dialog v-model="newUserDialog" persistent max-width="450">
      <v-card>
        <v-card-title></v-card-title>
        <v-card-text>
          <v-form ref='city' v-model="valid">
            <v-row>
              <v-col>
                <!-- <v-select :items="courses" item-text="name" item-value="id" placeholder="إختر حقيبة" prepend-icon="mdi-briefcase" v-model="course_id" color="#0c8676" :rules="nameRules"></v-select> -->
                <v-text-field v-model="name" placeholder="    الإسم" prepend-icon="mdi-account" color="#0c8676" :rules="nameRules"></v-text-field>
                <v-text-field v-model="email" type="email" placeholder="  البــريد الإلكتروني" prepend-icon="mdi-email" color="#0c8676" :rules="nameRules"></v-text-field>
                <v-text-field v-model="phone" type="number" placeholder="  الجـوال " prepend-icon="mdi-phone" color="#0c8676" :rules="nameRules"></v-text-field>
                <v-select :items="national" item-value="id" item-text="name" v-model="isSaudi" placeholder="الجنســـية" prepend-icon="mdi-palm-tree" color="#0c8676"></v-select>
                <v-select v-model="age" :items="ageCategory" placeholder="   الفئة العمريه" prepend-icon="mdi-account" color="#0c8676" :rules="nameRules"></v-select>
                <v-text-field type="password" v-model="password" placeholder="  كلمة المــرور"  :rules="nameRules" prepend-icon="mdi-lock" color="#0c8676"></v-text-field>
                <v-text-field type="password" v-model="cpassword" placeholder="  أعد كلمة المــرور"  :rules="nameRules" prepend-icon="mdi-lock" color="#0c8676"></v-text-field>
                <v-checkbox  v-model="status" label="   أوافق على الشروط والأحكام" color="#0c8676" :rules="nameRules"></v-checkbox>       
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
      <span style="margin-right: 15% !important; color:white !important; font-size:16px !important">{{ text }}</span>
    </v-snackbar>
  </v-col>
</v-row>
<!-- </v-row> -->
</v-container>

</template>
<script>
    export default {
      data () {
        return {
          valid: false,
          nameRules: [
            v => !!v && !!v.trim() || ' الحقل مطلوب ',
          ],
          course_id:'',
          clearance:'',
          regulator:'',
          city:'',
          phone:'',
          name:'',
          email:'',
          password:'',
          cpassword:'',
          status:false,
          newUserDialog: false,
          snackbar: false,
          mode: '',
          timeout: 6000,
          text: 'Hello, I\'m a snackbar',
          color: '',
          users:[],
          courses:[],
          isSaudi:1,
          national:[
            {name: 'سعــودي',align:'center', id: 1},
            {name: 'غير سعودي', id: 0}
          ],
          companies:[],
          company_id:'',
          ageCategory: [
            {text: 'الإبتدائي ', value: 'إبتدائي'},
            {text: 'المتوسط ', value: 'المتوسط'},
            {text: 'الثانوي ', value: 'الثانوي'},
            {text: 'الجامعي ', value: 'الجامعي'},
            {text: 'أخرى ', value: 'أخرى'},
          ],
          age:'',
        }
      },
      mounted() {
        this.getCompanies();
      },
      methods:{
        getCompanies(){
            axios
          .get(`/api/companys`)
          .then((res) => {this.companies = res.data;})
          .finally(this.loading=false);
        },
       getCourses(){
            axios
          .get(`/api/coursesdetails?company_id=${this.company_id}`)
          .then((res) => {this.courses = res.data;})
          .finally(this.loading=false);
        },
        newStudent(course){
          this.newUserDialog=true;
          this.course_id = course.id;

        },
        createuser(){
          if (this.password === this.cpassword) {
            axios
            .post(`/api/student`,{
              email: this.email,
              name: this.name,
              password: this.password,
              isSaudi: this.isSaudi,
              phone: this.phone,
              course_id: this.course_id,
              company_id: this.company_id,
              age:this.age,
            })
            .then((res) => {
              this.snackbar=true;
              this.color = res.data.color;
              this.text = res.data.text;
              window.location.href = '/';
              // }
            }).catch((error) => {
                this.snackbar=true;
                this.color = 'error';
                this.text = 'تعذر إكمال العملية'
            }).finally(this.loading=false);
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
