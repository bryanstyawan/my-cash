const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CompressionPlugin = require('compression-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const WriteFilePlugin = require('write-file-webpack-plugin');
var TerserPlugin = require('terser-webpack-plugin');
var OptimizaeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');

module.exports = {
	mode: 'development',
	devtool: 'source-map',
	entry: {
		index: './src/index.js',
		engine: './src/engine.js'
	},
	resolve: {
		extensions: [ '.js' ]
	},
	module: {
		rules: [
			{
				test: /\.css$/,
				use: [
					// 'style-loader',
					{ 
						loader: MiniCssExtractPlugin.loader 
					},
					{ 
						loader: 'css-loader', 
						options: { 
							importLoaders: 1,
							sourceMap: true 
						} 
					}
				]
			},
			{
				test: /\.js$/,
				exclude: /(node_modules)/,
				use: {
					loader: 'babel-loader',
					options: {
						presets: ['@babel/preset-env']
					}
				}								
			}
		]
	},		
	output: {
		filename: '[name].min.js',
		path: path.resolve(__dirname, 'dist'),
	},
	plugins: [
		new CleanWebpackPlugin(),
		new WriteFilePlugin(),		
		new MiniCssExtractPlugin({
			filename: 'main.min.css'
		}),
		new CompressionPlugin({
			test: /\.(css|js)(\?.*)?$/i
		})		
	],
	optimization: {
		minimizer: [
			new TerserPlugin({
				test: /\.js(\?.*)?$/i,
				parallel: true,
				// sourceMap: true,
				extractComments: false
			}),
			new OptimizaeCSSAssetsPlugin({
				cssProcessorOptions: {
					map: {
							inline: false
					}
				}
			})
		]
	}	
};
