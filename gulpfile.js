// cnpm install  --save-dev gulp gulp-sass   gulp-jshint gulp-minify-css gulp-uglify gulp-rename gulp-clean gulp-postcss gulp-sourcemaps autoprefixer gulp-md5-plus   gulp-imagemin


const   path=require('path'),
        gulp = require('gulp'),
        sass = require('gulp-sass'),
        autoprefixer = require('autoprefixer'),
        postcss= require('gulp-postcss'),
        sourcemaps= require('gulp-sourcemaps'),
        jshint = require('gulp-jshint'),
        minifycss = require('gulp-minify-css'),
        uglify = require('gulp-uglify'),
        rename = require('gulp-rename'),
        clean = require('gulp-clean'),
        md5 = require('gulp-md5-plus'),
        imagemin = require('gulp-imagemin');



const PATHS={
        static:path.join(__dirname,'resources/assets/static'),
        admin:path.join(__dirname,'resources/assets/admin'),
        build:path.join(__dirname,'public')
}



gulp.task('admin:sass',function(){
    return  gulp.src(PATHS.admin+'/sass/**/*.scss')
                .pipe(sass({outputStyle: 'nested'}).on('error', sass.logError))
                .pipe(sourcemaps.init())
                .pipe(postcss([autoprefixer({browsers: ['last 4 versions'],cascade: true,remove:true})]))
                .pipe(sourcemaps.write())
                .pipe(gulp.dest(PATHS.build+'/temp/admin/css'))
                // .pipe(md5(10,PATHS.build+'/temp/admin/css/**/*.css'))
                .pipe(rename({ suffix: '.min' }))
                .pipe(minifycss())
                .pipe(gulp.dest(PATHS.build+'/dist/admin/css'))
            }
);

gulp.task('admin:js', function() {
    return gulp.src(PATHS.admin+'/js/*.js')
        .pipe(jshint.reporter('default'))
        .pipe(gulp.dest(PATHS.build+'/temp/admin/js'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(uglify())
        .pipe(gulp.dest(PATHS.build+'/dist/admin/js'));
});


gulp.task('admin:images', function() {
    return gulp.src(PATHS.admin+'/images/**/*')
        .pipe(imagemin([
            imagemin.gifsicle({interlaced: true}),
            imagemin.jpegtran({progressive: true}),
            imagemin.optipng({optimizationLevel: 5}),
            imagemin.svgo({plugins: [{removeViewBox: true}]})
        ]))
        .pipe(gulp.dest(PATHS.build+'/dist/admin/images'));
});

gulp.task('admin:clean', function() {
    return gulp.src([
        PATHS.build+'/dist/admin/css',
        PATHS.build+'/temp/admin/css',
        PATHS.build+'/dist/admin/js',
        PATHS.build+'/temp/admin/js',
        PATHS.build+'/dist/admin/images'], {read: false})
        .pipe(clean());
});

gulp.task('admin', ['admin:clean'], function() {
    gulp.start('admin:sass','admin:js','admin:images');
});


gulp.task('watch', function() {
    gulp.watch(PATHS.admin+'/sass/**/*.scss', ['admin:sass']);
    gulp.watch(PATHS.admin+'/js/**/*.js', ['admin:js']);
    gulp.watch(PATHS.admin+'/images/**/*', ['admin:images']);
});


//静态资源
gulp.task('easyui',function(){
    return gulp.src(PATHS.static+'/jquery-easyui-1.5.2/**/*')
        .pipe(gulp.dest(PATHS.build+'/static/jquery-easyui'));
});
gulp.task('jquery',function(){
    return gulp.src(PATHS.static+'/jquery/**/*')
        .pipe(gulp.dest(PATHS.build+'/static/jquery'));
});
gulp.task('insdep',function(){
    return gulp.src(PATHS.static+'/insdep/**/*')
        .pipe(gulp.dest(PATHS.build+'/static/insdep'));
});
gulp.task('static:clean', function() {
    return gulp.src([
        PATHS.build+'/static/'], {read: false})
        .pipe(clean());
});
gulp.task('static', ['static:clean'], function() {
    gulp.start('easyui','jquery','insdep');
});