'use strict';

var gulp = require('gulp');
var size = require('gulp-size');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var minifyCSS = require('gulp-clean-css');
var sourcemaps = require('gulp-sourcemaps');
var header = require('gulp-header');
var sass = require('gulp-sass');
var pkg = require('./package.json');
var gutil = require('gulp-util');
var banner = ['/**',
    ' * <%= pkg.name %> - <%= pkg.description %>',
    ' * @author <%= pkg.author %>',
    ' * @version v<%= pkg.version %>',
    ' * @link <%= pkg.homepage %>',
    ' */\n\n'
].join('\n');

// App Bundle
gulp.task('bundleJS', function () {

    var jQuery = './node_modules/jquery/dist/jquery.js';
    var uikit = './node_modules/uikit/dist/js/uikit.js';
    var uikitIcons = './node_modules/uikit/dist/js/uikit-icons.min.js';

    return gulp.src([jQuery, uikit, uikitIcons])
        .pipe(sourcemaps.init())
        .pipe(concat('theme.min.js'))
        .pipe(uglify())
        .on('error', function (err) {
            gutil.log(gutil.colors.red('[Error]'), err.toString());
        })
        .pipe(size({
            gzip: true,
            showFiles: true
        }))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./assets/js'));
});

// CSS
gulp.task('sass', function () {
    return gulp.src('./src/sass/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(minifyCSS('*'))
        .pipe(concat('theme.min.css'))
        .pipe(size({
            gzip: true,
            showFiles: true
        }))
        .pipe(gulp.dest('./assets/css'));
});

gulp.task('watch', function () {
    gulp.watch([
        './src/sass/*.scss',
        './src/sass/**/*.scss',
        './src/js/*.js'
    ], [
        'sass',
        'bundleJS'
    ]);
});

// Default
gulp.task('default', ['sass', 'bundleJS']);
