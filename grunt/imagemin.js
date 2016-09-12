module.exports = {
  dynamic: {  
    files: [{
      expand: true,  
      cwd: '<%= config.buildFolder %>/app/images',
      src: ['**/*.{png,jpg,gif,svg}'],  
      dest: '<%= config.buildFolder %>/app/images'
    }]
  }
}