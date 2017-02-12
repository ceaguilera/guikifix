'use strict';

var gulp        = require('gulp');
var wiredep     = require('wiredep').stream;
var sass        = require('gulp-sass');
var inject      = require('gulp-inject');


gulp.task('wiredep', () => {
    gulp.src('./src/Guikifix/PresentationBundle/app/index.html')
    .pipe(wiredep({
        directory: './bower_components',
        onError: function(err){
            console.log(err.code);
        }
    }))
    .pipe(gulp.dest('./src/Guikifix/PresentationBundle/app'))
});

gulp.task('sass', () => {
    console.log("ejecuto sass");
    gulp.src('./src/Guikifix/PresentationBundle/app/**/*.scss')
    .pipe(sass())
    .pipe(gulp.dest('./src/Guikifix/PresentationBundle/app/'))
})

gulp.task('inject', ['sass'], () => {
  console.log("ejecuto inject");
  var target = gulp.src('./src/Guikifix/PresentationBundle/app/index.html');
  // It's not necessary to read the files (will speed up things), we're only after their paths: 
  var sources = gulp.src(['./src/Guikifix/PresentationBundle/app/**/*.js', './src/Guikifix/PresentationBundle/app/**/*.css'], {read: false});
 
  return target.pipe(inject(sources))
    .pipe(gulp.dest('./src/Guikifix/PresentationBundle/app/'));
});

gulp.task('default', ['wiredep', 'sass', 'inject']);