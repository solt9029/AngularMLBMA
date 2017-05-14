module.exports = function(grunt) {
	grunt.initConfig({
		watch:{
			default:{
				tasks:"default",
				files:["public/js/app.js"]
			}
		},
		babel:{
			options:{
				sourceMap:true,
				presets:["es2015"]
			},
			dist:{
				files:{
					"public/js/es5/app.es5.js":"public/js/app.js"
				}
			}
		},
		uglify: {
			dist:{
				files:{
					"public/js/min/app.min.js":"public/js/es5/app.es5.js"
				}
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-babel');
	grunt.loadNpmTasks('grunt-contrib-watch');

	grunt.registerTask('default',["babel",'uglify']);
};