import gulp from 'gulp';
import webp from 'gulp-webp';

export default function() {
    return gulp.src(['images/**/*.png', 'images/**/*.jpg']).pipe(webp()).pipe(gulp.dest('images'))
}