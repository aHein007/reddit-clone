<template>
    <Head title="Create Community" />

      <AuthenticatedLayout>
          <template #header>
              <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Post for </h2>
          </template>



          <div class="py-12">
              <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white p-10 m-2 rounded-lg">


              <form @submit.prevent="submit">
                  <div>
                      <InputLabel for="title" value="Title" />

                      <TextInput
                          id="title"
                          type="text"
                          class="mt-1 block w-full"
                          v-model="form.title"

                          autofocus
                          autocomplete="title"
                      />

                      <InputError class="mt-2" :message="form.errors.title" />
                  </div>



                    <div class="mt-2">
                      <InputLabel for="url" value="Url" />

                      <TextInput
                          id="url"
                          type="text"
                          class="mt-1 block w-full"
                          v-model="form.url"

                          autofocus
                          autocomplete="url"
                      />

                      <InputError class="mt-2" :message="form.errors.url" />
                  </div>

                  <div class="mt-4">
                      <InputLabel for="description" value="Description" />

                      <TextInput
                          id="description"
                          type="text"
                          class="mt-1 block w-full"
                          v-model="form.description"

                          autocomplete="description"
                      />

                      <InputError class="mt-2" :message="form.errors.description" />
                  </div>



                  <div class="flex items-center justify-end mt-4">
                      <!-- <Link
                          :href="route('login')"
                          class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                      >
                          Already registered?
                      </Link> -->

                      <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                          Update
                      </PrimaryButton>
                  </div>
              </form>

              </div>
          </div>
      </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm ,Link } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

let props =defineProps({
    post:Object,
community:Object,
  errors: Object,

})

const submit = () => {
    form.put(route('communities.post.update',[props.community.slug,props.post.slug]))
};

const form = useForm({
  title: props.post?.title,
  description: props.post?.description,
  url:props.post?.url
});
</script>

<style lang="scss" scoped>

</style>
