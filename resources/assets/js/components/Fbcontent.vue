<template>
    <div id="fbcontent">
        <el-container>
            <el-header>意见反馈</el-header>
            <el-main>Main</el-main>
        </el-container>
    </div>
</template>

<script>
    export default {
        name:'fbcontent',
        computed:{
            nologin:function(){
                return (Uid==0||Uid==1||Uid=="(null)"||Uid==null||Uid==2);
            },
        },
        created:function(){
            if(this.nologin){
                this.$message({
                    message: '登录汕头橄榄台才可参加！',
                    type: 'warning'
                });
                return;
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style>
  .el-header {
    background-color: #409EFF;
    color: #fff;
    font-size: larger;
    text-align: center;
    line-height: 60px;
  }
  </style>