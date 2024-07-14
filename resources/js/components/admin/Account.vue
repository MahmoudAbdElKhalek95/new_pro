
<template>
<v-container>
<v-row class="justify-content-center bg-light mt-5 pt-6">
  <v-col cols="6" class="justify-content-center mt-6 pt-6">
    <v-card  elevation="4">

      <v-card-title>
        بيانات الحساب 
        <v-spacer></v-spacer>
           <v-btn  small  @click="dialog=true">
              <!-- <v-btn fab small  color="teal" class="white--text" @click="dialog=true"> -->
                <v-icon color="teal">mdi-lock</v-icon> تغــيير كلمة المرور 
              </v-btn>
      </v-card-title>
      <v-card-text>
     
        <v-form v-model="valid">
           <!-- <v-text-field readonly v-model="userid" label="Account ID" ></v-text-field> -->
           <v-text-field  v-model="userinfo.name" prepend-icon="mdi-account" ></v-text-field>
           <v-text-field readonly v-model="userinfo.email"  prepend-icon="mdi-email" ></v-text-field>
           <!-- <v-text-field  v-model="userinfo.phone"  prepend-icon="mdi-phone" ></v-text-field> -->
           
                <v-text-field v-model="userinfo.phone" dir="ltr" counter="10" type="phone" placeholder="  الجـوال " prepend-icon="mdi-phone" color="#0c8676" :rules="
                [
              () => !!userinfo.phone || 'This field is required',
              () => !!userinfo.phone && userinfo.phone.length == 10 || 'الرجاء مراجعة رقم الهاتف',
              () => !!userinfo.phone && !isNaN(parseFloat(userinfo.phone)) && isFinite(userinfo.phone) || 'رقم هاتف غير صحيح',
            ]
                "></v-text-field>
           <hr>
           <label>  آخر تحديــث</label> <label>{{ userinfo.updated_at | profiledate}}</label> <br>
           <!-- <label> Last Updated At</label> <label>{{ updated_at | momentDateTime}}</label> <br> -->
           <!-- <v-text-field disabled v-model="updated_at" label="Last Update" ></v-text-field> -->
        </v-form>
      </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn color="teal" class="white--text"  :disabled="!valid" @click="updatephone()">تحديــث</v-btn>
      </v-card-actions>
    </v-card>
  </v-col>
  <v-col v-if="this.role.id==3" cols="6" class="justify-content-center mt-6 pt-6">
    <v-card  elevation="4">
      <v-card-title>
            بيانات الشركة 
      </v-card-title>
      <v-card-text>
          <table class="table">
          <tr>
            <td>  ملف التعريف :</td>
            <td colspan="2"> 
             <a v-if="companydetails.doc_path " rel="icon" target="_blank" :href="'../storage/'+companydetails.doc_path"> <v-icon large color="teal">mdi-paperclip</v-icon></a>
            </td>
            <td><v-btn color="teal" class="white--text" @click="editDoc=true">تغــيير</v-btn></td>
          </tr>
          </table>
      </v-card-text>
    </v-card>
  </v-col>
  <v-col v-if="this.role.id==4" cols="6" class="justify-content-center mt-6 pt-6">
    <v-card  elevation="4">
      <v-card-title>
          الملف الشخصي
      </v-card-title>
      <v-card-text>
        <table class="table">
          <tr>
            <td> الصورة الشخصية :</td>
            <td colspan="2"> 
              <v-img v-if="trainerdetails.path"
                class="elevation-2"
                max-height="60"
                max-width="80" 
                :src="'../storage/'+trainerdetails.path"
              ></v-img>
            </td>
            <td><v-btn color="teal" class="white--text" @click="editImage=true">تغــيير</v-btn></td>
          </tr>
        
          <tr>
            <td>شهادة الإعتماد</td>
            <td colspan="2">
              <a v-if="trainerdetails.cert_path " rel="icon" target="_blank" :href="'../storage/'+trainerdetails.cert_path"> <v-icon>mdi-paperclip</v-icon></a>
            </td>
              <td><v-btn color="teal" class="white--text" @click="editCert=true">تغــيير</v-btn></td>
          </tr>
          <tr>
            <td>العمل خارج المنطقة</td>
            <td colspan="2">
              <v-chip v-if="trainerdetails.remote_work==0" text-color="red" @click="changeWork()">لا أوافق</v-chip>
              <v-chip v-if="trainerdetails.remote_work==1" text-color="white" color="teal" @click="changeWork()"> أوافق</v-chip>
            </td>
             <td></td>
             <!-- <td><v-btn color="teal" class="white--text">تغــيير</v-btn></td> -->
          </tr>
        </table>
         
      </v-card-text>
    </v-card>
  </v-col>
    <v-dialog
      v-model="editDoc"
      max-width="400">
      <v-card>
        <v-card-text class="text-center">
          <br>
          <br>
          <v-form ref='city' v-model="valid5">
            <v-file-input v-model="doc" label=" مسنتد الشركة" color="#0c8676"></v-file-input>
          </v-form>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="teal" text small class="white--text" @click="editDoc=false">إلغاء</v-btn>
          <v-btn color="teal"  :disabled="!valid5" small class="white--text" @click="changeDoc()">حفــظ</v-btn>
        </v-card-actions>
      </v-card>
      </v-dialog>
    <v-dialog
      v-model="editImage"
      max-width="400">
      <v-card>
        <v-card-text class="text-center">
          <br>
          <br>
          <v-form ref='city' v-model="valid3">
            <v-file-input v-model="image" label="الصورة الشخصية" color="#0c8676" :rules="nameRules"></v-file-input>
          </v-form>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="teal" text small class="white--text" @click="editImage=false">إلغاء</v-btn>
          <v-btn color="teal"  :disabled="!valid3" small class="white--text" @click="changeImage()">حفــظ</v-btn>
        </v-card-actions>
      </v-card>
      </v-dialog>
      <v-dialog
      v-model="editCert"
      max-width="400">
      <v-card>
        <v-card-text class="text-center">
          <br>
          <br>
          <v-form ref='city' v-model="valid4">
            <v-file-input v-model="cert" label="شهادة إعتماد التدريب" color="#0c8676" :rules="nameRules"></v-file-input>
           </v-form>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="teal" text small class="white--text" @click="editCert=false">إلغاء</v-btn>
          <v-btn color="teal"  :disabled="!valid4" small class="white--text" @click="changeCert()">حفــظ</v-btn>
        </v-card-actions>
      </v-card>
      </v-dialog>
</v-row>

  <v-dialog
      v-model="dialog"
      persistent
      max-width="450">

      <v-card class="col-12">
        <v-card-title class="headline text-teal">
          إعادة تعيين كلمة المرور
        </v-card-title>
        <v-card-text>
          <v-form ref='city' v-model="valid">
          <v-text-field type="password" v-model="password" color="teal" placeholder="  كلمة المرور" prepend-icon="mdi-lock" :rules="nameRules"></v-text-field>
          <v-text-field type="password" v-model="cpassword" color="teal" placeholder="  أعد كلمة المرور" prepend-icon="mdi-lock" :rules="nameRules"></v-text-field>
          </v-form>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="grey darken-1"
            text
            @click="dialog = false"
          >
            إلغــاء
          </v-btn>
          <v-btn
            color="teal"
            :disabled="!valid"
            class="white--text"
            @click="updateUser()"
          >
            <v-icon>
              mdi-content-save
            </v-icon>
            حفــظ
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
<!-- </v-row> -->
</v-container>

</template>
<script>
    export default {
      props: ['user','role'],
      data () {
        return {
          valid: false,
          valid2: false,
          valid3: false,
          valid4: false,
          valid5: false,
          nameRules: [
            v => !!v && !!v.trim() || ' الحقل مطلوب ',
          ],
          userinfo:[],
          trainerdetails:[],
          companydetails:[],
          search: '',
          snackbar: false,
          mode: '',
          timeout: 6000,
          text: 'Hello, I\'m a snackbar',
          color: '',
          dialog:false,
          userid: '',
          name: '',
          email:'',
          phone: '',
          created_at: '',
          updated_at: '', 
          password:'',
          cpassword:'',
          role_id:'',
          editImage: false,
          editCert: false,
          editDoc: false,
          image:'',
          cert: '',
          doc: '',
        }
      },
      mounted() {
          this.getInfo();
          this.trainerDetails();
          this.companyDetails();
      },
      methods:{
        changeDoc(){
           let self = this;
          let formData = new FormData();
          formData.append('doc', this.doc);
          axios
            .post(`/api/companyDoc?userid=${self.user}`,formData,{headers:{'Content-Type': 'multipart/form-data'}})
            .then((res) => {
              this.companyDetails();
              this.snackbar=true;
              this.color = res.data.color;
              this.text = res.data.text;
            })
            .finally(this.editDoc=false);
        },
        companyDetails(){
          let self = this;
          axios
          .get(`/api/companydetails?userid=${self.user}`)
          .then((res) => {this.companydetails = res.data;})
          .finally(this.loading=false);
          
        },
        changeWork(){
           let self = this;
          axios
            .post(`/api/trainerwork?userid=${self.user}`)
            .then((res) => {
              this.trainerDetails();
              this.snackbar=true;
              this.color = res.data.color;
              this.text = res.data.text;
            });
        },
        changeImage(){
          let self = this;
          let formData = new FormData();
          formData.append('image', this.image);
          axios
            .post(`/api/trainerimage?userid=${self.user}`,formData,{headers:{'Content-Type': 'multipart/form-data'}})
            .then((res) => {
              this.trainerDetails();
              this.snackbar=true;
              this.color = res.data.color;
              this.text = res.data.text;
            })
            .finally(this.editImage=false);
        },
        changeCert(){
          let self = this;
          let formData = new FormData();
          formData.append('cert', this.cert);
          axios
            .post(`/api/trainercert?userid=${self.user}`,formData,{headers:{'Content-Type': 'multipart/form-data'}})
            .then((res) => {
              this.trainerDetails();
              this.snackbar=true;
              this.color = res.data.color;
              this.text = res.data.text;
            })
            .finally(this.editCert=false);
        },
        trainerDetails(){
          let self = this;
          axios
          .get(`/api/trainerdetails?userid=${self.user}`)
          .then((res) => {this.trainerdetails = res.data;})
          .finally(this.loading=false);
        },
        getInfo(){
          let self = this;
          axios
          .get(`/api/getuser?userid=${self.user}`)
          .then((res) => {this.userinfo = res.data;})
          .finally(this.loading=false);
          // this.userid = this.user.id;
          // this.name   = this.user.name;
          // this.email  = this.user.email;
          // this.phone  = this.user.phone;
          // this.created_at  = this.user.created_at;
          // this.updated_at  = this.user.updated_at;
          // this.editdialog=false;
        },
        updatephone(){
          axios
          .put(`/api/changephone`,{userid: this.userinfo.id,  phone: this.userinfo.phone, name: this.userinfo.name})
          .then((res) => {
            this.getInfo();
            this.snackbar=true;
            this.color = res.data.color;
            this.text = res.data.text;
          })
          .finally(this.loading=false);
        },
        updateUser(){
          if (this.password === this.cpassword) {
              // console.log(this.user.company_id);
          axios
          .put(`/api/changePass`,{userid: this.userinfo.id,  password: this.password})
          .then((res) => {
            this.getInfo();
            // this.clean();
            this.dialog=false;
            this.snackbar=true;
            this.color = res.data.color;
            this.text = res.data.text;
            // }
          }).catch((error) => {
              this.dialog=false;
              this.dialog2=false;
              this.snackbar=true;
              this.color = 'error';
              this.text = 'تعذر إكمال العملية';
          }).finally(this.loading=false);
          } else {
              this.snackbar=true;
              this.color = 'error';
              this.text = 'كلمة المرور غير متطابقة';

            }
        },
      }
    }
</script>
<style>
.v-data-table table td {
  align-content: center !important;
  align-self: auto;
  font-size: 16px !important;
  text-align: center;
  /* padding: 7px !important; */
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
    "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji",
    "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
}

.v-data-table table th {
  font-size: 16px !important;
  background-color: #979295 !important;
  color: #fff !important;
}
.table{
padding: 20px !important;
text-align: center !important;
}
</style>
