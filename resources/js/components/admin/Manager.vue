
<template>
<v-container >
<v-row class="justify-content-center bg-light">
  <v-col cols="12" class="justify-content-center">
    <v-card class="col-12" elevation="4">
      <v-card-title>إدارة  حسـابات المشرفين</v-card-title>
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
                    <v-btn fab small @click="newUserDialog=true"><v-icon color="#0c8676">mdi-plus</v-icon></v-btn>
                </v-col>
              </v-row>
            </template>
            <template v-slot:item.created_at="{ item }">{{item.created_at | momentDate}}</template>
            <template v-slot:item.updated_at="{ item }"><v-icon  @click="editUser(item)">mdi-pen</v-icon></template>
            <template v-slot:item.role_id="{ item }">
                <v-chip small v-if="item.role_id == 1" >مشرف رئيسي</v-chip>
                <v-chip small v-if="item.role_id == 2" >مشرف فرعي</v-chip>
                <!-- <v-chip class="ma-2" color="pink" text-color="white"  small v-else @click="changeState(true, item.id)">غير نشــط</v-chip> -->
            </template>
            <template v-slot:item.isActive="{ item }">
                <!-- <v-chip v-model="item.isActive" @change="changeState(item.isActive, item.id)"></v-chip> -->
                <v-chip color="teal" text-color="white"  small v-if="item.isActive == true"  @click="changeState(false, item.id)">نشــط</v-chip>
                <v-chip class="ma-2" color="pink" text-color="white"  small v-else @click="changeState(true, item.id)">غير نشــط</v-chip>
            </template>
          </v-data-table>
      </v-card-text>
    </v-card>
    <v-dialog
      v-model="newUserDialog"
      persistent
      max-width="450">
      <v-card class="col-12">
        <v-card-title  class="headline text-primary">  إنشاء حساب مشرف</v-card-title>
        <v-card-text>
          <v-form ref='city' v-model="valid">
            <v-row>
              <!-- <v-col> -->
                <!-- <v-text-field v-model="company_name" placeholder="  إسم الجهة " prepend-icon="mdi-home-variant" :rules="nameRules" color="#0c8676"></v-text-field>
                <v-text-field v-model="regulator" placeholder="  الجهة الإشرافية " prepend-icon="mdi-home-city" color="#0c8676" :rules="nameRules"></v-text-field>
                <v-text-field v-model="clearance" placeholder="  رقم التصريح" prepend-icon="mdi-qrcode-scan" color="#0c8676" :rules="nameRules"></v-text-field>
                <v-text-field v-model="city" placeholder="  العنــوان " prepend-icon="mdi-marker" color="#0c8676" :rules="nameRules"></v-text-field> -->
                <!-- <v-checkbox  v-model="status" label="  تفعيل الحساب" color="#0c8676"></v-checkbox> -->
              <!-- </v-col> -->
              <v-col>
                <v-select :items="roles" v-model="role_id" @change="roleChange" placeholder="النــوع" dir="rtl" prepend-icon="mdi-account" color="#0c8676"  :rules="nameRules"></v-select>
                <v-select v-if="edary" v-model="city" :items="cities" item-text="name" item-value="id" placeholder="  المنطـــقة " prepend-icon="mdi-marker" color="#0c8676" :rules="
                [
                    city => !!city || ' غير صحيح'
                  ]
                "></v-select>
                <v-text-field v-model="name" placeholder="    الإسم" prepend-icon="mdi-account" color="#0c8676" :rules="nameRules"></v-text-field>
                <!-- <v-text-field v-model="email" type="email" placeholder="  البــريد الإلكتروني" prepend-icon="mdi-email" color="#0c8676" :rules="nameRules"></v-text-field> -->
                <v-text-field v-model="email" type="email" placeholder="  البــريد الإلكتروني" prepend-icon="mdi-email" color="#0c8676" :rules="
                  [
                    v => !v  || /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'إيميل غير صحيح',
                    v => !!v.trim() || ' الحقل مطلوب ',
                  ]
                "></v-text-field>
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
      v-model="editUserDialog"
      persistent
      max-width="650">
      <v-card class="col-12">
        <v-card-title  class="headline text-primary">  تعــديل</v-card-title>
        <v-card-text>
          <v-form ref='city' v-model="valid">
            <v-row>
                <v-text-field v-model=" selectedUser.name" placeholder="   المدير التنفيذي" prepend-icon="mdi-account" color="#0c8676" :rules="nameRules"></v-text-field>
                <v-text-field readonly v-model=" selectedUser.email" type="email" placeholder="  البــريد الإلكتروني" prepend-icon="mdi-email" color="#0c8676" :rules="nameRules"></v-text-field>
                <v-text-field v-model=" selectedUser.phone" type="number" placeholder="  الجـوال " prepend-icon="mdi-phone" color="#0c8676" :rules="nameRules"></v-text-field>
            </v-row>
          </v-form>

        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="grey darken-1"
            text
            @click="editUserDialog = false"
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
          edary: false,
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
          newUserDialog: false,
          snackbar: false,
          mode: '',
          timeout: 6000,
          text: 'Hello, I\'m a snackbar',
          color: '',
          users:[],
          usersheaders:[
            {text: 'الإسم ', value: 'name'},
            // {text: 'العنوان', value: 'company.city'},
            {text: 'الجوال', value: 'phone'},
            {text: 'الإيميل', value: 'email'},
            {text: 'الدور', value: 'role_id'},
            {text: 'المنطقة', value: 'manager.city.name'},
            {text: 'حالة الحساب', align: 'center', value: 'isActive'},
            {text: 'تاريخ الإنضمام ', value: 'created_at'},
            {text: ' عمليات ', value: 'updated_at'}
          ],
          roles:[
            {text: 'مشرف رئيسي', value: '1'},
            {text: 'مشرف فرعي', value: '2'},
          ],
          role_id:'',
          selectedUser:[],
          editUserDialog: false,
          cities:[],
        }
      },
      mounted() {
        this.getUsers();
        this.getCities();

      },
      methods:{
        roleChange(){
          if (this.role_id > 1) {
            this.edary = true;
          } else {
            this.edary = false;
          }
        },
        getCities(){
          axios
          .get(`/api/city`)
          .then((res) => {this.cities = res.data;})
          .finally(this.loading=false);
        },
        getUsers(){
            axios
          .get(`/api/manager`)
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
        createuser(){
          if (this.password === this.cpassword) {
            axios
            .post(`/api/manager`,{
              email: this.email,
              name: this.name,
              role_id: this.role_id,
              // clearance: this.clearance,
              password: this.password,
              status: this.status,
              phone: this.phone,
              // regulator: this.regulator,
              city: this.city,
            })
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
                this.text = 'الايميل مستخدم مسبقا'
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
            axios
            .put(`/api/manager`,{
              user: this.selectedUser,
            })
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
