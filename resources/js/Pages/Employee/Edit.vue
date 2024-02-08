<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import EmployeeEditForm from '@/Components/EmployeeEditForm.vue';
    defineProps(['employee', 'services']);
</script>

<script>
export default {
    props: ['employee', 'services'],


    data() {
        return {
            form: {
                name: '',
                description: '',
                // Добавьте здесь другие поля модели, которые необходимо обновить
            },
            errors: {},
        };
    },

    mounted() {
        this.form = { ...this.employee };
    },
    methods: {
        goBack() {
            window.history.back();
        },
        updateModel() {
            axios.put(route('service.update', this.employee.id), this.employee)
                .then(response => {
                    this.$emit('employee-updated', response.data.employee);
                    this.form = { ...response.data.employee };
                    window.location.href = route('employee.show', {'id' :  this.employee.id});
                });
        },
    },
};
</script>
<template>
    <AuthenticatedLayout>
        <EmployeeEditForm :employee="employee" :services="services">

        </EmployeeEditForm>
    </AuthenticatedLayout>
</template>


