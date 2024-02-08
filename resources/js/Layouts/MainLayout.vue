<template>
    <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 w-full">
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between">
                <div class="listing">
                    <Link :href="`/listing`">Task</Link>
                </div>
                <div class="text-xl text-indigo-600 dark:text-indigo-300 font-bold text-center">
                    <Link>Task Management Apps</Link>
                </div>
                <div v-if="user" class="flex items-center gap-4">
                    <div class="text-sm text-gray-500">{{ user.name }}</div>
                    <Link :href="`/listing/create`" class="bg-indigo-600 hover-indigo-500 text-white font-medium p-2 rounded-md">+ New Task</Link>
                    <div>
                        <Link :href="`/logout`" method="delete" as="button">Logout</Link>
                    </div>
                </div>
                <div v-else class="flex items-center gap-2">
                    <Link :href="`/user-account/create`">Register</Link>
                    <Link :href="`/login`">Sign-in</Link>
                </div>
            </nav>
        </div>
    </header>

    <main class="container mx-auto p-4 w-full">
        <div v-if="flashSuccess" class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-800 bg-green-500 dark:bg-green-900 p-2">
            {{ flashSuccess }}
        </div>
        <slot>Default</slot>
    </main>


</template>

<script setup>
    import { Link, usePage } from '@inertiajs/inertia-vue3'
    import {computed} from 'vue'

    const page = usePage()
    const flashSuccess = computed(
        () => page.props.value.flash.success
    )
    const user = computed(
        () => page.props.value.user,
    )
</script>