<template>
    <div class="">
        <!-- <div class="col-md-12"  style="width:1350px; height:570px" :style="{ 'background-image': 'url(' + image + ')' }"></div> -->
        <div class="col-md-12 text-center clr_wht_i font_des" style="">  Grab a seat</div>
        <h1 class=" col-md-12 text-center mt_50 font_70 clr_wht_i"> Something great is <br> about to happen </h1>
        <div class="text-center col-md-12 mt_50 clr_wht_i font_22"> Sign up and you'll be the first to know! </div> 
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4"> </div>
                <div class=" mt_50 col-md-4 clr_wht_i"> <input type="text" class="form-control textboxboder" name="name" placeholder="E-mail">  </div> 
            </div>
        </div>
        <div className="head" class="mt_50 text-center">
            <button class="btn_des"> Notify me </button>
        </div>
    </div>
</template>
<script>
export default {
    data(){
    return {
				image: 'images/background.jpg',
    }
    }
}
</script>