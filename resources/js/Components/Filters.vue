<template>
    <form @submit.prevent="filter">
        <div class="mb-8 mt-4 flex flex-wrap gap-2">
            <div class="flex flex-nowrap items-center">
                <input v-model="filterForm.title" type="text" placeholder="Title"
                class="input-filter">
            </div>

            <div class="flex flex-nowrap items-center">
                <select v-model="filterForm.status" class="input-filter" >
                    <option disabled :value="null">
                        Status
                    </option>
                    <option>To-Do</option>
                    <option>In-Progress</option>
                    <option>Done</option>
                </select>
            </div>

            <button type="submit" class="btn-normal"> Filter </button>
            <button type="reset" @click="clear" class="btn-normal"> Clear </button>
        </div>
    </form>
</template>

<script setup>
    import {useForm} from '@inertiajs/inertia-vue3'

    const props = defineProps({
        filters: Object
    })

    const filterForm = useForm({
        title: props.filters.title ?? null,
        status: props.filters.status ?? null,
    })

    const filter = () => {
        filterForm.get('/listing',
            {
                preserveState: true,
                preserveScroll: true,
            },
        )
    }

    const clear = () => {
        filterForm.title = null
        filterForm.status = null
        filter()
    }
</script>