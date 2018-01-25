export default {
    init() {
        // JavaScript to be fired on the home page
        $('form').validate({
            rules: {
                other_physical_contact: {
                    required: "#default-contact-no:checked",
                },
                other_safety_mechanics: {
                    required: "#default-safety-no:checked",
                },
            },
            messages: {
                other_physical_contact: {
                    required: "This field is required if you are not using the default physical contact rules.",
                },
                other_safety_mechanics: {
                    required: "This field is required if you are not using the default safety mechanics.",
                },
            },
        });
    },
    finalize() {
        // JavaScript to be fired on the home page, after the init JS
    },
};
