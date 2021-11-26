<template>
<div class="bg_clr">
        <div className="scrollbtn flex" >
            <button v-if="false">Scroll To Top</button>
        </div>
            <div className="footer-content flex " class="col-md-12">
                <div class="row">
                <div class="col-md-1">
                </div>
                <div className="footer-component" class="col-md-2">
                    <img src="assets/images/logo.png" width="150" height="150" />
                    <div class="clr_wht">Space are limited, so contact us now to make sure we save you a spot. </div>
                </div>
                <div className="footer-component" class="col-md-2">
                    <div className="head" class="clr_wht">USEFUL LINKS</div>
                    <div className="links flex" class="mt_50 row">
                        <a :href="prefixinurl(link.path)" class="link clr_wht col-md-12" v-for="(link) in usefullinks">{{ link.name }}</a>
                    </div>
                </div>
                <div className="footer-component" class="col-md-3 clr_wht">
                    <div className="head"> <b> CONTACT US </b> </div>
                    <div className="links" class="mt_50 ">
                        <div className="small-headline" class="">Cameroon</div>
                        <div>Call: +237 676 63 5415</div>
                        <div className="small-headline">USA</div>
                        <div>Call:  +1 401 301 5054</div>
                        <div className="small-headline">Email</div>
                        <div>soudnfromheavenservices@gmail.com</div>
                        <div className="small-headline">Location</div>
                        <div>120 Rail Road Ave</div>
                        <div>Johnston RI</div>
                        <div>02919, USA</div>
                    </div>
                </div>
                <div class="col-md-4 clr_wht_i">
                    <div className="head">CONNECT WITH US</div>
                    <div className="social-icons flex " class="row mt_50">
                        <div class="icon col-md-2" v-for="(link) in sociallinks">
                            <a :href="prefixinurl(link.href)">
                                <i class="clr_wht_i" :class="iconclass(link)" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
</div>
</template>
<script>
import Constants from '../util/Constants'
export default {
    mixins:[Constants],
	data(){
        return {
            usefullinks:[
                { name: "Home", path: "/" },
                { name: "About", path: "/about-us" },
                { name: "SFH Nigeria", path: "/competition" },
                { name: "SFH Cameroon", path: "/contestants" },
                { name: "Global Gallery", path: "/gallery" },
                { name: "Contact Us", path: "/contact-us" },
                { name: "SFH Admin", path: "/" },
                { name: "Tracks/Records", path: "/" },
                { name: "Get Tickets", path: "/" },
            ],
            sociallinks:[
                { href: "https://www.facebook.com/Dew.keeys", iconName: "facebook" },
                { href: "https://www.instagram.com/soundfrom_heaven_official_page/", iconName: "instagram" },
                { href: "https://twitter.com/home", iconName: "twitter" },
                { href: "https://www.youtube.com/channel/UCmbSy4HywytuFS85njd_ZiQ", iconName: "youtube-play" },
                { href: "https://web.whatsapp.com/send?phone=+14013015054", iconName: "whatsapp" },
            ]
        }
    },
    methods:{
        iconclass(link){
            if(link!=null){
                return "fa fa-"+link.iconName;
            }
            return "";
        }
    }
}
</script>