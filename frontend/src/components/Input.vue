<script>
export default {
    props: {
        modelValue: {
            type: String,
            required: true
        },
        name: {
            type: String,
            required: true
        },
        label: {
            type: String,
            required: true
        },
        type: {
            type: String,
            default: 'text'
        },
        placeholder: {
            type: String,
            default: ''
        },
        required: {
            type: Boolean,
            default: false
        },
    },
    computed: {
        inputValue: {
            get() {
                return this.modelValue
            },
            set(value) {
                this.$emit('update:modelValue', value)
            }
        },
    },
}
</script>
<template>
    <div class="modal__inputWrapper">
        <label class="modal__inputLabel" :for="name">{{ label }}</label>
        <input class="modal__input" v-model="inputValue" :type="type" :id="name" :placeholder="placeholder" :name="name"
            :required="required">
        <p class="modal__inputError" v-if="error">{{ error }}</p>
    </div>
</template>
