var gulp = require('gulp');
    sass = require('gulp-sass');
    cssminify = require('gulp-minify-css');
    autoprefixer = require('gulp-autoprefixer');
    uglify = require('gulp-uglify');
    browserSync = require('browser-sync').create();
    imageminOptipng = require('imagemin-optipng');
    minifyHTML = require('gulp-minify-html');
    phplint = require('phplint').lint

gulp.task('css', function() {
    gulp.src('scss/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(cssminify({compatibility: 'ie8'}))
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest('production/css'))
        .pipe(browserSync.stream());
});

gulp.task('js', function() {
  gulp.src('js/*.js')
    .pipe(uglify())
    .pipe(gulp.dest('production/js'));
});

gulp.task('img', function() {
  gulp.src('img/*.*')
    .pipe(imageminOptipng({optimizationLevel: 3})())
    .pipe(gulp.dest('production/img'));
  });

gulp.task('html', function(cb) {
  phplint(['*.php'], {limit: 10}, function (err, stdout, stderr) {
    if (err) {
      cb(err)
      process.exit(1)
    }
    cb()
  })
  .pipe(gulp.dest('production/'));
});

gulp.task('default',function() {
    gulp.watch('scss/*.scss',['css']).on('change', browserSync.reload);
    gulp.watch('js/*.js', ['js']).on('change', browserSync.reload);
    gulp.watch('*.php', ['html']).on('change', browserSync.reload);
    browserSync.init({
        proxy: "localhost"
    });
});