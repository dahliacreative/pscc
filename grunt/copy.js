module.exports = {
  build: {
    files: [
      {
        expand: true, 
        cwd: '<%= config.srcFolder %>/app/fonts', 
        src: ['**/*.*'], 
        dest: '<%= config.buildFolder %>/app/fonts'
      },
      {
          expand: true,
          flatten: true,
          cwd: '<%= config.srcFolder %>/app/vendor',
          src: ['**/*.{png,jpg,gif,svg,webp}'],
          dest: '<%= config.buildFolder %>/app/images/vendor'
      },
      {
        expand: true, 
        cwd: '<%= config.srcFolder %>/app/images', 
        src: ['**/*.*'], 
        dest: '<%= config.buildFolder %>/app/images'
      },
      {
        expand: true, 
        cwd: '<%= config.srcFolder %>/app/data', 
        src: ['**/*.*'], 
        dest: '<%= config.buildFolder %>/app/data'
      },
      {
        expand: true, 
        cwd: '<%= config.srcFolder %>/app/handlebars', 
        src: ['**/*.*'], 
        dest: '<%= config.buildFolder %>/app/handlebars'
      }
    ]
  }
}
