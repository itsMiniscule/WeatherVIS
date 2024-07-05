/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/views/**/*.blade.php',
        './resources/css/**/*.css',
        './resources/js/**/*.js',
    ],
    theme: {
        extend: {
            backgroundImage: theme => ({
                'wind-farm': "url('../assets/wind-farm.jpg')",
            }),
        },
    },
    plugins: [],
}
