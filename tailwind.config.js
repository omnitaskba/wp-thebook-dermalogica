/** @type {import('tailwindcss').Config} */


const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  content: ["./*.{php,js}", "./partials/*.php", "./search-filter/*.php"],
  theme: {
    extend: {
      fontFamily: {
          'helvetica25': ['Helvetica Neue LT W05_25 Ult Lt'],
          'helvetica35': ['Helvetica Neue LT W05_35 Thin'],
          'helvetica45': ['Helvetica Neue LT W05_45 Light'],
          'helvetica55': ['Helvetica Neue LT W05_55 Roman'],
          'helvetica75': ['Helvetica Neue LT W05_75 Bold']
      },
      colors:{
        primary:{
            dark:'#353F48',
            light:'#80868A'
        },
        secondary:{
          DEFAULT:'#5E93DB',
          light:'#F2F5FA'
        },
        grayCustom:' #f1f1f1'
      },
      fontSize:{
          xxs:'11px'
      },
      boxShadow:{
        'ai':'0px 0px 15px rgba(141, 152, 159, 0.4);'
      }
    },
  },
  plugins: [],
}
