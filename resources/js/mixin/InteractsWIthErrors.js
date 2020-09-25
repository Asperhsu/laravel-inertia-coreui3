export default {
    props: {
        errors: Object,
    },
    methods: {
        isValid(field) {
            if (this.errors.hasOwnProperty(field)) {
                return false;
            }
            return null;
        },
        getInvalidMsg(field) {
            return this.isValid(field) ? null : this.errors[field];
        },
    },
}
