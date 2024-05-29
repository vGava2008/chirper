<script setup>
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';

dayjs.extend(relativeTime);

const props = defineProps(['employees']);

</script>
<script>
export default {
    data() {
        return {
            employees: [] // Ваши данные сотрудников
        };
    },
    methods: {
        destroyUrl(employeeId) {
            return route('employee.destroy', employeeId);
        },
        confirmDelete(employeeId) {
            if (confirm("Вы уверены, что хотите удалить сотрудника?")) {
                // Выполните необходимые действия для удаления сотрудника
                // Например, отправьте запрос на удаление через API
            }
        },
        deleteEmployee(employeeId) {
            // Выполняем запрос DELETE к URL-адресу deleteEmployeeUrl
            axios.delete(`/employee/${employeeId}`)
                .then(response => {
                    // Обработка успешного удаления
                    console.log('Employee deleted:', response.data);
                    // Дополнительные действия при успешном удалении
                })
                .catch(error => {
                    // Обработка ошибок
                    console.error('Error deleting employee:', error.response.data);
                    // Дополнительные действия при ошибке удаления
                });
        }
    }
};
</script>

<template>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Services
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Position
                            </th>

                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                            <th>

                            </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="employee in employees">
                            <td class="px-6 py-4 whitespace-pre-wrap text-sm font-medium text-gray-900">
                                <a :href="route('employee.show', employee.id)" class="text-indigo-600 hover:text-indigo-900">
                                    {{ employee.first_name }}
                                </a>
                            </td>

                            <td class="px-6 py-4 whitespace-pre-wrap text-sm font-medium text-gray-900">
                                <a v-for="service in employee.services" :href="route('service.show', service.id)" class="text-indigo-600 hover:text-indigo-900">
                                    {{ service.name }}
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-pre-wrap text-sm font-medium text-gray-900">
                                    {{ employee.position }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                  Active
                                </span>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a :href="route('employee.edit', employee.id)" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" @click="deleteEmployee(employee.id)">
                                    Delete
                                </a>

<!--                                <a href="#" class="text-indigo-600 hover:text-indigo-900" @click="deleteEmployee(employee)">Delete</a>-->

<!--                                <a :href="route('employee.destroy', employee)" class="text-indigo-600 hover:text-indigo-900">Delete</a>-->
                            </td>
                            <!---->
                            <!--                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">-->
                            <!---->
                            <!--                                <a as="button" :href="route('employees.destroy', employee)" method="delete">-->
                            <!--                                    Delete-->
                            <!--                                </a>-->
                            <!--                            </td>-->
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
