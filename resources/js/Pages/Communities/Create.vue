<template>
 <Head title="Create community" />

<AuthenticatedLayout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create community
        </h2>
    </template>

    <div class="py-12">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Name" />
                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name"  autofocus autocomplete="name" />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="slug" value="Slug" />
                <TextInput id="slug" type="text" class="mt-1 block w-full" v-model="form.slug"  autocomplete="username" />
                <InputError class="mt-2" :message="form.errors.slug" />
            </div>


            <div class="mt-4">
                <InputLabel for="description" value="Description" />
                <TextInput id="description" type="text" class="mt-1 block w-full" v-model="form.description"  autofocus autocomplete="description" />
                <InputError class="mt-2" :message="form.errors.description" />
            </div>











            <div class="flex items-center justify-end mt-4">


                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Store
                </PrimaryButton>
            </div>
        </form>
        </div>
    </div>
</AuthenticatedLayout>
</template>

<script  setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    name: '',
    description:'',
    slug:'',
    terms: false,
});


const submit = () => {
    form.post(route('communities.store'));
};
</script>

<style>

</style>
