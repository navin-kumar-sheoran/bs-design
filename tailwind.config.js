module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        gray: {
          100: '#e1e1e1',
        },

      },
      fontFamily: {
        'sans': ['Roboto','sans-serif'],
        'gmhn': ['Gilroy-Medium', 'Roboto', "Helvetica Neue"],
        'tnr' : ['Times New Roman'],
      },
      fontSize: {
        'tiny':'13px',
        'base':'0.9375rem',
        '9xl':'0.5625rem',
      },
      width: {
        '1170': '1170px',
        '784' : '784px',
        '750':'750px',
        '1000':'1000px',
        '652' : '652px',
        '540' : '540px',
        '480' : '480px',
        '330': '330px',
        '320':'320px',
        '261':'261px',
        '250' : '250px',
        '120' : '120px',
        '12/100':'12%',

      },
      height:{
        '5':'5px',
        '17':'17px',
        '25':'25px',
        '26':'26px',
        '28': '28px',
        '32':'32px',
        '33':'33px',
        '35':'35px',
        '48':'48px',
        '56':'56px',
        '60':'60px',
        '70':'70px',
        '85':'85px',
        '120': '120px',
      },
      minHeight: {
        '32':'32px',
        '40': '40px',
      },
      spacing: {
        '8px':'8px',
        '7px': '7px',
        '7.5px': '7.5px',
        '12px': '12px',
      },
      padding:{
        '1.1' : '5px',
        '15' : '15px',
        '30' : '30px',
      },
      borderWidth: {
        DEFAULT: '1px',
        '0': '0',
        '2': '2px',
        '3': '3px',
        '4': '4px',
        '6': '6px',
        '8': '8px',
      },
      borderRadius: {
        'none': '0',
        'large': '20px',

      },
      margin:{
        '1.1' : '5px',
        '9': '9px',
        '1.2':'8px',
        '18': '18px',
        '15': '15px',
        '17': '17px',
        '30': '30px',
        '380': '380px',
      },
      zIndex: {
        '1': '1',
        '8': '8',
        '99':'99',
      },
      screens: {
        'sm': '640px',
        'md': '768px',
        'lg': '992px',
        'xl': '1280px',
        '2xl': '1536px',
      },
      letterSpacing: {
        widest: '.0.03125rem',
        ftrspace:'0.0125rem',
        articlespace:'-0.1rem',
      },
      lineHeight: {
        '12': '1.875rem',
        '13': '2.875rem',
        'extra-loose': '3.6',
      },
    },
  },
  plugins: [],
}
