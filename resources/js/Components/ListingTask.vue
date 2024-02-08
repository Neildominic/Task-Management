<template>
    <div v-if="listing.is_published == 1">
        <span class="draft-list"> DRAFT </span>
    </div>
    <div>
        <span class="font-bold"> Title: </span> <span class="text-gray-400">{{ listing.title }}</span>
    </div>
    <div>
        <span class="font-bold"> Description: </span> <span class="text-gray-400">{{ listing.description }}</span>
    </div>
    <div>
        <span class="font-bold"> Status: </span> <span class="text-gray-400">{{ listing.status }}</span>
    </div>

</template>

<script setup>
    defineProps({
        listing: Object,
    })


</script>