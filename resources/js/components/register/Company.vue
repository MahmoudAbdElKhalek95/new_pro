
<template>
<v-container >
<v-row class="justify-content-center bg-light">
  <v-col cols="12" class="justify-content-center">
    <v-card class="col-12" elevation="4">
      <v-card-title>إدارة الجهــــات المنفذة</v-card-title>
        <v-card-text>
          <v-form ref='city' v-model="valid">
            <v-row>
              <v-col>
                <v-text-field v-model="company_name" placeholder="  إسم الجهة " prepend-icon="mdi-home-variant" :rules="nameRules" color="#0c8676"></v-text-field>
                <v-text-field v-model="regulator" placeholder="  الجهة التابع لها " prepend-icon="mdi-home-city" color="#0c8676" :rules="nameRules"></v-text-field>
                <v-text-field v-model="clearance" placeholder="  رقم التصريح" prepend-icon="mdi-qrcode-scan" color="#0c8676" :rules="nameRules"></v-text-field>
                <v-select v-model="city" :items="cities" item-text="name" item-value="id" placeholder="  المنطقة " prepend-icon="mdi-marker" color="#0c8676" :rules="
                  [
                    city => !!city || ' غير صحيح'
                  ]
                "></v-select>

                <!-- <v-text-field v-model="city" placeholder="  المنطقة " prepend-icon="mdi-marker" color="#0c8676" :rules="nameRules"></v-text-field> -->
               <!-- <v-row><label>  -->
                 <v-checkbox  v-model="status" color="#0c8676">
                  <div slot='label' @click="goTerms()">&nbsp;&nbsp; أوافق على <a href="/terms" target="_blank">الشروط والأحكام</a> </div>
                  </v-checkbox>
                 <!--  أوافق على الشروط والأحكام</label></v-row> -->
              </v-col>
              <v-col>
                <!-- <v-text-field v-model="email" type="email" placeholder="  البــريد الإلكتروني" prepend-icon="mdi-email" color="#0c8676" :rules="nameRules"></v-text-field> -->
                <v-text-field v-model="email" type="email" placeholder="  البــريد الإلكتروني" prepend-icon="mdi-email" color="#0c8676" :rules="
                  [
                    v => !v  || /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'إيميل غير صحيح',
                    v => !!v.trim() || ' الحقل مطلوب ',
                  ]
                "></v-text-field>
                <v-text-field v-model="name" placeholder="   المدير التنفيذي" prepend-icon="mdi-account" color="#0c8676" :rules="nameRules"></v-text-field>
                <!-- <v-text-field v-model="phone" type="number" placeholder="  الجـوال " prepend-icon="mdi-phone" color="#0c8676" :rules="nameRules"></v-text-field> -->
                <v-text-field v-model="phone" dir="ltr" suffix="05" counter="8" type="phone" placeholder="  الجـوال " prepend-icon="mdi-phone" color="#0c8676" :rules="
                  [
                    () => !!phone || 'This field is required',
                    () => !!phone && phone.length == 8 || 'الرجاء مراجعة رقم الهاتف',
                    () => !!phone && !isNaN(parseFloat(phone)) && isFinite(phone) || 'رقم هاتف غير صحيح',
                  ]
                "></v-text-field>
                <v-text-field type="password" v-model="password" placeholder="  كلمة المــرور"  :rules="nameRules" prepend-icon="mdi-lock" color="#0c8676"></v-text-field>
                <v-text-field type="password" v-model="cpassword" placeholder="  أعد كلمة المــرور"  :rules="nameRules" prepend-icon="mdi-lock" color="#0c8676"></v-text-field>

              </v-col>

            </v-row>
            <v-file-input v-model="doc" label="صورة التصريح" color="#0c8676"></v-file-input>
          </v-form>

        </v-card-text>
        <v-card-actions>

          <v-btn
            text
            :href="'/register'"
          >
            رجـــوع
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
            تسجـــيل
          </v-btn>
        </v-card-actions>
    </v-card>
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
          company_name:'',
          clearance:'',
          regulator:'',
          city:'',
          phone:'',
          name:'',
          email:'',
          password:'',
          cpassword:'',
          status:true,
          editUserDialog: false,
          newUserDialog: false,
          snackbar: false,
          mode: '',
          timeout: 6000,
          text: 'Hello, I\'m a snackbar',
          color: '',
          selectedUser:[],
          users:[],
          usersheaders:[
            {text: 'إسم الجهة', value: 'company.name'},
            {text: 'الجهة المشرعه ', value: 'company.regulator'},
            {text: 'العنوان', value: 'company.city'},
            {text: 'الجوال', value: 'phone'},
            {text: 'الإيميل', value: 'email'},
            {text: 'حالة الحساب', align: 'center', value: 'isActive'},
            {text: 'تاريخ الإنضمام ', value: 'created_at'},
            {text: ' عمليات ', value: 'updated_at'}
          ],
          cities:[],
          doc:'',
        }
      },
      mounted() {
        // this.getUsers();
        this.getCities();
      },
      methods:{
        goTerms(){
          window.open('/terms','_blank');
        },
        getCities(){
          axios
          .get(`/api/city`)
          .then((res) => {this.cities = res.data;})
          .finally(this.loading=false);
        },
        createuser(){
          if (this.password === this.cpassword) {
            let formData = new FormData();
            formData.append('doc', this.doc);
            axios
            .post(`/api/company?email=${this.email}&name=${this.name}&company=${this.company_name}&clearance=${this.clearance}
            &password=${this.password}&status=${this.status}&phone=${this.phone}&regulator=${this.regulator}&city=${this.city}`
            ,formData,{
              headers:{'Content-Type': 'multipart/form-data'}})
            .then((res) => {
              this.snackbar=true;
              this.color = res.data.color;
              this.text = res.data.text;
              window.location.href = '/';
              // }
            }).catch((error) => {
                this.snackbar=true;
                this.color = 'error';
                this.text = 'الايميل مستخدم مسبقا'
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
