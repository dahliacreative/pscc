module.exports = {
    build: {
    	command: 'bower-installer'
    },
    rename: {
        command: 'for file in `find <%= config.srcFolder %>/app/vendor -name "*.css" -type f`; do mv $file `sed "s/css$/scss/" <<<"$file"`; done'
    }
}