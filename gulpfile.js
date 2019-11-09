var gulp          = require('gulp'),
    sass          = require('gulp-sass'),
    cssnano       = require('gulp-cssnano'),
    uglifycss     = require('gulp-uglifycss'),
    autoprefixer  = require('gulp-autoprefixer'),
    sourcemaps    = require('gulp-sourcemaps'),
    rename        = require('gulp-rename'),
    rtlcss        = require('gulp-rtlcss'),
    notify        = require('gulp-notify'),
    concat        = require('gulp-concat'),
    uglify        = require('gulp-uglify'),
    imagemin      = require("gulp-imagemin"),
    newer         = require("gulp-newer"),
    browserify    = require('gulp-browserify'),
    browsersync   = require("browser-sync").create();

var
src   = {
  css:    './assets/src/scss/',
  js:     './assets/src/js/',
  img:    './assets/src/images/',
  fonts:  './assets/src/fonts/'
},
dist  = {
  css:    './assets/dist/css/',
  js:     './assets/dist/js/',
  img:    './assets/dist/images/',
  fonts:  './assets/dist/fonts/'
}

function stylesltr() {
  return gulp
  .src(src.css + 'main.scss', { sourcemaps: true })
  // .pipe(sourcemaps.init())
  .pipe(sass({
			errLogToConsole: true,
			outputStyle: 'compressed',
			// outputStyle: 'compact',
			// outputStyle: 'nested',
			// outputStyle: 'expanded',
			precision: 10
		}).on('error', sass.logError))
  .pipe(autoprefixer('last 2 versions'))
  .pipe(cssnano())
  // .pipe(sourcemaps.write('./'))
  // .pipe(uglifycss({"maxLineLen": 80, "uglyComments": true}))
  .pipe(gulp.dest(dist.css, { sourcemaps: '.' }))
  .pipe(notify({ message: 'LTR Styles task complete', onLast: true }))
  .pipe(browsersync.stream());
};

function stylesrtl() {
  return gulp
  .src([
    src.css + 'bootstrap.scss',
    src.css + 'mediaelementplayer.scss',
    src.css + 'custom.scss',
    src.css + 'blogbanner.scss'
  ], {sourcemaps: true})
  // .pipe(sourcemaps.init())
  .pipe(sass().on('error', sass.logError))
  .pipe(rtlcss())
  .pipe(gulp.src([
    src.css + 'owlcarousel.scss',
    src.css + 'fontawesome.scss',
    src.css + 'rtl.scss'
  ], {sourcemaps: true}))
  .pipe(sass().on('error', sass.logError))
  .pipe(autoprefixer('last 2 versions'))
  .pipe(cssnano())
  .pipe(concat('main-rtl.css'))
  // .pipe(sourcemaps.write('./'))
  .pipe(gulp.dest(dist.css, { sourcemaps: './' }))
  .pipe(notify({ message: 'RTL Styles task complete', onLast: true }))
  .pipe(browsersync.stream());
};

const jsfiles = [
  src.js + 'bootstrap.js',
  // src.js + 'vendor/owlcarousel.js',
  src.js + 'plugins.js'
];

function scripts() {
	return gulp
  .src(jsfiles, {sourcemaps: true})
	.pipe(concat('bundle.js'))
  .pipe(browserify())
	// .pipe(gulp.dest('assets/dist/js'))
	// .pipe(uglify())
	.pipe(gulp.dest(dist.js, {sourcemaps: './'}))
	.pipe(notify({ message: 'Scripts task complete', onLast: true }))
  .pipe(browsersync.stream());
}

function images() {
  // return gulp.src(src.img + '**/*.{png,jpg,gif,svg}')
  return gulp
  .src(src.img + '**/*')
  .pipe(newer(dist.img))
  // .pipe(imagemin({ optimizationLevel: 7, progressive: true, interlaced: true }))
  .pipe(
      imagemin([
        imagemin.gifsicle({ interlaced: true }),
        imagemin.jpegtran({ progressive: true }),
        imagemin.optipng({ optimizationLevel: 5 }),
        imagemin.svgo({
          plugins: [
            {
              removeViewBox: false,
              collapseGroups: true
            }
          ]
        })
      ])
    )
  // .pipe(imagemin())
  .pipe(gulp.dest(dist.img))
  .pipe(notify({ message: 'Images task complete', onLast: true }));
}

function fonts() {
  return gulp
  .src(src.fonts + '**/*')
  .pipe(gulp.dest(dist.fonts));
}

function php() {
  return gulp
  .src('./**/*.php')
  .pipe(gulp.dest('./'))
  .pipe(browsersync.stream());
}

function watch() {
  gulp.watch(src.css + '**/*', styles);
  // gulp.watch(src.js + '**/*', scripts);
  gulp.watch(jsfiles, scripts);
  gulp.watch(src.img + '**/*', images);
  // gulp.watch('./**/*.php', php);
}

function browserSync(done) {
  browsersync.init({
    // server: {
    //   baseDir: "./"
    // },
    port: 80,
    proxy: "http://localhost/wp1"
  });
  done();
}

function browserSyncReload(done) {
  browsersync.reload();
  done();
}

const styles = gulp.series(stylesltr, stylesrtl);

exports.styles = styles;
exports.scripts = scripts;
exports.images = images;
exports.fonts = fonts;
exports.watch = gulp.parallel(watch, browserSync);
exports.default = gulp.parallel(styles, scripts, images, fonts);
