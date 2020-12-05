module.exports = {
  future: {
	  purgeLayersByDefault: true
  },
  purge: {
	  layers: ['base', 'components', 'utilities'],
	  content: ['./**/*.php']
  },
  theme: {
	fontFamily: {
      title: ['Montserrat', 'sans-serif'],
      body: ['Montserrat', 'sans-serif'],
    },
    colors: {
	    red: '#f00',
	    white: "#fff",
	    black: "#000",
	    gray: "#e0e0e0"
    },
    extend: {
	    inset: {
		  '1/4': '25%',
		  '1/2': '50%',
		  '1': '100%'
	    },
	    zIndex: {
		    '-1': '-1'
	    }
    },
  },
  variants: {
  },
  plugins: [],
}