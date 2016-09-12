module.exports = function (grunt, options) {

    var config = grunt.file.readJSON('GruntConfig.json'),
        baseTasks = ['shell', 'clean', 'sass', 'copy', 'concat', 'uglify', 'imagemin'],
        staticTasks = [];

    if(config.staticSite) {
        staticTasks.push('zetzer', 'connect');
    }

    return {
        'build': baseTasks.concat(staticTasks),
        'default': ['build', 'watch']
    }
};