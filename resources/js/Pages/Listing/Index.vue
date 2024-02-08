<template>
    <Filters :filters="filters"></Filters>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        <box v-for="listing in listings.data" :key="listing.id">
            <div>
                <Link :href="`/listing/${listing.id}`">
                    <ListingTask :listing="listing" class="text-lg"/>
                </Link>
            </div>
            <section>
                <Link class="btn-outline text-xs font-medium" :href="`/listing/${listing.id}`">
                    Edit
                </Link>
                <Link class="btn-outline text-xs font-medium" :href="`/listing/${listing.id}`" as="button" method="delete">
                    Delete
                </Link>
            </section>
        </box>
        <div v-if="listings.data.length" class="w-full flex justify-center mt-8 mb-8">
            <Pagination :links="listings.links"></Pagination>
        </div>
    </div>
</template>

<script setup>
    import {Link} from '@inertiajs/inertia-vue3'
    import ListingTask from '@/Components/ListingTask.vue'
    import Pagination from '@/Components/UI/Pagination.vue'
    import Filters from '@/Components/Filters.vue'
    import Box from '@/Components/UI/Box.vue'

    defineProps({
        listings: Object,
        filters: Object
    })
</script>