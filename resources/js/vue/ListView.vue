<template>
    <div v-for="(item, index) in items" :key="index">
        <list-item :item="item" class="item" v-on:itemchanged="$emit('reloadList')" />
    </div>
</template>
<script>

    import listItem from './ListItem.vue'
    
export default {
    props:['items'],
    components:{
        listItem 
    }
}
</script>
<style scoped>
.item{
    background: #e6e6e6;
    padding: 5px;
    margin-top: 5px;
}
</style>