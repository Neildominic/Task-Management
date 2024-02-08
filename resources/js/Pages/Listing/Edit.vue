<template>
    <form @submit.prevent="update">
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-2">
                <label class="label">Title</label>
                <input v-model="form.title" type="text" class="input"/>
            </div>

            <div class="col-span-2">
                <label class="label">Description</label>
                <input v-model="form.description" type="text" class="input"/>
            </div>

            <div class="col-span-2">
                <label class="label">Status</label>
                <!--<input v-model="form.status" type="text" class="input"/>-->
                <select v-model="form.status" class="input">
                    <option disabled value="">Please select one</option>
                    <option>To-Do</option>
                    <option>In-Progress</option>
                    <option>Done</option>
                </select>
            </div>

            <div class="col-span-2">
                <input type="checkbox" id="draft" name="draft" v-model="form.draft"> Save as Draft
            </div>

            <div class="col-span-6">
                <button type="submit" class="btn-primary">Update Task</button>
            </div>

        </div>
    </form>
</template>

<script setup>
    import { useForm } from '@inertiajs/inertia-vue3'

    const props = defineProps({
        listing: Object,
    })

    const form = useForm({
        title: props.listing.title,
        description: props.listing.description,
        status: props.listing.status,
        draft: null,
    })
    const update = () => form.put(`/listing/${props.listing.id}`)
</script>
