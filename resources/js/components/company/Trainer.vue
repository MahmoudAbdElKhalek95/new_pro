
<template>
<v-container >
<v-row class="justify-content-center bg-light">
  <v-col cols="12" class="justify-content-center">
    <v-card class="col-12" elevation="4">
      <v-card-title> حسابات المدربين</v-card-title>
      <v-card-text>
         <v-data-table
            :headers="usersheaders"
            :items="users"
            :items-per-page="8"
            class="elevation-2"
          >
            
            <template v-slot:item.created_at="{ item }">
              <v-img 
              class="elevation-2"
              max-height="50"
              max-width="60"
              :src="'../storage/'+item.path"
              @click="showPic(item)"
            ></v-img>
            </template>
            <template v-slot:item.remote_work="{ item }">
              <v-chip  v-if="item.remote_work==1" text-color="green"><b>نعم</b></v-chip>
              <v-chip v-else text-color="red"><b>لا</b></v-chip>
            </template>
              <template v-slot:item.id="{ item }">
                <!-- {{company}} -->
              <!-- <a v-if="item.trainer" rel="icon" target="_blank" :href="'../storage/'+item.trainer.cert_path"> <v-icon>mdi-paperclip</v-icon></a> -->
              <v-btn v-if="!item.assesed" x-small color="teal" @click="assesTrainer(item)" class="white--text">تقــييم</v-btn>
              <v-icon v-else color="teal" @click="getAssessment(item)">mdi-account-star-outline</v-icon>
              </template>
          </v-data-table>
      </v-card-text>
    </v-card>

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
      v-model="assesdialog"
      max-width="450">
      <v-card>
        <v-card-text class="text-center">
          <br><br>
          <!-- <v-slider
            v-model="asses_rate"
            label="التقييم"
            thumb-color="teal"
            thumb-label="always"
          ></v-slider> -->
          <!-- <star-rating :max-rating="5"  :model="asses_rate" :rtl="true" v-bind:star-size="60"></star-rating> -->
           <v-form ref='city' v-model="valid">
          <star-rating v-model="asses_rate" :rtl="true" inactive-color="#E8E8E8" active-color="#0c8676" :show-rating="false"></star-rating>
          <v-text-field color="teal" v-model="asses_desc" :rules="nameRules" placeholder="نص التقـــييم"></v-text-field>
           </v-form>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="teal" text small class="white--text" @click="assesdialog=false">إلغاء</v-btn>
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
            <star-rating v-model="assessdetails.rate" :read-only="true" :rtl="true" v-bind:star-size="30" inactive-color="#E8E8E8" active-color="#0c8676" :show-rating="false"></star-rating>
          </v-col>
        </v-row>
        <v-row>
          <v-col>الوصف :</v-col>
          <v-col v-if="assessdetails">{{assessdetails.desc}}</v-col>
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
      props: ['company'],
      components: {
        StarRating
      },
      data () {
        return {
          valid: false,
          nameRules: [
            v => !!v || 'الخانه مطلوبة',
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
            {text: 'المنطقة', value: 'city'},
            {text: 'الجوال', value: 'user.phone'},
            {text: 'الإيميل', value: 'user.email'},
            {text: 'العمل خارج المنطقة', align: 'center', value: 'remote_work'},
            {text: ' الصورة ', value: 'created_at'},
            {text: '  تقييم  المدربين ', align:'center', value: 'id'},
            // {text: ' عمليات ', value: 'updated_at'}
          ],
          showPicDialog: false,
          selectedImage: '',
          selectedUser:[],
          editUserDialog: false,
          assesdialog: false,
          selectedTrainer:[],
          asses_rate:0,
          asses_desc:'',
          assessdetails:[],
          showassesdialog:false,

        }
      },
      mounted() {
        this.getUsers();
      },
      methods:{
        getAssessment(trainer){
          let self = this;
          axios
          .get(`/api/assesment?trainer_id=${trainer.user.id}&company_id=${self.company}`)
          .then((res) => {this.assessdetails = res.data;})
          .finally(this.showassesdialog=true);
        },
        submitAssessment(){
          let self = this;
          axios
          .post(`/api/assesment`,{trainer_id:this.selectedTrainer.user.id, rate:this.asses_rate,
                            desc:this.asses_desc, type:2,company_id: self.company })
          .then((res) => {
            this.getUsers();
            this.snackbar=true;
            this.color = res.data.color;
            this.text = res.data.text;
            })
          .finally(this.assesdialog=false);
        },
        assesTrainer(trainer){
          this.selectedTrainer = trainer;
          this.assesdialog = true;
        },
        getUsers(){
          let self = this;
            axios
          .get(`/api/companytrainer?company_id=${self.company}`)
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
