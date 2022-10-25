const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                sans: ['DMSans-Regular', ...defaultTheme.fontFamily.sans],    
                fredokaOne: ['FredokaOne'],            
            },
            colors: {               
                'black-primary': '#300000',
                'black-secondary': '#3B3E44', 
                'gray-primary' : '#F4F5F7',
                'gray-secondary' : '#E7E8EA',
                'gray-tertiary' : '#B1B5C4',
                'pink-red':'#E11166',
            },
            maxWidth: {
                '6xl': '1170px',
                '7xl': '1440px',
            } 
        },                       
    },    
    content: {
        content: [
            './app/**/*.php',
            './resources/**/*.html',
            './resources/**/*.js',
            './resources/**/*.jsx',
            './resources/**/*.ts',
            './resources/**/*.tsx',
            './resources/**/*.php',
            './resources/**/*.vue',
            './resources/**/*.twig',
        ],
        options: {
            defaultExtractor: (content) => content.match(/[\w-/.:]+(?<!:)/g) || [],
            whitelistPatterns: [/-active$/, /-enter$/, /-leave-to$/, /show$/],
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
};
