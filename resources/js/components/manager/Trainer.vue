
<template>
<v-container >
<v-row class="justify-content-center bg-light">
  <v-col cols="12" class="justify-content-center">
    <v-card class="col-12" elevation="4">
      <v-card-title>إدارة حسابات المدربين</v-card-title>
      <v-card-text>
         <v-data-table
            :headers="usersheaders"
            :items="users"
            :items-per-page="8"
            class="elevation-2"
          >
            <template v-slot:top>
              <v-row>
                <v-col><v-spacer></v-spacer></v-col>
                <v-col cols="2" class="text-center mb-2">
                    <v-btn fab small @click="stagecreate()"><v-icon  color="#0c8676">mdi-plus</v-icon></v-btn>
                </v-col>
              </v-row>
            </template>
            <template v-slot:item.created_at="{ item }">
              <v-img v-if="item"
              class="elevation-2"
              max-height="50"
              max-width="60"
              :src=" '../storage/'+item.path "
              @click="showPic(item)"
             ></v-img>
            </template>
            <!-- <template v-slot:item.created_at="{ item }">{{item.created_at | momentDate}}</template> -->
            <template v-slot:item.updated_at="{ item }">
              <v-icon @click="editUser(item)">mdi-pen</v-icon>
              <v-icon v-if="item && !item.rate" color="teal" @click="assesTrainer(item)">mdi-star</v-icon>
              <v-icon v-else color="teal" @click="getAssessment(item)">mdi-account-star-outline</v-icon>
              </template>
              <template v-slot:item.id="{ item }">
              <!-- <v-icon>mdi-paperclip</v-icon> -->
              <a v-if="item && item.cert_path " rel="icon" target="_blank" :href="'../storage/'+item.cert_path"> <v-icon>mdi-paperclip</v-icon></a>
              </template>
            <template v-slot:item.isActive="{ item }">
                <!-- <v-chip v-model="item.isActive" @change="changeState(item.isActive, item.id)"></v-chip> -->
                <v-chip color="teal" text-color="white"  small v-if="item.user.isActive == true"  @click="changeState(false, item.user.id)">نشــط</v-chip>
                <v-chip class="ma-2" color="pink" text-color="white"  small v-else @click="changeState(true, item.user.id)">غير نشــط</v-chip>
            </template>
            <template v-slot:item.remote_work="{ item }">
              <v-chip  v-if="item.remote_work==1" text-color="green"><b>نعم</b></v-chip>
              <v-chip v-else text-color="red"><b>لا</b></v-chip>
            </template>
          </v-data-table>
      </v-card-text>
    </v-card>
    <v-dialog
      v-model="newUserDialog"
      persistent
      max-width="450">
      <v-card class="col-12">
        <v-card-title  class="headline text-primary">  إنشاء حساب مدرب</v-card-title>
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
                <v-text-field v-model="phone" dir="ltr" suffix="05" counter="8" type="phone" placeholder="  الجـوال " prepend-icon="mdi-phone" color="#0c8676" :rules="
                [
              () => !!phone || 'This field is required',
              () => !!phone && phone.length == 8 || 'الرجاء مراجعة رقم الهاتف',
              () => !!phone && !isNaN(parseFloat(phone)) && isFinite(phone) || 'رقم هاتف غير صحيح',
            ]
                "></v-text-field>
                <v-text-field type="password" v-model="password" placeholder="  كلمة المــرور"  :rules="nameRules" prepend-icon="mdi-lock" color="#0c8676"></v-text-field>
                <v-text-field type="password" v-model="cpassword" placeholder="  أعد كلمة المــرور"  :rules="nameRules" prepend-icon="mdi-lock" color="#0c8676"></v-text-field>
                <v-select v-model="city" :items="cities" item-text="name" item-value="name" placeholder="  المنطقة " prepend-icon="mdi-marker" color="#0c8676" :rules="
                [
                    city => !!city || ' غير صحيح'
                  ]
                "></v-select>
                
                <!-- <v-text-field v-model="city" placeholder="  المدينــة " prepend-icon="mdi-marker" color="#0c8676" :rules="nameRules"></v-text-field> -->
                <v-file-input v-model="image" label="الصورة الشخصية" color="#0c8676"></v-file-input>
                <v-file-input v-model="cert" label="شهادة إعتماد التدريب" color="#0c8676"></v-file-input>
                <v-checkbox  v-model="status" label="  تفعيل الحساب" color="#0c8676"></v-checkbox>
          </v-form>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="grey darken-1"
            text
            @click="newUserDialog = false"
          >
            إلغاء
          </v-btn>
          <v-btn
            color="teal"
            :disabled="!valid"
            class="white--text"
            @click="createuser()"
          >
            <!-- <v-icon>
              mdi-plus
            </v-icon> -->
            إضافة
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
     <v-dialog
      v-model="showPicDialog"
      max-width="450">
      <v-card class="col-12">
        <v-card-text>
          <v-img 
              :src=" '../storage/'+selectedImage "
            ></v-img>
        </v-card-text>
      </v-card>
    </v-dialog>
    <v-dialog
      v-model="editUserDialog"
      persistent
      max-width="650">
      <v-card class="col-12">
        <v-card-title  class="headline text-primary">  تعــديل</v-card-title>
        <v-card-text>
          <v-form ref='city' v-model="valid">
            <v-row>
              <!-- <v-col>
                <v-file-input v-if="selectedUser.trainer && selectedUser.trainer.image=='default.png'" v-model="newimage" label="الصورة الشخصية" color="#0c8676"></v-file-input>
                <v-file-input v-if="selectedUser.trainer && !selectedUser.trainer.cert_path" v-model="newcert" label=" شهادة إعتماد  " color="#0c8676"></v-file-input>
              </v-col> -->
              <v-col>
                <v-text-field v-model=" selectedUser.name" placeholder="   الإسم " prepend-icon="mdi-account" color="#0c8676" :rules="nameRules"></v-text-field>
                <v-text-field readonly v-model=" selectedUser.email" type="email" placeholder="  البــريد الإلكتروني" prepend-icon="mdi-email" color="#0c8676" :rules="nameRules"></v-text-field>
                <!-- <v-text-field v-model=" selectedUser.phone" type="number" placeholder="  الجـوال " prepend-icon="mdi-phone" color="#0c8676" :rules="nameRules"></v-text-field> -->
                <v-text-field v-model="selectedUser.phone" dir="ltr" counter="10" type="phone" placeholder="  الجـوال " prepend-icon="mdi-phone" color="#0c8676" :rules="
                [
              () => !!selectedUser.phone || 'This field is required',
              () => !!selectedUser.phone && selectedUser.phone.length == 10 || 'الرجاء مراجعة رقم الهاتف',
              () => !!selectedUser.phone && !isNaN(parseFloat(selectedUser.phone)) && isFinite(selectedUser.phone) || 'رقم هاتف غير صحيح',
            ]
                "></v-text-field>
                <!-- <v-text-field v-if="selectedUser.trainer" v-model="selectedUser.trainer.city" placeholder="  المنطقة " prepend-icon="mdi-marker" color="#0c8676" :rules="nameRules"></v-text-field> -->
                <v-select v-model="selectedcity" :items="cities" item-text="name" item-value="name" placeholder="  المنطقة " prepend-icon="mdi-marker" color="#0c8676"></v-select>
              </v-col>
            </v-row>
          </v-form>
          
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="grey darken-1"
            text
            @click="clearedit"
          >
            إلغاء
          </v-btn>
          <v-btn
            color="teal"
            :disabled="!valid"
            class="white--text"
            @click="updateUser()"
          >
            <!-- <v-icon>
              mdi-plus
            </v-icon> -->
            تحــديث
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
        <v-dialog
      v-model="assesdialog"
      persistent
      max-width="450">
      <v-card class="col-12">
        <v-card-text>
          <br><br>
          <!-- <v-slider
            v-model="asses_rate"
            label="التقييم"
            thumb-color="teal"
            thumb-label="always"
          ></v-slider> -->
          <v-form ref='city' v-model="valid">
          <star-rating v-model="asses_rate" :rtl="true" :show-rating="false"></star-rating>
          <v-text-field color="teal" v-model="asses_desc" :rules="nameRules" placeholder="نص التقـــييم"></v-text-field>
          </v-form>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="teal" text small class="white--text" @click="clearasses()">إلغاء</v-btn>
          <v-btn color="teal"  :disabled="!valid" small class="white--text" @click="submitAssessment()">حفــظ</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
           <v-dialog
      v-model="showassesdialog"
      max-width="400">
      <v-card class="col-12">
        <v-card-text>
        <!-- {{assessdetails.}} -->
        <v-row>
          <v-col>المعدل :</v-col>
           <v-col v-if="assessdetails">
            <star-rating v-model="assessdetails.rate" :read-only="true" :rtl="true" v-bind:star-size="30"  :show-rating="false"></star-rating>
          </v-col>
        </v-row>
        <v-row>
          <v-col>الوصف :</v-col>
          <v-col v-if="assessdetails"><b>{{assessdetails.desc}}</b></v-col>
        </v-row>
        </v-card-text>
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
  </v-col>
</v-row>
<!-- </v-row> -->
</v-container>

</template>
<script>
    import StarRating from 'vue-star-rating'
    export default {
      props: ['manager','managercity'],
      components: {
        StarRating
      },
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
          status:true,
          newUserDialog: false,
          snackbar: false,
          mode: '',
          timeout: 6000,
          text: 'Hello, I\'m a snackbar',
          color: '',
          users:[],
          usersheaders:[
            {text: 'الإسم ', value: 'user.name'},
            {text: 'العنوان', value: 'city'},
            {text: 'الجوال', value: 'user.phone'},
            {text: 'الإيميل', value: 'user.email'},
            {text: 'حالة الحساب', align: 'center', value: 'isActive'},
            {text: 'العمل خارج المنطقة', align: 'center', value: 'remote_work'},
            {text: ' الصورة ', value: 'created_at'},
            {text: ' شهادة الإعتماد ', align:'center', value: 'id'},
            {text: ' عمليات ', value: 'updated_at'}
          ],
          showPicDialog: false,
          selectedImage: '',
          selectedUser:[],
          editUserDialog: false,
          assesdialog: false,
          assesd_trainer:[],
          asses_rate:'',
          asses_desc:'',
          assessdetails:[],
          showassesdialog:false,
          cities:[],
          selectedcity:'',
        }
      },
      mounted() {
        this.getUsers();
        this.getCities();
      },
      methods:{
         clearedit(){
          this.getUsers();
          this.editUserDialog = false;
        },
        getCities(){
          axios
          .get(`/api/city`)
          .then((res) => {this.cities = res.data;})
          .finally(this.loading=false);
        },
        clearasses(){
          this.asses_rate='';
          this.asses_desc='';
          this.assesdialog=false;
        },
        getAssessment(trainer){
          this.assessdetails = trainer;
          this.showassesdialog=true;
        },
        submitAssessment(){
          axios
          .put(`/api/assesment`,{trainer_id:this.assesd_trainer.id, rate:this.asses_rate,desc:this.asses_desc})
          .then((res) => {
            this.getUsers();
            this.snackbar=true;
            this.color = res.data.color;
            this.text = res.data.text;
            this.asses_rate='';
            this.asses_desc='';
            })
          .finally(this.assesdialog=false);
        },
        assesTrainer(trainer){
          this.assesd_trainer = trainer;
          this.assesdialog = true;
        },
        getUsers(){
          let self = this;
            axios
          .get(`/api/mngtrainer?manager_id=${self.manager}`)
          .then((res) => {this.users = res.data;})
          .finally(this.loading=false);
        },
        showPic(trainer){
          this.showPicDialog = true;
          this.selectedImage = trainer.path
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
        stagecreate(){
          let self = this;
          this.city=self.managercity.name;
          this.newUserDialog=true;
        },
        createuser(){
          if (this.password === this.cpassword) {
            let formData = new FormData();
            formData.append('image', this.image);
            formData.append('cert', this.cert);
            axios
            .post(`/api/trainer?email=${this.email}&name=${this.name}&password=${this.password}&status=${this.status}&phone=${this.phone}&city=${this.city}`,formData,{headers:{'Content-Type': 'multipart/form-data'}})
            .then((res) => {
              this.getUsers();
              this.newUserDialog=false;
              this.snackbar=true;
              this.color = res.data.color;
              this.text = res.data.text;
              this.$refs.city.reset();
              // }
            }).catch((error) => {
                this.snackbar=true;
                this.color = 'error';
                this.text = 'تعذر التنفيذالإيميل مستخدم مسبقاً'
            }).finally(this.loading=false);
          } else {
              this.snackbar=true;
            this.color = 'error';
            this.text = 'كلمة المرور غير متطابقة'
          }
        },
        // cleandialog(){
        //   this.email = '';
        //   this.name = '';
        //   this.phone = '';
        //   this.status = '';
        //   this.city = '';
        //   this.image = '';
        //   this.cert = '';
        //   this.password = '';
        //   this.cpassword = '';
        // },
         editUser(trainer){
          this.selectedUser = trainer.user;
          this.selectedcity = trainer.city;
          this.editUserDialog = true;
        },
        updateUser(){ 
            //  let formData = new FormData();
            // formData.append('image', this.newimage);
            // formData.append('cert', this.newcert);
            // formData.append('phone', this.selectedUser.phone);
            axios
            .put(`/api/trainer?phone=${this.selectedUser.phone}&id=${this.selectedUser.id}&city=${this.selectedcity}&name=${this.selectedUser.name}`)
            // formData,{headers:{'Content-Type': 'multipart/form-data'}})
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
