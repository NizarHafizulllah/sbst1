module.exports = function(grunt) {

  // configure the tasks
  grunt.initConfig({
//  Copy
    copy: {
      main: {
        src: ['**/*',  '!**/node_modules/**',  '!**/sass/**',  '!**/dist/**',  '!**/bin/**',  '!**/temp/**', '!**/templates/**','!.gitgnore','!package.json','!package.js','!bower.json','!Gruntfile.js'],
        expand: true,
        cwd: '',
        dest: 'dist',
      }
    },

//  Sass

    sass: {
      main: {
        options: {
          outputStyle: 'expanded',
          sourcemap: false,
        },
        files: {
          'css/materialize.css': 'sass/materialize.scss',
          'css/style.css': 'sass/style.scss',
          'css/layouts/style-fullscreen.css': 'sass/theme-components/layouts/style-fullscreen.scss',
          'css/layouts/style-horizontal.css': 'sass/theme-components/layouts/style-horizontal.scss'
        }
      },

      dist: {
        options: {
          outputStyle: 'compressed',
          sourcemap: false
        },
        files: {
          'dist/css/materialize.min.css': 'sass/materialize.scss',
          'dist/css/style.min.css': 'sass/style.scss',
          'dist/css/layouts/layout-2.min.css': 'sass/theme-components/layouts/style-fullscreen.scss',
          'dist/css/layouts/layout-3.min.css': 'sass/theme-components/layouts/style-horizontal.scss'
        }
      },


      // Compile ghpages css
      bin: {
        options: {
          style: 'expanded',
          sourcemap: false
        },
        files: {
          'bin/materialize.css': 'sass/materialize.scss',
          'bin/style.css': 'sass/style.scss',
          'bin/layouts/style-fullscreen.css': 'sass/theme-components/layouts/style-fullscreen.scss',
          'bin/layouts/style-horizontal.css': 'sass/theme-components/layouts/style-horizontal.scss'
        }
      }
    },

  // Browser Sync integration
    browserSync: {
      bsFiles: ["bin/*.js", "bin/*.css", "!**/node_modules/**/*"],
      options: {
          server: {
              baseDir: "./" // make server from root dir
          },
          port: 8000,
          ui: {
              port: 8080,
              weinre: {
                  port: 9090
              }
          },
          open: false
      }
    },

//  Concat
    concat: {
      options: {
        separator: ';'
      },
      dist: {
        // the files to concatenate
        src: [
              "js/materialize-plugins/jquery.easing.1.3.js",
              "js/materialize-plugins/animation.js",
              "js/materialize-plugins/velocity.min.js",
              "js/materialize-plugins/hammer.min.js",
              "js/materialize-plugins/jquery.hammer.js",
              "js/materialize-plugins/global.js",
              "js/materialize-plugins/collapsible.js",
              "js/materialize-plugins/dropdown.js",
              "js/materialize-plugins/leanModal.js",
              "js/materialize-plugins/materialbox.js",
              "js/materialize-plugins/parallax.js",
              "js/materialize-plugins/tabs.js",
              "js/materialize-plugins/tooltip.js",
              "js/materialize-plugins/waves.js",
              "js/materialize-plugins/toasts.js",
              "js/materialize-plugins/sideNav.js",
              "js/materialize-plugins/scrollspy.js",
              "js/materialize-plugins/forms.js",
              "js/materialize-plugins/slider.js",
              "js/materialize-plugins/cards.js",
              "js/materialize-plugins/chips.js",
              "js/materialize-plugins/pushpin.js",
              "js/materialize-plugins/buttons.js",
              "js/materialize-plugins/transitions.js",
              "js/materialize-plugins/scrollFire.js",
              "js/materialize-plugins/date_picker/picker.js",
              "js/materialize-plugins/date_picker/picker.date.js",
              "js/materialize-plugins/character_counter.js",
             ],
        // the location of the resulting JS file
        dest: 'dist/js/materialize.js'
      },
      temp: {
        // the files to concatenate
        src: [
              "js/materialize-plugins/jquery.easing.1.3.js",
              "js/materialize-plugins/animation.js",
              "js/materialize-plugins/velocity.min.js",
              "js/materialize-plugins/hammer.min.js",
              "js/materialize-plugins/jquery.hammer.js",
              "js/materialize-plugins/global.js",
              "js/materialize-plugins/collapsible.js",
              "js/materialize-plugins/dropdown.js",
              "js/materialize-plugins/leanModal.js",
              "js/materialize-plugins/materialbox.js",
              "js/materialize-plugins/parallax.js",
              "js/materialize-plugins/tabs.js",
              "js/materialize-plugins/tooltip.js",
              "js/materialize-plugins/waves.js",
              "js/materialize-plugins/toasts.js",
              "js/materialize-plugins/sideNav.js",
              "js/materialize-plugins/scrollspy.js",
              "js/materialize-plugins/forms.js",
              "js/materialize-plugins/slider.js",
              "js/materialize-plugins/cards.js",
              "js/materialize-plugins/chips.js",
              "js/materialize-plugins/pushpin.js",
              "js/materialize-plugins/buttons.js",
              "js/materialize-plugins/transitions.js",
              "js/materialize-plugins/scrollFire.js",
              "js/materialize-plugins/date_picker/picker.js",
              "js/materialize-plugins/date_picker/picker.date.js",
              "js/materialize-plugins/character_counter.js",
             ],
        // the location of the resulting JS file
        dest: 'temp/js/materialize.js'
      },
    },

//  Uglify
    uglify: {
      
      dist: {
        options: {
          compress: true,
        },
        files: {
          'dist/js/materialize.min.js': ['dist/js/materialize.js'],
          'dist/js/plugins.min.js': ['dist/js/plugins.js']
        }
      },
      
      main: {
        options: {
          beautify: true,
        },
        files: {
          'js/materialize.js': ['dist/js/materialize.js']
        }
      },
      
      bin: {
        files: {
          'bin/materialize.js': ['temp/js/materialize.js']
        }
      }
    },

  replace: {
    min: {
      src: ['*.html'],             // source files array (supports minimatch)
      dest: 'dist/',             // destination directory or file
      replacements: [{
        from: '/materialize.css',                   // string replacement
        to: '/materialize.min.css'
      },{
        from: '/style.css',                   
        to: '/style.min.css'
      },{
        from: '/materialize.js',                   
        to: '/materialize.min.js'
      },{
        from: '/plugins.js',                   
        to: '/plugins.min.js'
      }]
    }
  },

//  Compress
    compress: {
      main: {
        options: {
          archive: 'bin/materialize.zip',
          level: 6
        },
        files:[
          { expand: true, cwd: 'dist/', src: ['**/*'], dest: 'materialize/'},
          { expand: true, cwd: './', src: ['LICENSE', 'README.md'], dest: 'materialize/'},
        ]
      },

      src: {
        options: {
          archive: 'bin/materialize-src.zip',
          level: 6
        },
        files:[
          {expand: true, cwd: 'font/', src: ['**/*'], dest: 'materialize-src/font/'},
          {expand: true, cwd: 'sass/', src: ['materialize.scss'], dest: 'materialize-src/sass/'},
          {expand: true, cwd: 'sass/', src: ['components/**/*'], dest: 'materialize-src/sass/'},
          {expand: true, cwd: 'js/', src: [
              "jquery.easing.1.3.js",
              "animation.js",
              "velocity.min.js",
              "hammer.min.js",
              "jquery.hammer.js",
              "global.js",
              "collapsible.js",
              "dropdown.js",
              "leanModal.js",
              "materialbox.js",
              "parallax.js",
              "tabs.js",
              "tooltip.js",
              "waves.js",
              "toasts.js",
              "sideNav.js",
              "scrollspy.js",
              "forms.js",
              "slider.js",
              "cards.js",
              "chips.js",
              "pushpin.js",
              "buttons.js",
              "transitions.js",
              "scrollFire.js",
              "date_picker/picker.js",
              "date_picker/picker.date.js",
              "character_counter.js",
             ], dest: 'materialize-src/js/'},
        {expand: true, cwd: 'dist/js/', src: ['**/*'], dest: 'materialize-src/js/bin/'},
        {expand: true, cwd: './', src: ['LICENSE', 'README.md'], dest: 'materialize-src/'}

        ]
      },

      starter_template: {
        options: {
          archive: 'templates/starter-template.zip',
          level: 6
        },
        files:[
          { expand: true, cwd: 'dist/', src: ['**/*'], dest: 'starter-template/'},
          { expand: true, cwd: 'templates/starter-template/', src: ['index.html', 'LICENSE'], dest: 'starter-template/'},
          { expand: true, cwd: 'templates/starter-template/css', src: ['style.css'], dest: 'starter-template/css'},
          { expand: true, cwd: 'templates/starter-template/js', src: ['init.js'], dest: 'starter-template/js'}
        ]
      }

    },


//  Clean
   clean: {
    dist: {
       src: [ 'dist/' ]
     },
     temp: {
       src: [ 'temp/' ]
     },
   },


//  Watch Files
    watch: {
      

      js: {
        files: [ "js/**/*", "!js/init.js"],
        tasks: ['js_compile'],
        options: {
          interrupt: false,
          spawn: false,
        },
      },

      sass: {
        files: ['sass/**/*'],
        tasks: ['sass_compile'],
        options: {
          interrupt: false,
          spawn: false,
        },
      }
    },


//  Concurrent
    concurrent: {
      options: {
        logConcurrentOutput: true,
        limit: 10,
      },
      monitor: {
        tasks: ["watch:js", "watch:sass", "notify:watching", 'server']
      },
    },


//  Notifications
    notify: {
      watching: {
        options: {
          enabled: true,
          message: 'Watching Files!',
          title: "Materialize", // defaults to the name in package.json, or will use project directory's name
          success: true, // whether successful grunt executions should be notified automatically
          duration: 1 // the duration of notification in seconds, for `notify-send only
        }
      },

      sass_compile: {
        options: {
          enabled: true,
          message: 'Sass Compiled!',
          title: "Materialize",
          success: true,
          duration: 1
        }
      },

      js_compile: {
        options: {
          enabled: true,
          message: 'JS Compiled!',
          title: "Materialize",
          success: true,
          duration: 1
        }
      },

      server: {
        options: {
          enabled: true,
          message: 'Server Running!',
          title: "Materialize",
          success: true,
          duration: 1
        }
      }
    },

  });

  // load the tasks  
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-compress');
  grunt.loadNpmTasks('grunt-contrib-clean');  
  grunt.loadNpmTasks('grunt-concurrent');
  grunt.loadNpmTasks('grunt-notify');
  grunt.loadNpmTasks('grunt-text-replace');  
  // grunt.loadNpmTasks('grunt-rename');  
  grunt.loadNpmTasks('grunt-browser-sync');  
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  // define the tasks
  grunt.registerTask(
    'build',[
      'clean:dist',
      //'lint',
      //'sass:expanded',
      'sass:dist',
      'concat:temp',
      'concat:dist',
      'uglify:bin',
      'copy',
      'uglify:dist',
      'replace:min',
      
      //'usebanner:release',

      /*'compress:main',
      'compress:src',
      'compress:starter_template',*/

      //'compress:parallax_template',
      // 'replace:version',
      // 'replace:readme',
      // 'rename:rename_src',
      // 'rename:rename_compiled'
    ]
  );

  
  grunt.registerTask('js_compile', ['concat:temp', 'uglify:main', 'uglify:bin', 'notify:js_compile', 'clean:temp']);
  grunt.registerTask('sass_compile', ['sass:main', 'sass:bin', 'notify:sass_compile']);
  grunt.registerTask('server', ['browserSync', 'notify:server']);
  //grunt.registerTask('lint', ['removelogging:source']);
  grunt.registerTask("monitor", ["concurrent:monitor"]);
};

