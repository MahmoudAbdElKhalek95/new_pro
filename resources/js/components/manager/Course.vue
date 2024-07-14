
<template>
<v-container >
<v-row class="justify-content-center bg-light">
  <v-col cols="12" class="justify-content-center">
    <v-card class="col-12" elevation="4">
      <v-card-title>إدارة الحقائب التدريبية</v-card-title>
      <v-card-text>
         <v-data-table
            :headers="usersheaders"
            :items="courses"
            :items-per-page="8"
            class="elevation-2"
          >
            <template v-slot:top>
              <v-row>
                <v-col><v-spacer></v-spacer></v-col>
                <v-col cols="2" class="text-center mb-2">
                    <v-btn fab small @click="newCourseDialog=true"><v-icon color="#0c8676">mdi-plus</v-icon></v-btn>
                </v-col>
              </v-row>
            </template>
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
            <template v-slot:item.updated_at="{ item }"><v-icon  @click="editCourse(item)">mdi-pen</v-icon></template>
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
                <!-- <v-select :items="companies" v-model="company_id" item-text="name" item-value="id" placeholder="الجهة المنفذه"></v-select> -->
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
        <v-card-title  class="headline text-primary">  تعــديل</v-card-title>
        <v-card-text>
          <v-form ref='city' v-model="valid">
            <v-row>
              <v-text-field v-model="selectedCourse.name" placeholder="    إسم الحقيبة" prepend-icon="mdi-briefcase" color="#0c8676" :rules="nameRules"></v-text-field>
              <v-select v-model="selectedCourse.age" :items="ageCategory" placeholder="   الفئة العمريه" prepend-icon="mdi-account" color="#0c8676" :rules="nameRules"></v-select>
              <v-textarea v-model="selectedCourse.desc" type="number" placeholder="  الوصف " color="#0c8676" :rules="nameRules"></v-textarea>
                <v-file-input v-model="image" label="الصورة " color="#0c8676"></v-file-input>
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
            // {text: 'الجهة المنفذه', value: 'company.name'},
            {text: 'الفئة العمريه', value: 'age'},
            {text: 'الوصف', width:'40%' ,value: 'desc'},
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
          companies:[],
          company_id:'',
          selectedUser:[],
          editUserDialog: false,
          showPicDialog: false,
          selectedImage: '',
          selectedCourse:[],

        }
      },
      mounted() {
        this.getCourses();
        this.getCompanies();
      },
      methods:{
        clearedit(){
          this.getCourses();
          this.editUserDialog = false;
        },
        getCompanies(){
          axios
          .get(`/api/companys`)
          .then((res) => {this.companies = res.data;})
          .finally(this.loading=false);
        },
        getCourses(){
            axios
          .get(`/api/course`)
          .then((res) => {this.courses = res.data;})
          .finally(this.loading=false);
        },
        showPic(path){
          this.showPicDialog = true;
          this.selectedImage = path
        },
        createCourse(){
          let formData = new FormData();
          formData.append('image', this.image);
          axios
          .post(`/api/course?age=${this.age}&name=${this.name}&desc=${this.desc}`,formData,{headers:{'Content-Type': 'multipart/form-data'}})
          .then((res) => {
            this.getCourses();
            this.newCourseDialog=false;
            this.$refs.city.reset();
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
         editCourse(course){
          this.selectedCourse = course;
          this.editUserDialog = true;
        },
        updateUser(){
            let formData1 = new FormData();
            formData1.append('image', this.image);
            axios
            .post(`/api/courseupdate?course_id=${this.selectedCourse.id}&name=${this.selectedCourse.name}&desc=${this.selectedCourse.desc}&age=${this.selectedCourse.age}`,
            formData1,{headers:{'Content-Type': 'multipart/form-data'}})
            .then((res) => {
              this.getCourses();
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
