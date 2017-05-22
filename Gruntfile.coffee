module.exports = (grunt) ->
  @initConfig
    pkg: @file.readJSON('package.json')
    watch:
      files: [
        'css/src/*.scss'
      ]
      tasks: ['sasslint', 'compass:dev']
    compass:
      pkg:
        options:
          config: 'config.rb'
          force: true
      dev:
        options:
          config: 'config.rb'
          force: true
          outputStyle: 'expanded'
          sourcemap: true
          noLineComments: true
    sasslint:
      options:
        configFile: '.sass-lint.yml'
      target: ['css/src/**/*.s+(a|c)ss']

  @loadNpmTasks 'grunt-contrib-watch'
  @loadNpmTasks 'grunt-contrib-compass'
  @loadNpmTasks 'grunt-sass-lint'

  @registerTask 'default', ['sasslint', 'compass:dev']
  @registerTask 'develop', ['sasslint', 'compass:dev']
  @registerTask 'package', ['compass:pkg']

  @event.on 'watch', (action, filepath) =>
    @log.writeln('#{filepath} has #{action}')
