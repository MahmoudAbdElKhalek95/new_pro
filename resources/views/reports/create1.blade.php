<button class="custom-btn trigger" ><img class="pe-2" src="{{ asset('dashboard/assets/images/pluse.png')}}"><span>اضافة شواهد التنفيذ </span></button>
<div class="_modal">
    <div class="_modal-content">
        <div class="_modal-header d-flex align-items-center justify-content-between">
            <h1>إضافة شواهد التنفيذ</h1>
            <span class="close-button"><img src="{{ asset('dashboard/assets/images/close.png')}}"></span>

        </div>

        <form>
        <div class="form py-5  px-4">
            <div class="d-lg-flex align-items-center  mb-2 ">
                <div class="w-100 pe-lg-3">
                    <div class="input-field w-100">
                        <label>الإسم </label>
                        <input type="text" placeholder="الإسم">
                    </div>
               </div>
               <div class=" w-100 ps-lg-3">
                    <div class="input-field w-100">
                        <label>النوع</label>
                        <select name="gender" required>
                            <option value="" disabled selected hidden>إختار النوع  </option>
                            <option value="male">ذكر</option>
                            <option value="female">أنثي</option>
                          </select>
                    </div>
               </div>
            </div>
            <div class="d-lg-flex align-items-center ">
                <div class=" w-100 pe-lg-3">
                    <div class="input-field w-100">
                        <label>المنطقة</label>
                        <select name="drinks" required>
                            <option value="" disabled selected hidden>المنطقة </option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select>
                    </div>
               </div>
               <div class=" w-100 ps-lg-3">
                    <div class="input-field w-100">
                        <label>المدينة  </label>
                        <select required>
                            <option value="" disabled selected hidden>المدينة </option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select>
                    </div>
               </div>
            </div>
            <div class="d-lg-flex align-items-center  mb-2 ">
                <div class="w-100 pe-lg-3">
                    <div class="input-field w-100">
                        <label>الجوال </label>
                        <input type="text" placeholder="الجوال">
                    </div>
               </div>
               <div class=" w-100 ps-lg-3">
                    <div class="input-field w-100">
                        <label>المؤهل</label>
                        <select required>
                            <option value="" disabled selected hidden>المؤهل </option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select>
                    </div>
               </div>
            </div>
            <div class="d-lg-flex align-items-center  mb-2 ">
                <div class="w-100 pe-lg-3">
                    <div class="input-field w-100">
                        <label>اكتب كلمة السر </label>
                        <input type="password" placeholder="اكتب كلمة السر">
                    </div>
               </div>
               <div class="w-100 ps-lg-3">
                <div class="input-field w-100">
                    <label>اعد كتابة كلمة السر </label>
                    <input type="password" placeholder="اعد كتابة كلمة السر ">
                </div>
           </div>
            </div>
            <button  style="margin-bottom: 50px;" type="submit" class="btn btn-success save-btn form-control"> حفظ  </button>

        </div>
    </form>


    </div>
</div>