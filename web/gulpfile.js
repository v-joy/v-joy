/**
 * Created by cx on 15-4-9.
 */
/**
 * 项目的构建文件
 * @author Chen Xiao
 */
'use strict';

var gulp = require('gulp');
var jshint = require('gulp-jshint');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var less = require('gulp-less');

// 语法检查
gulp.task('jshint', function () {
    return gulp.src('src/js/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

// 合并文件之后压缩代码
gulp.task('minify_js', function (){
    return gulp.src('src/js/*.js',{base: 'src'})
        .pipe(minify())
        .pipe(gulp.dest('assets'));
});

// 监视文件的变化
gulp.task('watch', function () {
    gulp.watch('src/js/*.js', ['jshint', 'minify_js']);
});

// 转译less文件
gulp.task('less', function () {
    return gulp.src('src/less/*.less')
        .pipe(less())
        .pipe(gulp.dest('src/css'));
});

// 将CSS文件压缩
gulp.task('minify_css', function () {
    return gulp.src('src/css/*.css', {base: 'src'})
        .pipe(minifycss())
        .pipe(gulp.dest('assets'));
});

// before minify clean
gulp.task('clean', function () {
    return delete (['assets/css', 'assets/js']);
});


// 注册缺省任务
gulp.task('default',
    ['jshint',
    'minify_js',
    'watch',
    'less',
    'minify_css',
    'clean']
);
