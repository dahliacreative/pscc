module.exports = {
  dynamic: {  
    options: {
        svgoPlugins: [
            {removeViewBox: false},
            {removeUselessStrokeAndFill: false},
            {removeEmptyAttrs: false}
        ]
    },
    files: [{
      expand: true,  
      cwd: '<%= config.buildFolder %>/app/images',
      src: ['**/*.{png,jpg,gif}'],  
      dest: '<%= config.buildFolder %>/app/images'
    }]
  }
}