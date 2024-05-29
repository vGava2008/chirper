<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import EmployeeCard from '@/Components/Employee.vue';
defineProps(['employee']);
</script>
<template>
    <Head :title="employee.name" ><title>{{employee.name}}</title></Head>
        <authenticated-layout>
            <EmployeeCard :employee="employee">

            </EmployeeCard>
        </authenticated-layout>
</template>
