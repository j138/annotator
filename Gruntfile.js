module.exports = function (grunt) {
  'use strict';
  pkg: grunt.file.readJSON("package.json"),
  grunt.initConfig({
    bower: {
      install: {
        options: {
          targetDir: './public/lib/',
          layout: 'byComponent',
          install: true,
          verbose: false,
          cleanTargetDir: true,
          cleanBowerDir: false
        }
      }
    },
  });
  grunt.loadNpmTasks('grunt-bower-task');
  grunt.registerTask('default', ['bower:install']);
};
