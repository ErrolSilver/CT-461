module.exports = function(grunt) {

  // All configuration goes here 
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    compass: {
      dist: {
        options: {
          sassDir: 'sass',
          cssDir: 'css'
        }
      }
    }, // End Compass

    autoprefixer: {
      options: {
        browsers: ['last 8 versions']
      },
      dist: {
        files: [{
          expand: true,
          cwd: 'css/',
          src: '{,*/}*.css',
          dest: 'css/'
        }]
      }
    }, // End AutoPrefixer


    watch: {
      options: {
        livereload: true,
      },
      scripts: {
        files: ['js/*.js'],
        options: {
          spawn: false,
        },
      }, 
      compass: {
        files: ['sass/{,*/}*.{scss,sass}'],
        tasks: ['compass', 'autoprefixer']
      },
      html: {
        files: ['*/.html','**/*.css'],
        options: {
            livereload: true
        },
      },
      php:{
         files: ['./**/*.php']
        }, 
    }, // End Watch

  }); // End Configuration

  // Plugin references
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-watch');

  // Task registration
  grunt.registerTask('default', ['watch']);

};
