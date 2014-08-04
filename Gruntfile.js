module.exports = function(grunt) {
    require('load-grunt-tasks')(grunt);

    grunt.initConfig({
        compass: {
            development: {
                options: {
                    sassDir: 'sass',
                    cssDir: 'css',
                    imagesDir: 'images',
                    httpPath: '/wp-content/themes/invisiblechildren2.0',
                    outputStyle: 'expanded',
                    environment: 'development',
                    sourcemap: true
                }
            },
            production: {
                options: {
                    sassDir: 'sass',
                    cssDir: 'css',
                    imagesDir: 'images',
                    httpPath: '/wp-content/themes/invisiblechildren2.0',
                    outputStyle: 'compressed',
                    environment: 'production',
                    force: true,
                    sourcemap: false
                }
            }
        },
        watch: {
            files: ['sass/**/*.scss'],
            tasks: ['compass:development']
        }
    });

    grunt.registerTask('default', ['compass:production']);
}