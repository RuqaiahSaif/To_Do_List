<template>
    <div class="addItem">
   <input type="text" v-model="item.name"/>
   <span :class="[ item.name ? 'active': 'inactive' ,'plus']" @click="additem">+</span>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    data:function(){
return{
    item:{
        name:""
    }
}
},
methods:{
    additem(){
        
        if(this.item.name==""){
            return
        }
        axios.post('/api/item/store', {item: this.item})
        .then((res) => {
          if(res.status == 201)
          {
        this.item.name ="";
        this.$emit('reloadList');
          }
          console.log(res.data);
          
        })
        .catch((error) => {
          error = error
          console.log(error );
        })
       
    }
}
    
}
</script>
<style scoped>
.addItem{
    display: flex;
    justify-content: center;
    align-items: center;
}
.plus{
    font-size: 20px;
    font-weight: bold;
    cursor:pointer;
}
input{
    outline: none;
    background: #f7f7f7;
    border: none;
    margin-right: 10px;
    padding: 5px
}
.active{
    color:green;
}
.inactive{
    color:#999999;
}
</style>