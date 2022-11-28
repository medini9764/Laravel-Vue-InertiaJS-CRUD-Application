
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head ,Link} from '@inertiajs/inertia-vue3';

const props =defineProps({
    students:Array,
   }) 
</script>

<template>
    <Head title="Student" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Student List</h2>
        </template>
              
        <div class="py-12">
             <div class="max-w-7xl mx-auto sm:mx-6 lg:px-8">
                <div class="flex justify-end m-2 p-2">
                    <Link href="/student/create" class="px-4 bg-indigo-500 hover:bg-indigo-600 text-white rounded">Add Student</Link>
                </div>
                <div clas="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:mx-6  lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Age</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr v-for="student in students" :key="student.id">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{student.id}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex item-center">
                                                    <div class="flex-shrink-0 h-20 w-20">
                                                        <img :src="student.image" class="h-20 w-20 rounded-full"  alter=""/>
                                                    </div>
                                                    <div class="m-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{student.name}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{student.age}}</td>
                                            
                                            <td v-if="student.status==1" class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Select</span>
                                            </td>
                                            
                                            <td v-if="student.status==0" class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Not Select</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <Link :href="`/student/${student.id}/show`" class="m-2 pb-2 px-4 bg-green-500 hover:bg-green-600 text-white rounded">View</Link>
                                                <Link :href="`/student/${student.id}/edit`"  class="m-2 pb-2 px-4 bg-yellow-500 hover:bg-yellow-600 text-white rounded">Update</Link>
                                                <Link :href="`/student/${student.id}`" method="delete" as="button" type="button" class="m-2 pb-2 px-4 bg-red-500 hover:bg-red-600 text-white rounded">Delete</Link>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        
    </AuthenticatedLayout>
</template>

