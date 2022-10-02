<template>
<div class="item">
<input type="checkbox"
 @change="updateCheck()"
 v-model="item.completed"/>
 <span :class="[ item.completed ? 'completed': '' ,'itemText']">{{ item.name}}</span>
 <button @click="remove()"> delete</button>
</div>
</template>
<script>
import axios from 'axios'
export default {
    props:['item'],
    methods:{
        updateCheck(){
            axios.put('api/item/'+ this.item.id,{
item:this.item               
            })
            .then((res) => {
          if(res.status == 200)
          {
        this.$emit('itemchanged');
          }
          
        })
        .catch((error) => {
          error = error
          console.log(error );
        })
        },
    
    remove(){
        axios.delete('api/item/'+ this.item.id) 
        .then((res) => {
          if(res.status == 200)
          {
        this.$emit('itemchanged');
          }
          
        })
        .catch((error) => {
          error = error
          console.log(error );
        }) 
    }

} 
}
</script>
<style  scoped>
.completed{
    text-decoration: line-through;
}
.item{
    display: flex;
    justify-content: center;
    align-items: center;
}
.itemText{
    width:100%;
    margin-left: 10px;
}
</style>