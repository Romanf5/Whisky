const gulp  = require('gulp');
const less = require('gulp-less');
const browserSync = require('browser-sync');
const fileinclude = require('gulp-file-include');
const concat      = require('gulp-concat');
const uglify      = require('gulp-uglifyjs');
const sourcemaps = require('gulp-sourcemaps');
const cssnano     = require('gulp-cssnano');
const rename      = require('gulp-rename');
const gutil = require('gulp-util');
const plumber = require('gulp-plumber');
const newer = require('gulp-newer');
const del = require('del');
const replace = require('gulp-replace');
const postcss = require('gulp-postcss');
const autoprefixer = require("autoprefixer");

const config = require('./projectConfig.json');
const devDomain = config.devDomain;

// Settings
const postCssSettings = [
  autoprefixer({browsers: ['last 2 version']})
];


gulp.task('less', function () {
  return gulp.src(['./src/less/**/*.less', '!./src/less/**/_*.less'])
    .pipe(sourcemaps.init())
    .pipe(plumber())
    .pipe(less().on('error', gutil.log))
    .pipe(postcss(postCssSettings))
    .pipe(sourcemaps.write('/'))
    .pipe(gulp.dest('./app/css'))
    .pipe(browserSync.reload({stream: true}))
    .on('error', function(err) {
      gutil.log(err);
      this.emit('end');
    });
});

gulp.task('less-build', function () {
  return gulp.src(['./src/less/**/*.less', '!./src/less/**/_*.less'])
    .pipe(less())
    .pipe(cssnano())
    .pipe(rename({suffix: '.min'}))
    .pipe(postcss(postCssSettings))
    .pipe(gulp.dest('./app/css'))
    .pipe(browserSync.reload({stream: true}))

});

gulp.task('browser-sync', function() { // Создаем таск browser-sync
  browserSync.init({
    files: ['{include,template-parts,woocommerce}/**/*.php', '*.php'],
    proxy: devDomain,
    open: false,
    port: 5050,
    snippetOptions: {
      whitelist: ['/wp-admin/admin-ajax.php'],
      blacklist: ['/wp-admin/**']
    }
  });
});

gulp.task('html', function() {
  return gulp.src('./src/*.html')
    .pipe(fileinclude({
      prefix: '@@',
      basepath: '@file',
      indent: true,
    }))
    .pipe(gulp.dest('./app'))
    .pipe(browserSync.reload({stream: true}))
});

gulp.task('html-build', function() {
  return gulp.src('./src/*.html')
    .pipe(fileinclude({
      prefix: '@@',
      basepath: '@file',
      indent: true,
    }))
    .pipe(gulp.dest('./app'))
    .pipe(browserSync.reload({stream: true}))
});

gulp.task('lib-scripts', function() {
  return gulp.src('./src/lib-script/*.js')
    .pipe(concat('libs.min.js')) // Собираем их в кучу в новом файле libs.min.js
    .pipe(uglify()) // Сжимаем JS файл
    .pipe(gulp.dest('app/script')); // Выгружаем в папку app/js
});

gulp.task('main-script', function () {
  return gulp.src('./src/scripts/**.js')
    .pipe(sourcemaps.init())
    .pipe(concat('main.js'))
    .pipe(sourcemaps.write('/'))
    .pipe(gulp.dest('app/script'))
    .pipe(browserSync.reload({stream: true}))
});

gulp.task('main-script-build',function(){
  return gulp.src('./src/scripts/**.js')
    .pipe(concat('main.min.js'))
    .pipe(gulp.dest('app/script'))
    .pipe(uglify()) // Сжимаем JS файл
});

gulp.task('css-libs', function() {
  return gulp.src('./src/lib-css/**.css')
    .pipe(concat('libs.css'))
    .pipe(cssnano())
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('app/css'));
});

gulp.task('replace-path',['html-build'], function() {
  gulp.src(['./app/*.html'])
    .pipe(replace('load-styles.css', 'load-styles.min.css'))
    .pipe(replace('main.css', 'main.min.css'))
    .pipe(replace('load-scripts.js', 'load-scripts.min.js'))
    .pipe(replace('main.js', 'main.min.js'))
    .pipe(gulp.dest('./app'));
});

gulp.task('watch', ['browser-sync', 'html', 'css-libs','less', 'lib-scripts', 'main-script'], function() {
  gulp.watch('./src/less/**/*.less', ['less']);
  gulp.watch('./src/scripts/**.js', ['main-script'])
});


gulp.task('clean', function() {
  /*return del.sync(['app/img/', 'app/fonts', 'app/css/!*.map', 'app/script/!*.map']);*/

  return del.sync('app')
});

gulp.task('build',['clean','replace-path','css-libs','less-build','lib-scripts','main-script-build'],function () {});
