<template>
    <div>
        <ListingTask :listing="listing" />
    </div>

</template>

<script setup>
    import ListingTask from '@/Components/ListingTask.vue'
    defineProps({
        listing: Object,
    })
</script>