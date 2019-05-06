<template>
    <div class="control">
        <label><slot /></label>
        <textarea
            :value="value"
            @input="$emit('input', $event.target.value)"
        ></textarea>
    </div>
</template>

<script>
export default {
    // name: 'app-textarea',
    props: {
        value: {
            type: String,
            default: ''
        }
    }
}
</script>