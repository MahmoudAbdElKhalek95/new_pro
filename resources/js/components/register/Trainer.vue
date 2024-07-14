
<template>
<v-container >
<v-row class="justify-content-center bg-light">
  <v-col cols="12" class="justify-content-center">
    <v-card class="col-12" elevation="4">
      <v-card-title>تسجـــيل  المدربين</v-card-title>
        <v-card-text>
          <v-form ref='city' v-model="valid">
                <!-- <v-text-field v-model="email" type="email" placeholder="  البــريد الإلكتروني" prepend-icon="mdi-email" color="#0c8676" :rules="nameRules"></v-text-field> -->
                <v-text-field v-model="email" type="email" placeholder="  البــريد الإلكتروني" prepend-icon="mdi-email" color="#0c8676" :rules="
                  [
                    v => !v  || /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'إيميل غير صحيح',
                    v => !!v.trim() || ' الحقل مطلوب ',
                  ]
                "></v-text-field>
                <v-text-field v-model="name" placeholder="    الإسم ثلاثي" prepend-icon="mdi-account" color="#0c8676" :rules="nameRules"></v-text-field>
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
                <!-- <v-text-field v-model="city" placeholder="  المدينــة " prepend-icon="mdi-marker" color="#0c8676" :rules="nameRules"></v-text-field> -->
                <v-select v-model="city" :items="cities" item-text="name" item-value="name" placeholder="  المنطقة " prepend-icon="mdi-marker" color="#0c8676" :rules="
                [
                    city => !!city || ' غير صحيح'
                  ]
                "></v-select>
                <v-file-input v-model="image" label="الصورة الشخصية" color="#0c8676"></v-file-input>
                <v-file-input v-model="cert" label="شهادة إعتماد التدريب" color="#0c8676"></v-file-input>
                <v-checkbox  v-model="remotework" label=" أوافق على العمل خارج المنطقة" color="#0c8676" ></v-checkbox>
                <!-- <v-checkbox  v-model="status" label=" أوافق على الشروط والأحكام" color="#0c8676" :rules="nameRules"></v-checkbox> -->
                <v-checkbox  v-model="status" color="#0c8676" required>  
                  <div slot='label' @click="goTerms()">&nbsp;&nbsp; أوافق على <a href="/terms" target="_blank">الشروط والأحكام</a> </div>
                  </v-checkbox>
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
          image:'',
          newimage:'',
          cert:'',
          newcert:'',
          city:'',
          phone:'',
          name:'',
          email:'',
          password:'',
          cpassword:'',
          remotework:false,
          status:true,
          newUserDialog: false,
          snackbar: false,
          mode: '',
          timeout: 6000,
          text: 'Hello, I\'m a snackbar',
          color: '',
          users:[],
          usersheaders:[
            {text: 'الإسم ', value: 'name'},
            {text: 'العنوان', value: 'trainer.city'},
            {text: 'الجوال', value: 'phone'},
            {text: 'الإيميل', value: 'email'},
            {text: 'حالة الحساب', align: 'center', value: 'isActive'},
            {text: ' الصورة ', value: 'created_at'},
            {text: ' شهادة الإعتماد ', align:'center', value: 'id'},
            {text: ' عمليات ', value: 'updated_at'}
          ],
          showPicDialog: false,
          selectedImage: '',
          selectedUser:[],
          editUserDialog: false,
          cities:[],
        }
      },
      mounted() {
        // this.getUsers();
        this.getCities();
      },
      methods:{
        getCities(){
          axios
          .get(`/api/city`)
          .then((res) => {this.cities = res.data;})
          .finally(this.loading=false);
        },
        goTerms(){
          window.open('/terms','_blank');
        },
        createuser(){
          if (this.password === this.cpassword) {
            let formData = new FormData();
            formData.append('image', this.image);
            formData.append('cert', this.cert);
            axios
            .post(`/api/trainer?email=${this.email}&remote_work=${this.remotework}&name=${this.name}&password=${this.password}&status=${this.status}&phone=${this.phone}&city=${this.city}`,formData,{headers:{'Content-Type': 'multipart/form-data'}})
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
         editUser(user){
          this.selectedUser = user;
          this.editUserDialog = true;
        },
        updateUser(){
             let formData = new FormData();
            formData.append('image', this.newimage);
            formData.append('cert', this.newcert);
            // formData.append('phone', this.selectedUser.phone);
            axios
            .put(`/api/trainer?phone=${this.selectedUser.phone}&city=${this.selectedUser.city}&name=${this.selectedUser.name}`,
            formData,{headers:{'Content-Type': 'multipart/form-data'}})
            .then((res) => {
              this.getUsers();
              this.editUserDialog=false;
              this.snackbar=true;
              this.color = res.data.color;
              this.text = res.data.text;
              // }
            }).catch((error) => {
                this.snackbar=true;
                this.color = 'error';
                this.text = 'تعذر إكمال العملية'
            }).finally(this.loading=false);
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
  background-color: #0c8676 !important;
  color: #fff !important;
}
</style>
