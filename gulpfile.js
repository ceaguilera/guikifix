'use strict';

var gulp        = require('gulp');
var wiredep     = require('wiredep').stream;

gulp.task('wiredep', function (){
    gulp.src('./src/Guikifix/PresentationBundle/app/index.html')
    .pipe(wiredep({
        directory: './bower_components',
        onError: function(err){
            console.log(err.code);
        }
    }))
    .pipe(gulp.dest('./src/Guikifix/PresentationBundle/app'))
});

gulp.task('default', ['wiredep']);