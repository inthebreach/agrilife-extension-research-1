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
      target: ['css/src/*.scss']
    compress:
      main:
        options:
          archive: '<%= pkg.name %>.zip'
        # Pick files to package and release
        files: [
          {src: ['css/*.css']},
          {src: ['img/**']},
          {src: ['**/*.php']},
          {src: ['**/*.json']},
          {src: ['README.md']}
        ]
    gh_release:
      options:
        token: process.env.GITHUB_PERSONAL_ACCESS_TOKEN
        owner: 'agrilife'
        repo: '<%= pkg.name %>'
      release:
        tag_name: '<%= pkg.version %>'
        target_commitish: 'master'
        name: 'Release'
        body: 'First release'
        draft: false
        prerelease: false
        asset:
          name: '<%= pkg.name %>.zip'
          file: '<%= pkg.name %>.zip'
          'Content-Type': 'application/zip'

  @loadNpmTasks 'grunt-contrib-watch'
  @loadNpmTasks 'grunt-contrib-compass'
  @loadNpmTasks 'grunt-sass-lint'
  @loadNpmTasks 'grunt-contrib-compress'
  @loadNpmTasks 'grunt-gh-release'

  @registerTask 'default', ['sasslint', 'compass:dev']
  @registerTask 'develop', ['sasslint', 'compass:dev']
  @registerTask 'package', ['compass:pkg']
  @registerTask 'release', ['compress', 'setreleasemsg', 'gh_release']
  @registerTask 'setreleasemsg', 'Set release message as range of commits', ->
    done = @async()
    grunt.util.spawn {
      cmd: 'git'
      args: [ 'tag' ]
    }, (err, result, code) ->
      if(result.stdout!='')
        # Get last tag in the results
        matches = result.stdout.match(/([^\n]+)$/)
        # Set commit message timeline
        releaserange = matches[1] + '..HEAD'
        grunt.config.set 'releaserange', releaserange
        # Run the next task
        grunt.task.run('shortlog');
      done(err)
      return
    return
  @registerTask 'shortlog', 'Set gh_release body with commit messages since last release', ->
    done = @async()
    grunt.util.spawn {
      cmd: 'git'
      args: ['shortlog', grunt.config.get('releaserange'), '--no-merges']
    }, (err, result, code) ->
      if(result.stdout != '')
        # Hyphenate commit messages
        message = result.stdout.replace(/(\n)\s\s+/g, '$1- ')
        # Set release message
        grunt.config 'gh_release.release.body', message
      else
        # Just in case merges are the only commit
        grunt.config 'gh_release.release.body', 'release'
      done(err)
      return
    return

  @event.on 'watch', (action, filepath) =>
    @log.writeln('#{filepath} has #{action}')
