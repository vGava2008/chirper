<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Employees from '@/Components/Employees.vue';

defineProps(['employees']);
</script>
<template>
    <Head title="Employees" />
    <AuthenticatedLayout>
        <div class="max-w-6xl mx-auto p-4 sm:p-6 lg:p-8">
            <Employees :employees="employees"/>
            <div class="mt-6 text-right">
                <a :href="route('employee.create')">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add new employee</button>
                </a>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
