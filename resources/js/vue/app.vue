<template>
    <div class="container">
        <div class="heading">
        <h2 id="title"> TO do list</h2>
    
<add-item-form v-on:reloadList="getList()"></add-item-form>
</div>
<list-view :items="items" 
v-on:reloadList="getList()"></list-view>
    </div>
</template>
<script>
 import AddItemForm from './AddItemForm.vue';
import ListView from './ListView.vue';

    
export default {
  components: { AddItemForm,
    ListView },
    data:function(){
return{
    items:[]
}
},
methods:{
    getList(){
        axios.get('api/items')
        .then((res) => {
          this.items = res.data
        })
        .catch((error) => {
          error = error
        })

    }
},
created(){
        this.getList();
    }

    
}
</script>
<style scoped>
.container{
    width:350px;
    margin: auto;
}
.heading{
    background: #e6e6e6;
    padding:10px;
}
#id{
    text-align: center;
}
</style>