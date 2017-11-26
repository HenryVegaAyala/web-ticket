/* eslint-disable quotes */
module.exports = function (grunt) {
    grunt.initConfig({
        concat_css: {
            all: {
                src: [
                    'web/css/site.css'
                ],
                dest: 'web/css/ticket.css'
            }
        },
        purifycss: {
            options: {},
            target: {
                src: ['views/layouts/*.php', 'views/site/*.php', 'web/js/all.js'],
                css: ['web/css/ticket.css'],
                dest: 'web/css/ticket.css'
            }
        },
        cssmin: {
            site: {
                files: [{
                    expand: true,
                    cwd: 'web/css/',
                    src: ['ticket.css'],
                    dest: 'web/css/',
                    ext: '.min.css'
                }]
            }
        },
        concat_sourcemap: {
            options: {
                sourcesContent: true
            },
            all: {
                files: {
                    'web/js/all.js': grunt.file.readJSON('assets/js/all.json')
                }
            }
        },
        minified: {
            files: {
                src: ['web/js/all.js'],
                dest: 'web/js/'
            },
            options: {
                sourcemap: true,
                allinone: false
            }
        },
        imagemin: {
            dynamic: {
                files: [{
                    expand: true,
                    cwd: 'web/img/',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: 'web/img/'
                }]
            }
        },
        watch: {
            js: {
                files: ['assets/js/**/*.js', 'assets/js/all.json'],
                tasks: ['concat_sourcemap', 'uglify:lib'],
                options: {
                    livereload: true
                }
            },
            less: {
                files: ['web/css/site.css'],
                tasks: ['concat_css', 'purifycss', 'cssmin'],
                options: {
                    livereload: true
                }
            }
        }
    }),

        grunt.loadNpmTasks('grunt-concat-css'),
        grunt.loadNpmTasks('grunt-contrib-cssmin'),
        grunt.loadNpmTasks('grunt-purifycss'),
        grunt.loadNpmTasks('grunt-concat-sourcemap'),
        grunt.loadNpmTasks('grunt-minified'),
        grunt.loadNpmTasks('grunt-contrib-imagemin'),
        grunt.loadNpmTasks('grunt-contrib-watch'),

        grunt.registerTask('build', ['concat_css', 'purifycss', 'cssmin', 'concat_sourcemap', 'minified', 'imagemin']),
        grunt.registerTask('default', ['watch'])
}