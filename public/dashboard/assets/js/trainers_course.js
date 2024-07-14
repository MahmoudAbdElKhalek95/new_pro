//show the rest of standards when click on button 
let course_box=document.querySelectorAll(".trainers_course .course-box ");
let show_rest_of_standards=document.querySelectorAll(".trainers_course .course-box .show-all-standards");
show_rest_of_standards.forEach((ele,index)=>{
    ele.addEventListener("click",function(e){
        this.classList.add("close");
        course_box[index].classList.add("show");
     
    });
})





