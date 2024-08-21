module.exports = function (grunt) {
  'use strict';

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    watch: {
      less: {
        files: ['build/less/*.less'],
        tasks: ['less:development', 'less:production', 'replace', 'notify:less']
      },
      js: {
        files: ['build/js/*.js'],
        tasks: ['js', 'notify:js']
      },
      skins: {
        files: ['build/less/skins/*.less'],
        tasks: ['less:skins', 'less:minifiedSkins', 'notify:less']
      }
    },
    notify: {
      less: {
        options: {
          title: 'SimcoGroup',
          message: 'LESS finished running'
        }
      },
      js: {
        options: {
          title: 'SimcoGroup',
          message: 'JS bundler finished running'
        }
      }
    },
    less: {
      development: {
        files: {
          'dist/css/SimcoGroup.css': 'build/less/SimcoGroup.less',
          'dist/css/alt/SimcoGroup-without-plugins.css': 'build/less/SimcoGroup-without-plugins.less',
          'dist/css/alt/SimcoGroup-select2.css': 'build/less/select2.less',
          'dist/css/alt/SimcoGroup-fullcalendar.css': 'build/less/fullcalendar.less',
          'dist/css/alt/SimcoGroup-bootstrap-social.css': 'build/less/bootstrap-social.less'
        }
      },
      production: {
        options: {
          compress: true
        },
        files: {
          'dist/css/SimcoGroup.min.css': 'build/less/SimcoGroup.less',
          'dist/css/alt/SimcoGroup-without-plugins.min.css': 'build/less/SimcoGroup-without-plugins.less',
          'dist/css/alt/SimcoGroup-select2.min.css': 'build/less/select2.less',
          'dist/css/alt/SimcoGroup-fullcalendar.min.css': 'build/less/fullcalendar.less',
          'dist/css/alt/SimcoGroup-bootstrap-social.min.css': 'build/less/bootstrap-social.less'
        }
      },
    },
    uglify: {
      options: {
        mangle: true,
        preserveComments: 'some'
      },
      production: {
        files: {
          'dist/js/SimcoGroup.min.js': ['dist/js/SimcoGroup.js']
        }
      }
    },
    replace: {
      withoutPlugins: {
        src: ['dist/css/alt/SimcoGroup-without-plugins.css'],
        dest: 'dist/css/alt/SimcoGroup-without-plugins.css',
        replacements: [
          {
            from: '../img',
            to: '../../img'
          }
        ]
      },
      withoutPluginsMin: {
        src: ['dist/css/alt/SimcoGroup-without-plugins.min.css'],
        dest: 'dist/css/alt/SimcoGroup-without-plugins.min.css',
        replacements: [
          {
            from: '../img',
            to: '../../img'
          }
        ]
      }
    },
    includes: {
      build: {
        src: ['*.html'],
        dest: 'documentation/',
        flatten: true,
        cwd: 'documentation/build',
        options: {
          silent: true,
          includePath: 'documentation/build/include'
        }
      }
    },
    image: {
      dynamic: {
        files: [
          {
            expand: true,
            cwd: 'build/img/',
            src: ['**/*.{png,jpg,gif,svg,jpeg}'],
            dest: 'dist/img/'
          }
        ]
      }
    },
    jshint: {
      options: {
        jshintrc: 'build/js/.jshintrc'
      },
      grunt: {
        options: {
          jshintrc: 'build/grunt/.jshintrc'
        },
        src: 'Gruntfile.js'
      },
      core: {
        src: 'build/js/*.js'
      },
      demo: {
        src: 'dist/js/demo.js'
      },
      pages: {
        src: 'dist/js/pages/*.js'
      }
    },
    jscs: {
      options: {
        config: 'build/js/.jscsrc'
      },
      core: {
        src: '<%= jshint.core.src %>'
      },
      pages: {
        src: '<%= jshint.pages.src %>'
      }
    },
    csslint: {
      options: {
        csslintrc: 'build/less/.csslintrc'
      },
      dist: [
        'dist/css/SimcoGroup.css'
      ]
    },
    bootlint: {
      options: {
        relaxerror: ['W005']
      },
      files: ['pages/**/*.html', '*.html']
    },
    clean: {
      build: ['build/img/*']
    }
  });

  // Load all grunt tasks
  require('load-grunt-tasks')(grunt);

  // Linting task
  grunt.registerTask('lint', ['jshint', 'csslint', 'bootlint']);
  // JS task
  grunt.registerTask('js', ['concat', 'uglify']);
  // CSS Task
  grunt.registerTask('css', ['less:development', 'less:production', 'replace']);

  // The default task (running 'grunt' in console) is 'watch'
  grunt.registerTask('default', ['watch']);
};
