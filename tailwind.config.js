const colors = require('tailwindcss/colors')

module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue'
    ],
    darkMode: 'media', // or 'media' or 'class'
    theme: {
        fontFamily: {
            'display': ['"Righteous", sans-serif'],
            'serif': ['"Poppins", serif'],
            'body': ['"Work Sans", sans-serif'],
            'sans': ['"Poppins",  sans-serif'],
        },
        extend: {
            colors: {
                'teal': '#18bccb'
            }
        },
    },
    variants: {
        extend: {},
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
}
