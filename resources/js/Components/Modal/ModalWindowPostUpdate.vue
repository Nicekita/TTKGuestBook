<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import BreezeCheckbox from '@/Components/Checkbox.vue'
import {useForm } from '@inertiajs/inertia-vue3';
 const form = useForm({
    text: '',
    is_guest:false,
});
const submit = () => {
    form.post(route('addauthorpost'), {
        
    });
};
</script>
   <template>
<form @submit.prevent="submit" @submit="$emit('close')">
            <div>
                <BreezeLabel for="text" value="Ваше сообщение:" />
                <textarea сlass="ml-2" v-model="form.text"></textarea>
            </div>
            <div>
                <label class="flex items-center">
                <BreezeCheckbox v-if="$page.props.auth.user!=null" name="is_guest" v-model="form.is_guest"></BreezeCheckbox>
                <span v-if="$page.props.auth.user!=null" class="ml-2 text-sm text-gray-600">Отправить анонимно</span>
                </label>
            </div>
            <div class="flex items-center justify-end mt-4">
                <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Редактировать
                </BreezeButton>
            </div>
        </form>
</template>