<template>
    <div id="feedback">
        <router-view/>
    </div>
</template>

<script>
    export default {
        name: 'Feedback',
      created:function(){
        this.funuser();
      },
      methods:{
        funuser:function(){
          if (/(Android)/i.test(navigator.userAgent)) {
            try{
              Uid=window.jsObj.getUid();
              Mobile=window.jsObj.getMobile();
              NickName=window.jsObj.getNickName();
              UserAvatar=window.jsObj.getUserAvatar();
            }
            catch(error){
              Uid=1;
              Mobile=1;
              NickName=1;
              UserAvatar=1;
            }
          }

          else if (/(iPhone|iPad|iPod|iOS)/i.test(navigator.userAgent)) {
            try{
              Uid=localStorage.getItem("Uid");
              Mobile=localStorage.getItem("Mobile");
              NickName=localStorage.getItem("NickName");
              UserAvatar=localStorage.getItem("UserAvatar");
              // Uid=window.getUserID();
              // Mobile=window.getPhoneNum();
              // NickName=window.getNickName();
              // UserAvatar=window.getAvater();
            }
            catch(error){
              Uid=2;
              Mobile=2;
              NickName=2;
              UserAvatar=2;
            }
          }
        }
      },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
