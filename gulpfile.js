var gulp          = require('gulp'),
    del           = require('del'),
    exec          = require('child_process').exec,
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
  // css:    './assets/dist/css/',
  css:    '.',
  js:     './assets/dist/js/',
  img:    './assets/dist/images/',
  fonts:  './assets/dist/fonts/'
}
const jsfiles = [
  src.js + 'bootstrap.js',
  src.js + 'vendor/owlcarousel.js',
  // src.js + 'bootstrap-affix.js',
  // src.js + 'bootstrap-collapse.js',
  src.js + 'isotope.js',
  // src.js + 'imagesloaded.pkgd.js',
  src.js + 'plugins.js'
];

var Development = {
  stylesLTR: function() {
    return gulp
    .src(src.css + 'style.scss', { sourcemaps: true })
    // .pipe(sourcemaps.init())
    .pipe(sass({
  			// errLogToConsole: true,
  			// outputStyle: 'compressed',
  			// // outputStyle: 'compact',
  			// // outputStyle: 'nested',
  			// // outputStyle: 'expanded',
  			// precision: 10
  		}).on('error', sass.logError))
    .pipe(autoprefixer('last 12 versions'))
    // .pipe(cssnano())
    // .pipe(sourcemaps.write('./'))
    // .pipe(uglifycss({"maxLineLen": 80, "uglyComments": true}))
    .pipe(gulp.dest(dist.css, { sourcemaps: '.' }))
    .pipe(notify({ message: 'LTR Styles task complete', onLast: true }))
    .pipe(browsersync.stream());
  },
  stylesLTR_Editor: function() {
    return gulp
    .src(src.css + 'style_editor.scss', { sourcemaps: true })
    // .pipe(sourcemaps.init())
    .pipe(sass({
  			// errLogToConsole: true,
  			// outputStyle: 'compressed',
  			// // outputStyle: 'compact',
  			// // outputStyle: 'nested',
  			// // outputStyle: 'expanded',
  			// precision: 10
  		}).on('error', sass.logError))
    .pipe(autoprefixer('last 12 versions'))
    // .pipe(cssnano())
    // .pipe(sourcemaps.write('./'))
    // .pipe(uglifycss({"maxLineLen": 80, "uglyComments": true}))
    .pipe(gulp.dest(dist.css, { sourcemaps: '.' }))
    .pipe(notify({ message: 'LTR Styles (Editor) task complete', onLast: true }))
    .pipe(browsersync.stream());
  },
  stylesRTL: function() {
    return gulp
    .src([src.css + 'style-rtl.scss'], {sourcemaps: true})
    // .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(rtlcss())
    .pipe(gulp.src([
      src.css + 'plugins/owlcarousel.scss',
      src.css + 'plugins/fontawesome.scss',
      src.css + 'theme/rtl.scss'
    ], {sourcemaps: true}))
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer('last 12 versions'))
    // .pipe(cssnano())
    .pipe(concat('style-rtl.css'))
    // .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(dist.css, { sourcemaps: './' }))
    .pipe(notify({ message: 'RTL Styles task complete', onLast: true }))
    .pipe(browsersync.stream());
  },
  stylesRTL_Editor: function() {
    return gulp
    .src([src.css + 'style-rtl_editor.scss'], {sourcemaps: true})
    // .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(rtlcss())
    .pipe(gulp.src([src.css + 'theme/rtl.scss'], {sourcemaps: true}))
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer('last 12 versions'))
    // .pipe(cssnano())
    .pipe(concat('style-rtl_editor.css'))
    // .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(dist.css, { sourcemaps: './' }))
    .pipe(notify({ message: 'RTL Styles (Editor) task complete', onLast: true }))
    .pipe(browsersync.stream());
  },
  scripts: function() {
    return gulp
    .src(jsfiles, {sourcemaps: true})
  	.pipe(concat('bundle.js'))
    .pipe(browserify())
  	// .pipe(gulp.dest('assets/dist/js'))
  	// .pipe(gulpif(isProduction, uglify()))
    // .pipe(uglify())
  	.pipe(gulp.dest(dist.js, {sourcemaps: './'}))
  	.pipe(notify({ message: 'Scripts task complete', onLast: true }))
    .pipe(browsersync.stream());
  }
}

var Production = {
  stylesLTR: function() {
    return gulp
    .src(src.css + 'style.scss')
    // .pipe(sourcemaps.init())
    .pipe(sass({
  			// errLogToConsole: true,
  			// outputStyle: 'compressed',
  			// // outputStyle: 'compact',
  			// // outputStyle: 'nested',
  			// // outputStyle: 'expanded',
  			// precision: 10
  		}).on('error', sass.logError))
    .pipe(autoprefixer('last 12 versions'))
    .pipe(cssnano())
    // .pipe(sourcemaps.write('./'))
    // .pipe(uglifycss({"maxLineLen": 80, "uglyComments": true}))
    .pipe(gulp.dest(dist.css))
    .pipe(notify({ message: 'LTR Styles task completed in Production mode', onLast: true }))
    .pipe(browsersync.stream());
  },
  stylesLTR_Editor: function() {
    return gulp
    .src(src.css + 'style_editor.scss')
    // .pipe(sourcemaps.init())
    .pipe(sass({
  			// errLogToConsole: true,
  			// outputStyle: 'compressed',
  			// // outputStyle: 'compact',
  			// // outputStyle: 'nested',
  			// // outputStyle: 'expanded',
  			// precision: 10
  		}).on('error', sass.logError))
    .pipe(autoprefixer('last 12 versions'))
    .pipe(cssnano())
    // .pipe(sourcemaps.write('./'))
    // .pipe(uglifycss({"maxLineLen": 80, "uglyComments": true}))
    .pipe(gulp.dest(dist.css))
    .pipe(notify({ message: 'LTR Styles task (Editor) completed in Production mode', onLast: true }))
    .pipe(browsersync.stream());
  },
  stylesRTL: function() {
    return gulp
    .src([src.css + 'style-rtl.scss'])
    // .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(rtlcss())
    .pipe(gulp.src([
      src.css + 'plugins/owlcarousel.scss',
      src.css + 'plugins/fontawesome.scss',
      src.css + 'theme/rtl.scss'
    ]))
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer('last 12 versions'))
    .pipe(cssnano())
    .pipe(concat('style-rtl.css'))
    // .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(dist.css))
    .pipe(notify({ message: 'RTL Styles task completed in Production mode', onLast: true }))
    .pipe(browsersync.stream());
  },
  stylesRTL_Editor: function() {
    return gulp
    .src([src.css + 'style-rtl_editor.scss'])
    // .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(rtlcss())
    .pipe(gulp.src([
      // src.css + 'owlcarousel.scss',
      // src.css + 'fontawesome.scss',
      src.css + 'theme/rtl.scss'
    ]))
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer('last 12 versions'))
    .pipe(cssnano())
    .pipe(concat('style-rtl_editor.css'))
    // .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(dist.css))
    .pipe(notify({ message: 'RTL Styles task (Editor) completed in Production mode', onLast: true }))
    .pipe(browsersync.stream());
  },
  scripts: function() {
    return gulp
    .src(jsfiles)
  	.pipe(concat('bundle.js'))
    .pipe(browserify())
  	// .pipe(gulp.dest('assets/dist/js'))
  	// .pipe(gulpif(isProduction, uglify()))
    .pipe(uglify())
  	.pipe(gulp.dest(dist.js))
  	.pipe(notify({ message: 'Scripts task completed in Production mode', onLast: true }))
    .pipe(browsersync.stream());
  }
}

function clean() {
  return del([
      'assets/dist/**',
      '!assets/dist',
      'style.css',
      'style.css.map',
      'style_editor.css',
      'style_editor.css.map',
      'style-rtl.css',
      'style-rtl.css.map',
      'style-rtl_editor.css',
      'style-rtl_editor.css.map'
  ]);
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

function pot(cb) {
  exec('wp-cli.phar i18n make-pot . ./languages/digicorp.pot --domain=digicorpdomain', function (err, stdout, stderr) {
    console.log(stdout);
    console.log(stderr);
    cb(err);
  });
}

function watch(cb) {
  gulp.watch(src.css + '**/*', stylesDev_1);
  // gulp.watch(src.js + '**/*', scripts);
  // gulp.watch(jsfiles, Development.scripts);
  // gulp.watch(src.img + '**/*', images);
  // gulp.watch('./**/*.php', php);
  cb();
}

function browserSync(done) {
  browsersync.init({
    // server: {
    //   baseDir: "./"
    // },
    port: 8080,
    proxy: "http://localhost/wp1"
  });
  done();
}

function browserSyncReload(done) {
  browsersync.reload();
  done();
}

const stylesDevelopment = gulp.series(Development.stylesLTR, Development.stylesRTL, Development.stylesLTR_Editor, Development.stylesRTL_Editor);
const stylesDev_1 = gulp.series(Development.stylesLTR, Development.stylesRTL);
const stylesProduction = gulp.series(Production.stylesLTR, Production.stylesRTL, Production.stylesLTR_Editor, Production.stylesRTL_Editor);

var tasks = {
  production: gulp.series( clean, gulp.parallel(stylesProduction, Production.scripts, images, fonts)),
  development: gulp.parallel(stylesDevelopment, Development.scripts, images, fonts)
}

exports.clean = clean;
exports.styles = stylesDevelopment;
exports.styles_dev_1 = stylesDev_1;
exports.styles_prd = stylesProduction;
exports.scripts = Development.scripts;
exports.images = images;
exports.fonts = fonts;
exports.watch = gulp.parallel(watch, browserSync);
exports.pot = pot;
exports.prd = tasks['production'];
exports.dev = tasks['development'];
exports.default = tasks['development'];
