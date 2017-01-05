module.exports = function(grunt) {
    require('load-grunt-tasks')(grunt);

    grunt.initConfig({
        less: {
            libs: {
                options: {
                    compress: false,
                    ieCompat: true,
                    noLineComments: true,
                    paths: ['assets/css']
                },
                files: {
                    'web/.tmp/css/fontawesome.css': [
                        'app/Resources/lib/fontawesome/less/font-awesome.less'
                    ],
                    'web/.tmp/css/bootstrap.css': [
                        'app/Resources/lib/bootstrap/less/bootstrap.less'
                    ]
                }
            }
        },
        cssmin: {
            combine: {
                options:{
                    report: 'gzip',
                    keepSpecialComments: 0
                },
                files: {
                    'web/css/vendor/bootstrap.min.css': [
                        'web/.tmp/css/bootstrap.css'
                    ],
                    'web/css/vendor/fontawesome.min.css': [
                        'web/.tmp/css/fontawesome.css'
                    ]
                }
            }
        },
        uglify: {
            options: {
                mangle: false,
                sourceMap: false,
                sourceMapName: 'web/js/app.map'
            },
            dist: {
                files: {
                    // Config.yml
                    'web/js/vendor/bootstrap.js': [
                        'app/Resources/lib/bootstrap/js/transition.js',
                        'app/Resources/lib/bootstrap/js/alert.js',
                        'app/Resources/lib/bootstrap/js/button.js',
                        'app/Resources/lib/bootstrap/js/carousel.js',
                        'app/Resources/lib/bootstrap/js/collapse.js',
                        'app/Resources/lib/bootstrap/js/dropdown.js',
                        'app/Resources/lib/bootstrap/js/modal.js',
                        'app/Resources/lib/bootstrap/js/tooltip.js',
                        'app/Resources/lib/bootstrap/js/popover.js',
                        'app/Resources/lib/bootstrap/js/scroolspy.js',
                        'app/Resources/lib/bootstrap/js/tab.js',
                        'app/Resources/lib/bootstrap/js/affix.js'
                    ],
                    'web/js/vendor/jquery.js': [
                        'app/Resources/lib/jquery/dist/jquery.js'
                    ],
                    'web/js/vendor/jquery-ui/draggable.js': [
                        'app/Resources/lib/jquery-ui/ui/core.js',
                        'app/Resources/lib/jquery-ui/ui/widget.js',
                        'app/Resources/lib/jquery-ui/ui/mouse.js',
                        'app/Resources/lib/jquery-ui/ui/draggable.js'
                    ],
                    'web/js/app/main.js': [
                        'src/AppBundle/Resources/public/javascripts/app.js'
                    ]
                }
            }
        },
        copy: {
            dist: {
                files: [
                    {
                        expand: true,
                        cwd: 'app/Resources/lib/bootstrap/fonts/',
                        dest: 'web/fonts/',
                        src: ['**']
                    },
                    {
                        expand: true,
                        cwd: 'app/Resources/lib/fontawesome/fonts/',
                        dest: 'web/fonts/',
                        src: ['**']
                    }
                ]
            }
        },
        shell: {
            assets: {
                command: [
                    'php bin/console assets:install',
                    'php bin/console assets:install -e=prod'
                ].join(';')
            }
        },
        watch: {
            css: {
                files: [
                    'src/**/Resources/less/**/*.less'
                ],
                tasks: ['css']
            },
            javascript: {
                files: [
                    'src/**/Resources/public/javascripts/*.js',
                    'src/**/Resources/public/javascripts/**/*.js',
                    'app/Resources/ts/**/*.ts'
                ],
                tasks: ['javascript']
            }
        },
        concat: {
            js: {
                src: [
                    'web/js/vendor/*.js', // tous les JS dans libs
                    'web/js/app/*.js' // tous nos JS
                ],
                dest: 'web/js/all.js'
            },
            css: {
                src: [
                    'web/css/vendor/*.css', // tous les CSS dans libs
                    'web/css/app/*.css' // tous nos CSS
                ],
                dest: 'web/css/all.css'
            }
        }
    });

    grunt.registerTask('default', ['css', 'javascript', 'copy', 'shell', 'concat' ]);
    grunt.registerTask('javascript', ['uglify', 'concat']);
    grunt.registerTask('css', ['less','cssmin', 'concat']);
    grunt.registerTask('cp', ['copy']);
    grunt.registerTask('sh', ['shell'])
};
