
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head ,Link,useForm} from '@inertiajs/inertia-vue3';
import {Inertia} from '@inertiajs/inertia';

const props =defineProps({
    student:Object,
    image:String
})


</script>

<template>
    <Head title="Student" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Student Details</h2>
        </template>
              
        <div class="py-12">
             <div class="max-w-3xl mx-auto sm:mx-30 lg:px-8">
                <div class="flex justify-end m-2 p-2">
                    <Link href="/student" class="px-4 bg-indigo-500 hover:bg-indigo-600 text-white rounded">Back</Link>
                </div>
                <div clas="flex">
                    <table class="min-w-full divide-y divide-gray-200">
                                    <tbody  class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">ID</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{student.id}}</td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Name</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{student.name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Image</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <img :src="image" class="h-20 w-20 rounded-full"  alter=""/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Age</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{student.age}}</td>
                                        </tr>   
                                            
                                        <tr>    
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Status</td>
                                            <td v-if="student.status==1" class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Select</span>
                                            </td>
                                            
                                            <td v-if="student.status==0" class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Not Select</span>
                                            </td>
                                        </tr>
                                    </tbody>
                    </table>
                </div>
            </div>  
        </div>
        
    </AuthenticatedLayout>
</template>

