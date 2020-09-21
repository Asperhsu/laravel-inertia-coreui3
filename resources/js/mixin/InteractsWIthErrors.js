export default {
    props: {
        errors: Object,
    },
    methods: {
        isValid(field) {
            if (!Object.keys(this.errors).length) {
                return null;
            }
            return !this.errors.hasOwnProperty(field);
        },
        getInvalidMsg(field) {
            return this.isValid(field) ? null : this.errors[field];
        },
    },
}
