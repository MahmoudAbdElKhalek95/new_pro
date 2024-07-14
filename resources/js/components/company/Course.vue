
<template>
<v-container >
<v-row class="justify-content-center bg-light">
  <v-col cols="12" class="justify-content-center">
    <v-card class="col-12" elevation="4">
      <v-card-title> الحقائب التدريبية</v-card-title>
      <v-card-text>
         <v-data-table
            :headers="usersheaders"
            :items="courses"
            :items-per-page="8"
            class="elevation-2"
          >
            <!-- <template v-slot:top>
              <v-row>
                <v-col><v-spacer></v-spacer></v-col>
                <v-col cols="2" class="text-center mb-2">
                    <v-btn fab small @click="newCourseDialog=true"><v-icon color="#0c8676">mdi-plus</v-icon></v-btn>
                </v-col>
              </v-row>
            </template> -->
            <template v-slot:item.image_path="{ item }">
              <v-img
              class="elevation-2"
              max-height="50"
              max-width="60"
              :src=" '../storage/'+item.image_path "
              @click="showPic(item.image_path)"
              
            ></v-img>
            </template>
            <template v-slot:item.created_at="{ item }">{{item.created_at | momentDate}}</template>
            <template v-slot:item.updated_at="{ item }">
              <v-btn v-if="!item.enrolled" color="teal" x-small class="white--text"  @click="AddCourse(item)">إضافة </v-btn>
              <v-icon v-else color="teal">mdi-check</v-icon>
            </template>
          </v-data-table>
      </v-card-text>
    </v-card>
    <v-dialog
      v-model="newCourseDialog"
      persistent
      max-width="650">
      <v-card class="col-12">
        <v-card-title  class="headline text-primary">  إضافة حقيبة   </v-card-title>
        <v-card-text>
          <v-form ref='city' v-model="valid">
            <v-row>
              <v-col>
                <v-text-field v-model="name" placeholder="    إسم الحقيبة" prepend-icon="mdi-briefcase" color="#0c8676" :rules="nameRules"></v-text-field>
                <v-select v-model="age" :items="ageCategory" placeholder="   الفئة العمريه" prepend-icon="mdi-account" color="#0c8676" :rules="nameRules"></v-select>
                <v-textarea v-model="desc" type="number" placeholder="  الوصف " color="#0c8676" :rules="nameRules"></v-textarea>
                <v-file-input v-model="image" label="الصورة " color="#0c8676"></v-file-input>
                
              </v-col>
            </v-row>
          </v-form>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="grey darken-1"
            text
            @click="newCourseDialog = false"
          >
            إلغاء
          </v-btn>
          <v-btn
            color="teal"
            :disabled="!valid"
            class="white--text"
            @click="createCourse()"
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
        <v-card-title  class="headline text-primary">إضف بيانات الحقيبة</v-card-title>
        <v-card-text>
          <v-form ref='city' v-model="valid">
            <v-row>
              <v-select :items="trainers" item-value="id" item-text="name" v-model="trainer_id" placeholder="المدرب" prepend-icon="mdi-account-tie-voice"></v-select>
                <v-text-field v-model="seats" type="number" placeholder="عدد المقاعد" prepend-icon="mdi-account" color="#0c8676" :rules="nameRules"></v-text-field>
                <v-text-field v-model="cost"  type="number" placeholder="السعــر" prepend-icon="mdi-account-cash" color="#0c8676" :rules="nameRules"></v-text-field>
                <!-- <v-date-picker v-model="cost"  type="number" placeholder="تاريخ البداية" prepend-icon="mdi-email" color="#0c8676" :rules="nameRules"></v-date-picker>
                <v-date-picker v-model="cost"  type="number" placeholder="تاريخ النهاية" prepend-icon="mdi-email" color="#0c8676" :rules="nameRules"></v-date-picker> -->
            </v-row>
            <v-row>
              <v-col
                cols="6"
                sm="6"
                md="4"
              >
                <v-menu
                  ref="menu"
                  v-model="menu"
                  :close-on-content-click="false"
                  :return-value.sync="start"
                  transition="scale-transition"
                  offset-y
                  min-width="auto"
                >
                  <template v-slot:activator="{ on, attrs }">
                    <v-text-field
                      v-model="start"
                      label="تبدأ"
                      prepend-icon="mdi-calendar"
                      readonly
                      v-bind="attrs"
                      v-on="on"
                    ></v-text-field>
                  </template>
                  <v-date-picker
                    v-model="start"
                    no-title
                    scrollable
                    color="teal"
                  >
                    <v-spacer></v-spacer>
                    <v-btn
                      text
                      color="teal"
                      @click="menu = false"
                    >
                      Cancel
                    </v-btn>
                    <v-btn
                      text
                      color="teal"
                      @click="$refs.menu.save(start)"
                    >
                      OK
                    </v-btn>
                  </v-date-picker>
                </v-menu>
              </v-col>
              <!-- <v-spacer></v-spacer> -->
              <v-col
                cols="6"
                sm="6"
                md="4"
              >
                <v-menu
                  ref="menu2"
                  v-model="menu2"
                  :close-on-content-click="false"
                  :return-value.sync="end"
                  transition="scale-transition"
                  offset-y
                  min-width="auto"
                >
                  <template v-slot:activator="{ on, attrs }">
                    <v-text-field
                      v-model="end"
                      label="تنتهي"
                      prepend-icon="mdi-calendar"
                      readonly
                      v-bind="attrs"
                      v-on="on"
                    ></v-text-field>
                  </template>
                  <v-date-picker
                    v-model="end"
                    no-title
                    scrollable
                    color="teal"
                  >
                    <v-spacer></v-spacer>
                    <v-btn
                      text
                      color="teal"
                      @click="menu2 = false"
                    >
                      Cancel
                    </v-btn>
                    <v-btn
                      text
                      color="teal"
                      @click="$refs.menu2.save(end)"
                    >
                      OK
                    </v-btn>
                  </v-date-picker>
                </v-menu>
              </v-col>
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
            @click="addToMyCourse()"
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
      props: ['company'],
      data () {
        return {
          valid: false,
          nameRules: [
            v => !!v && !!v.trim() || ' الحقل مطلوب ',
          ],
          age:'',
          name:'',
          desc:'',
          image:'',
          newCourseDialog: false,
          snackbar: false,
          mode: '',
          timeout: 6000,
          text: 'Hello, I\'m a snackbar',
          color: '',
          courses:[],
          usersheaders:[
            {text: 'إسم الحقيبه ', value: 'name'},
            // {text: 'العنوان', value: 'company.city'},
            {text: 'الفئة العمريه', value: 'age'},
            {text: 'الوصف', value: 'desc' , width: '40%'},
            {text: ' الصورة', align: 'center', value: 'image_path'},
            {text: 'تاريخ الإنشاء ', value: 'created_at'},
            {text: ' عمليات ', value: 'updated_at'}
          ],
          ageCategory: [
            {text: 'الإبتدائي ', value: 'إبتدائي'},
            {text: 'المتوسط ', value: 'المتوسط'},
            {text: 'الثانوي ', value: 'الثانوي'},
            {text: 'الجامعي ', value: 'الجامعي'},
            {text: 'أخرى ', value: 'أخرى'},
          ],
          selectedUser:[],
          editUserDialog: false,
          showPicDialog: false,
          selectedImage: '',
          menu: false,
          menu2: false,
          start: '',
          end: '',
          trainers:[],
          trainer_id:'',
          cost:'',
          seats:'',
          course_id:'',

        }
      },
      mounted() {
        this.getCourses();
      },
      methods:{
        getCourses(){
          let self = this;
          // console.log(self.user)
            axios
          .get(`/api/companycourses?company_id=${self.company}`)
          .then((res) => {this.courses = res.data;})
          .finally(this.loading=false);
        },
        showPic(path){
          this.showPicDialog = true;
          this.selectedImage = path
        },
        createCourse(){
          let self = this;
          let formData = new FormData();
          formData.append('image', this.image);
          axios
          .post(`/api/course?age=${this.age}&company_id=${self.company}&name=${this.name}&desc=${this.desc}`,formData,{headers:{'Content-Type': 'multipart/form-data'}})
          .then((res) => {
            this.getCourses();
            this.newCourseDialog=false;
            this.snackbar=true;
            this.color = res.data.color;
            this.text = res.data.text;
            // }
          }).catch((error) => {
              this.snackbar=true;
              this.color = 'error';
              this.text = 'تعذر إكمال العملية'
          }).finally(this.loading=false);
        },
         AddCourse(course){
          axios
          .get(`/api/coursetrainer?course_id=${course.id}`)
          .then((res) => {this.trainers = res.data;})
          .finally(this.loading=false);
          this.course_id = course.id;
          this.editUserDialog = true;
        },
        addToMyCourse(){
          let self = this;
          axios
          .post(`/api/companycourses`,{course_id:this.course_id, company_id: self.company,
                                 seats: this.seats, cost: this.cost, start: this.start, end: this.end, trainer_id: this.trainer_id})
          .then((res) => {this.getCourses();
          this.trainer_id='';
          this.cost='';
          this.seats='';
          this.course_id='';
          this.start='';
          this.end='';
          this.snackbar=true;
          this.color = res.data.color;
          this.text = res.data.text;
          })
          .finally(this.editUserDialog = false);
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
