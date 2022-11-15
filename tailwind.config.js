const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
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
    theme: {
        extend: {
            fontFamily: {
                sans: ['DMSans-Regular', ...defaultTheme.fontFamily.sans],    
                fredokaOne: ['FredokaOne'],            
                fredoka: ['Fredoka'],    
            },
            colors: {               
                'black-primary': '#300000',
                'black-secondary': '#3B3E44', 
                'gray-primary' : '#F4F5F7',
                'gray-secondary' : '#E7E8EA',
                'gray-tertiary' : '#B1B5C4',
                'pink-red':'#E11166',
                'pink-red-secondary' : '#FDEEF4',
            },
            maxWidth: {
                '6xl': '1170px',
                '7xl': '1440px',
            },
            width: {
                '6xl': '1170px',
            },
            backgroundImage: {
                'home-hero': "url('/images/home/hero.png')",    
                'footer-image-pattern': 'linear-gradient(0deg, rgba(7,0,0,1) 6%, rgba(121,9,9,0) 35%, rgba(255,255,255,1) 100%)',                
            },
            padding: {
                '22' : "84px",
            }           
        },                       
    },        
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/line-clamp'),
    ],
};
