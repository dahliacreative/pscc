module.exports = {
  dynamic: {
    options: {
        plugins: [
             {cleanupIDs: false},
             {removeViewBox: false},
             {removeUselessStrokeAndFill: false}
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