<template>
<div class="">
	
	<div class="mobilenav">
		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<ul class="navbar-nav" style=" padding-left: 16px;">
        <li v-for="(item,index) in links1" class="nav-item">        
        	<a  class="nav-link" @click="navclicked(index)"
                      :href="prefixinurl(item.path)"
                    >{{item.name}}
                    </a>
        </li>
		<div class="mnavbtn">
		<a class="mobilenavcontact text-white" style="text-decoration: none;" href="contact-us"><span>Contact</span></a>
		</div>
			</ul>
			</div>

			
			<span class="mobilenavbar" style="font-size:30px;cursor:pointer;padding-left: 18px;" onclick="openNav()">&#9776; <img class="mobilelogo" src="assets/images/logo.png" height="60" alt="Sound From Heaven LLC Logo" /></span>
	</div>
	<div class="desktopscreen">
	<nav class="navbar navbar-expand-lg navbar-light " style="background-color:#a23aa9;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="assets/images/logo.png" height="60" alt="Sound From Heaven LLC Logo" /></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse nav justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav" :class="getclassname">
        <li v-for="(item,index) in links1" class="nav-item">        
        	<a :class="activepageclass(index)" class="nav-link" @click="navclicked(index)"
                      :href="prefixinurl(item.path)"
                    >{{item.name}}
                    </a>
        		
        	
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
      </ul>
    </div>
  </div>
</nav>
</div>
<!-- <fragment class="row">
<nav class="navbar flex bg_clr" role="navigation">
        <div class="logo col-md-3">
          <img src="assets/images/logo.png" alt="Sound From Heaven LLC Logo" />
        </div>
        <div :class="getclassname" class="col-md-9 ">
			<div class="row float_rt">
        	<div v-for="(item,index) in links1" class=" " role="menuitem">
        		<template class="">
        			<a :class="activepageclass(index)" class="pad_15" @click="navclicked(index)"
                      :href="prefixinurl(item.path)"
                    >{{item.name}}
                    </a>
        		</template>
        	</div>
			</div>
        </div>
</nav>
</fragment> -->
</div>
</template>
<script>
import Constants from '../util/Constants'
export default {
	mixins:[Constants],
	data(){
		return {
			links1:[
		          { 'path': "", 'name': "Home" },
		          { path: "about-us", name: "About" },
		          { path: "competition", name: "SFH Nigeria" },
		          { path: "contestants", name: "SFH Cameroon" },
		          /*{ path: "gallery", name: "Global Gallery" },*/
		          { path: "contact-us", name: "Contact Us" },
		          /*{ path: "tracks", name: "Tracks" },
		          { path: "tickets", name: "Tickets" },*/
				  { path: "voting", name: "Voting" },
				   
		          /*{
		            path: user ? "/logout" : "/login",
		            name: user ? user.displayName + "|| Logout" : "Login",
		          },*/
		        ],
		    currentSize:1050,
		    mobileNav:false,
		    toggleClass:false,
		    activeVal:0
		}
	},
	mounted(){
		this.currentSize = window.innerWidth;
		if (this.currentSize <= 800) {
	      this.mobileNav = true;
	      this.toggleClass = true;
	    } else {
	      this.mobileNav = false;
	      this.toggleClass = false;
	    }
	},
	computed:{
		getclassname(){
			let class1="menu flex"
			if(this.mobileNav){
				class1="mobile-menu"
				if(this.toggleClass)
					class1="mobile-menu show"
			}
			return class1;
        },
    },
    methods:{
        activepageclass(index){
        	let class1="menu__link font_clr"
        	if(this.activeVal==index){
        		class1 = "menu__link active font_clr"
        	}
        	return class1;
        },
        navclicked(index){
        	this.activeVal = index
        }
	}
}
</script>