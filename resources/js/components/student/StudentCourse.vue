
<template>
<v-container >
<v-row class="justify-content-center">
  <v-col cols="12" class="justify-content-center">
    <v-card class="col-12" elevation="4">
      <v-card-title>  مرحــبا بك في منصة آرام </v-card-title>
        <v-card-text>
          <br><br><br><br><br>
          <br><br><br><br><br>
      </v-card-text>
    </v-card>
  </v-col>
</v-row>
</v-container>

</template>
<script>
    export default {
      data () {
        return {
        }
      },
      mounted() {
        this.getCourses();
      },
      methods:{
       getCourses(){
            axios
          .get(`/api/course`)
          .then((res) => {this.courses = res.data;})
          .finally(this.loading=false);
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
