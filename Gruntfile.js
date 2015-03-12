module.exports = function (grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        less: {
            development: {
                files: {
                    'webroot/css/app.css': 'webroot/less/app.less'
                }
            }
        },
        cssmin: {
            combine: {
                files: {
                    'webroot/css/app.min.css': ['webroot/css/app.css']
                }
            }
        },
        watch: {
            scripts: {
                files: ['**/*.less'],
                tasks: ['default'],
                options: {
                    spawn: false
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-cssmin');

    grunt.registerTask('default', ['less', 'cssmin']);
};